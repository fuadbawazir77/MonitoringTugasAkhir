<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-6">
	    	<h3>Daftar Mahasiswa</h3>
	    	
	      	<form action="<?php echo site_url('register/daftar');?>" method="post">

	      		<div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
					<br>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
					<br>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>

				<div class="form-group">
				    <label>Peminatan</label>
				    <select class="form-control" name="peminatan" id="peminatan" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($peminatan as $row):?>
				    	<option value="<?php echo $row->id_peminatan;?>"><?php echo $row->nama_peminatan;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>

				<div class="form-group">
				    <label>Dosen Pembimbing</label>
				    <select class="form-control" id="dosen" name="dosen" required>
				    	<option value="">No Selected</option>

				    </select>
				</div>

				<button class="btn btn-success" type="submit">Daftar</button>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#peminatan').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('register/get_sub_peminatan');?>",
                    method : "POST",
                    data : {id_peminatan: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].nidn+'>'+data[i].nama+'</option>';
                        }
                        $('#dosen').html(html);

                    }
                });
                return false;
            }); 
            
		});
	</script>
</body>
</html>