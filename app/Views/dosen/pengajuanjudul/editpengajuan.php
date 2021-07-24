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
								<?php foreach ($data as $c) : ?>
									<form action="/dosen/updatepengajuan/<?= $c['id_pengajuan']; ?>" method="POST" enctype="multipart/form-data">
										<?= csrf_field(); ?>
										<table class="table table-striped table-borderless">
											<tbody>
												<tr>
													<form class="row g-3">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">Nama Mahasiswa</label>
															<input type="text" class="form-control" id="inputNamaMahasiswa" value="<?= $c['nama_mhs']; ?>" readonly>

														</div>
													</form>
												</tr>
												<tr>
													<form class="row g-3">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">Judul</label>
															<input type="text" class="form-control" id="inputJudul" value="<?= $c['judul']; ?>" readonly="">
														</div>
													</form>
												</tr>
												<tr>
													<form class="row g-3">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">deskripsi</label>
															<textarea class="form-control" id="catatan" name="catatan" rows="7" readonly> <?= $c['deskripsi']; ?> </textarea>

														</div>
													</form>
												</tr>
												<tr>
													<form class="row g-3">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">Dosen Pembimbing 1</label>
															<input type="text" class="form-control" id="inputDospem1" value="<?= $c['dos1_nama']; ?>" readonly="">
														</div>
													</form>
												</tr>
												<tr>
													<form class="row g-3">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">Dosen Pembimbing 2</label>
															<input type="text" class="form-control" id="inputDospem2" value="<?= $c['dos2_nama']; ?>" readonly="">
														</div>
													</form>
												</tr>
												<tr>
													<div class=" form-group">
														<div class="col-md-10">
															<label class="form-label col-form-label-sm mb-0">Status Konfirmasi</label>
															<select class="form-control" id="konfirmasi" name="konfirmasi">
																<option value="belum di setujui">Belum di setujui</option>
																<option value="di setujui">Di Setujui</option>
																<option value="di tolak">Di tolak</option>
															</select>
														</div>
													</div>
												</tr>
												<div class="form-group mt-5">
													<div class="col-sm-offset-2 col-sm-8">
														<button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">simpan</button>
														<a href="<?= site_url('dosen/judul'); ?>" class="btn btn-secondary">Kembali</a>
													</div>
												</div>
											</tbody>


										</table>
									</form> <!-- Akhir Table 2 -->
								<?php endforeach; ?>
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