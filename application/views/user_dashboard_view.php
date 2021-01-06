<!DOCTYPE html>
<html>

<head>
	<title>Data Mahasiswa</title>
	<link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() . 'assets/css/datatables.css' ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-lg-8">
				<h3>Data Mahasiswa</h3>
				<?php echo $this->session->flashdata('msg'); ?>
				<a href="<?php echo site_url('login/logout'); ?>" class="btn btn-success btn-sm">Logout</a>
				<a href="<?php echo site_url('evencal/index2/'); ?>" class="btn btn-success btn-sm">Lihat Jadwal</a>
				<hr />
				
				<table class="table table-striped" id="mytable" style="font-size: 14px;">
					<thead>
						<tr>
							<th>No</th>
							<th>User Name</th>
							<th>User Email</th>
							<th>Dosen</th>
							<th>Peminatan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($mahasiswa->result() as $row) :
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->user_name; ?></td>
								<td><?php echo $row->user_email; ?></td>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->nama_peminatan; ?></td>
								<td>
									<a href="<?php echo site_url('edit/get_edit_user/' . $row->user_id); ?>" class="btn btn-sm btn-info">Edit</a>
									<a href="<?php echo site_url('upload/index/' . $row->user_id); ?>" class="btn btn-sm btn-danger">Upload</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/datatables.js' ?>"></script>
	</script>
</body>

</html>