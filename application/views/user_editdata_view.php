<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-6">
	    	<h3>Data Mahasiswa</h3>
	    	
	      	<form action="<?php echo site_url('edit/update_user');?>" method="post">

	      		<div class="form-group">
	      		<div class="form-group">
                    <label>Username</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
				</div>
				</div>

				<div class="form-group">
				    <label>Peminatan</label>
				    <select class="form-control peminatan" name="peminatan" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($peminatan as $row):?>
				    	<option value="<?php echo $row->user_id_peminatan;?>"><?php echo $row->nama_peminatan;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>

				<div class="form-group">
				    <label>Dosen</label>
				    <select class="form-control" id="dosen" name="dosen" required>
				    	<option value="">No Selected</option>

				    </select>
				</div>

				<input type="hidden" name="user_id" value="<?php echo $user_id?>" required>
				<button class="btn btn-success" type="submit">Update Data</button>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//call function get data edit
			get_user_data_edit();

			$('.peminatan').change(function(){ 
                var id=$(this).val();
                var nidn = "<?php echo $nidn_id;?>";
                $.ajax({
                    url : "<?php echo site_url('edit/get_sub_peminatan');?>",
                    method : "POST",
                    data : {id_peminatan: id}, //kalo diganti jadi id:id_peminatan jadinya dosen gk muncul
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        $('select[name="dosen"]').empty();

                        $.each(data, function(key, value) {
                            if(nidn==value.nidn){
                                $('select[name="dosen"]').append('<option value="'+ value.nidn +'" selected>'+ value.nama +'</option>').trigger('change');
                            }else{
                                $('select[name="dosen"]').append('<option value="'+ value.nidn +'">'+ value.nama +'</option>');
                            }
                        });

                    }
                });
                return false;
            }); 

			//load data for edit
            function get_user_data_edit(){
            	var user_id = $('[name="user_id"]').val();
            	$.ajax({
            		url : "<?php echo site_url('edit/get_user_data_edit');?>",
                    method : "POST",
                    data :{user_id :user_id},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="username"]').val(data[i].user_name);
                            $('[name="email"]').val(data[i].user_email);
                            $('[name="password"]').val(data[i].user_password);
                            $('[name="peminatan"]').val(data[i].user_id_peminatan).trigger('change');
                            $('[name="dosen"]').val(data[i].user_nidn).trigger('change');
                        });
                    }

            	});
            }
            
		});
	</script>
</body>
</html>