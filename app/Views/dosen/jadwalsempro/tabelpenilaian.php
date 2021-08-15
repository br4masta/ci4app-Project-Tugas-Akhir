<?= $this->extend('templates/index'); ?>
<!-- css -->


<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Penilaian Seminar Proposal</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->





<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid" src="<?= base_url(); ?>/assets/style/img/pdf.png" alt="User profile picture">
						</div>
						<div class="mt-5" style=" text-align : center; vertical-align: middle;">
							<button type="button" class="btn btn-outline-primary btn-sm">View File</button>
						</div>

					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="settings">

								<!-- Table 1 -->
								<table class="table table-striped table-borderless">
									<tbody>
										<tr>
											<th scope="row">Nama</th>
											<td>Brian Aldy Bramasta</td>
										</tr>
										<tr>
											<th scope="row">NIM</th>
											<td>2018420080</td>
										</tr>
										<tr>
											<th scope="row">Judul</th>
											<td>
												Teknik Informatika
											</td>
										</tr>
										<tr>
											<th scope="row">Nilai</th>
											<td >
												<div class="mb-3">
													<input type="text" class="form-control" id="exampleFormControlInput1">
												</div>
											</td>
										</tr>
										<tr>
											<th scope="row">Konfirmasi</th>
											<td >
												<select class="form-select" aria-label="Default select example">
													<option value="1">Setuju</option>
													<option value="2">Setuju dengan Revisi</option>
													<option value="3">Tidak Setuju</option>
													<option value="3">Revisi</option>
												</select>
											</td>
										</tr>
										<tr>
											<th scope="row">Catatan</th>
											<td >
												<div class="mb-3">
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="proses">
									<button class="btn btn-primary tombol">Proses</button>
								</div>
								<!-- Akhir Table 2 -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>

	<!-- /.content -->
	<?= $this->endSection(); ?>

	<?= $this->include('dosen/menu'); ?>