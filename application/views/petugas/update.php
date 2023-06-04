<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Update Data</h1>
	</div>

	<div class="card">
		<div class="card-body">
			<form action="<?php echo base_url('petugas/update/'. $petugas["id_petugas"]) ;?>" method="POST">
				<div class="row">
					<div class="col-lg-12 d-flex justify-content-center">
						<div class="form-group mb-3 w-50">
							<label>Nama Petugas</label>
							<input type="text" name="nama" id="nama" class="form-control"
								value="<?= $petugas["nama_petugas"]; ?>">
							<?= form_error('nama', '<small class="text-danger">', '</small>') ;?>
						</div>
					</div>
					<div class="col-lg-12 d-flex justify-content-center">
						<div class="form-group mb-3 w-50">
							<label>No. Telp</label>
							<input type="number" name="telpon" id="telpon" class="form-control"
								value="<?php echo $petugas["telp_petugas"]; ?>">
							<?= form_error('telpon', '<small class="text-danger">', '</small>') ;?>
						</div>
					</div>
					<div class="col-lg-12 d-flex justify-content-center">
						<div class="form-group mb-3 w-50">
							<label>Email</label>
							<input type="email" name="email" id="Email" class="form-control"
								value="<?php echo $petugas["email_petugas"]; ?>">
							<?= form_error('email', '<small class="text-danger">', '</small>') ;?>
						</div>
					</div>
					<div class="col-lg-12 d-flex justify-content-center">
						<input type="submit" class="btn btn-md btn-primary rounded-75" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
