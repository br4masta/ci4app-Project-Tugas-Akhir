<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Detail Berita</h1>
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
											<form class="row g-3">
												<div class="col-md-10">
													<label  class="form-label col-form-label-sm mb-0">Nama Mahasiswa</label>
													<input type="text" class="form-control" id="inputNamaMahasiswa" placeholder="Aditya Hernanda" readonly>

												</div>
											</form>
										</tr>
										<tr>
											<form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Judul</label>
													<input type="text" class="form-control" id="inputJudul" placeholder="judul apik banget bismillah gak revisi" readonly="">
												</div>
											</form>
										</tr>
										<tr>
											<form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Dosen Pembimbing 1</label>
													<input type="text" class="form-control" id="inputDospem1" placeholder="Karim" readonly="">
												</div>
											</form>
										</tr>
										<tr>
											<form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Dosen Pembimbing 2</label>
													<input type="text" class="form-control" id="inputDospem2" placeholder="Sujatmiko" readonly="">
												</div>
											</form>
										</tr>
										<tr>
											<form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Tanggal Bimbingan</label>
													 <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                                   <i class="bi bi-calendar-date"></i>
												</div>
											</form>
										</tr>
										<tr>
											<form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Status</label>
														<select class="form-control">
															<option value="1">BARU</option>
															<option value="1">SETUJU</option>
															<option value="2">REVISI</option>
															<option value="3">TOLAK</option>
														</select>
													</form>
												</tr>
												<tr>
                                           <form class="row g-3">
												<div class="col-md-10">
													<label class="form-label col-form-label-sm mb-0">Saran</label>
                                                <div class="mb-3">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </td>
                                        </tr>
											</tbody>
										</table>
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