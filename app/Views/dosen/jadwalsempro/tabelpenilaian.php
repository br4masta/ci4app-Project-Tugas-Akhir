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
					<?php foreach ($sempro as $d) : ?>
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid" src="<?= base_url(); ?>/assets/style/img/pdf.png" alt="User profile picture">
							</div>
							<div class="mt-5" style=" text-align : center; vertical-align: middle;">
								<a href="<?= base_url(); ?>/assets/img/file/<?= $d['berkas_proposal']; ?>"> <button type="button" class="btn btn-outline-primary btn-sm">View File</button></a>
							</div>
						<?php endforeach; ?>
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
								<?php foreach ($sempro as $a) : ?>
									<form action="/dosen/updatesempro/<?= $a['id_seminar']; ?>" method="POST">
										<?= csrf_field(); ?>
										<table class="table table-striped table-borderless">
											<div class="form-group row">
												<input type="hidden" name="id_seminar" id="id_seminar" value="<?= $a['id_seminar']; ?>">
											</div>
											<tbody>
												<tr>
													<th scope="row">Nama</th>
													<td><?= $a['nama_mhs']; ?></td>
												</tr>
												<tr>
													<th scope="row">NIM</th>
													<td><?= $a['nim_mhs']; ?></td>
												</tr>
												<tr>
													<th scope="row">Judul</th>
													<td>
														<?= $a['judul']; ?>
													</td>
												</tr>
												<?php if ($status_dospem == 'dosen pembimbing I') : ?>
													<tr>
														<th scope="row">Nilai Pembimbing I</th>
														<td>
															<div class="form-group mb-3">
																<input type="text" class="form-control" name="nilai" id="nilai" value="<?= $a['nilai_pembimbing_1']; ?>">
															</div>

														</td>
													</tr>
													<tr>
														<th scope="row">Konfirmasi</th>
														<td>

															<div class="form-group row">
																<div class="col-sm-6">
																	<select name="status" id="status" class="form-control" required>
																		<option value="<?= $a['status']; ?>" selected><?= $a['status']; ?></option>
																		<option value="lanjut">Lanjut</option>
																		<option value="disetujui dengan revisi">Disetujui dengan revisi</option>
																		<option value="mengulang">Mengulang</option>
																	</select>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<th scope="row">Catatan Pembimbing I</th>
														<td>
															<div class="form-group mb-3">
																<textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $a['catatan_pembimbing_1']; ?></textarea>
															</div>
														</td>
													</tr>
													<!-- jika dosen login sebagai pembimbing II-->
												<?php elseif ($status_dospem == 'dosen pembimbing II') : ?>

													<tr>
														<th scope="row">Nilai Pembimbing II</th>
														<td>
															<div class="form-group mb-3">
																<input type="text" class="form-control" name="nilai" id="nilai" value="<?= $a['nilai_pembimbing_2']; ?>">
															</div>

														</td>
													</tr>
													<tr>
														<th scope="row">Konfirmasi</th>
														<td>

															<div class="form-group row">
																<div class="col-sm-6">
																	<select name="status" id="status" class="form-control" required>
																		<option value="<?= $a['status']; ?>" selected><?= $a['status']; ?></option>
																		<option value="lanjut">Lanjut</option>
																		<option value="disetujui dengan revisi">Disetujui dengan revisi</option>
																		<option value="mengulang">Mengulang</option>
																	</select>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<th scope="row">Catatan Pembimbing II</th>
														<td>
															<div class="form-group mb-3">
																<textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $a['catatan_pembimbing_2']; ?></textarea>
															</div>
														</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
										<div class="proses">
											<button class="btn btn-primary tombol">Proses</button>
										</div>
										<!-- Akhir Table 2 -->
									</form>
							</div>
						<?php endforeach; ?>
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