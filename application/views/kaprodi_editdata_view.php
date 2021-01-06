<!DOCTYPE html>
<html>
<head>
	<title>Data Kaprodi</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-6">
	    	<h3>Data Kaprodi</h3>
	    	
	      	<form action="<?php echo site_url('edit/update_kaprodi');?>" method="post">

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

				<input type="hidden" name="nidn" value="<?php echo $nidn?>" required>
				<button class="btn btn-success" type="submit">Update</button>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
    	$(document).ready(function(){
			//call function get data edit
			get_kaprodi_data_edit();

			//load data for edit
            function get_kaprodi_data_edit(){
            	var nidn = $('[name="nidn"]').val();
            	$.ajax({
            		url : "<?php echo site_url('edit/get_kaprodi_data_edit');?>",
                    method : "POST",
                    data :{nidn : nidn},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="username"]').val(data[i].nama);
                            $('[name="email"]').val(data[i].kaprodi_email);
                            $('[name="password"]').val(data[i].kaprodi_password);
                        });
                    }

            	});
            }
            
		});
	</script>
</body>
</html>