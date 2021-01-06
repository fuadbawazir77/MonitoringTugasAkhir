<!DOCTYPE html>
<html>

<head>
	<title>Data Kaprodi</title>
	<link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() . 'assets/css/datatables.css' ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-lg-8">
				<center>
					<h3>PAGE KAPRODI</h3>
				</center>
				<?php echo $this->session->flashdata('msg'); ?>
				<a href="<?php echo site_url('login/logout'); ?>" class="btn btn-success btn-sm">Logout</a>
				
				<hr />
				<h3>Data Diri</h3>
				<table class="table table-striped" id="mytable" style="font-size: 14px;">
					<thead>
						<tr>
							<th>No</th>
							<th>NIDN</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($kaprodi_data->result() as $row) :
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->nidn; ?></td>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->kaprodi_email; ?></td>
								<td>
									<a href="<?php echo site_url('edit/get_edit_kaprodi/' . $row->nidn); ?>" class="btn btn-sm btn-info">Edit</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<h3>Data Dosen</h3>
				<table class="table table-striped" id="mytable" style="font-size: 14px;">
					<thead>
						<tr>
							<th>No</th>
							<th>NIDN</th>
							<th>Dosen Email</th>
							<th>Nama</th>
							<th>Peminatan</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Maximum Tampung</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($kaprodi->result() as $row) :
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->nidn; ?></td>
								<td><?php echo $row->dosen_email; ?></td>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->nama_peminatan; ?></td>
                                <td><?php echo $row->dosen_jumlah_mhs; ?></td>
                                <td><?php echo $row->dosen_count; ?></td>
								<td><a href="<?php echo site_url('edit/get_edit_kaprodi_dosen/'.$row->nidn); ?>" class="btn btn-sm btn-info">Edit Max</a></td>
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