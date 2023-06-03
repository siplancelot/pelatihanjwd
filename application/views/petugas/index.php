<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $judul ;?></h1>
		<a href="<?php echo base_url('petugas/add') ?>"
			class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i> Tambah Data</a>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="table" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No. </th>
							<th>Nama Petugas</th>
							<th>No. Telp</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$i = 1;
              foreach($petugas as $items) : ?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><?php echo $items["nama_petugas"] ;?></td>
								<td><?php echo $items["telp_petugas"] ;?></td>
								<td><?php echo $items["email_petugas"] ;?></td>
								<td>
									<a href="#" class="btn btn-warning">Update</a>
									<a href="#" class="btn btn-danger">Delete</a>
								</td>
							</tr>
					<?php endforeach ;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
