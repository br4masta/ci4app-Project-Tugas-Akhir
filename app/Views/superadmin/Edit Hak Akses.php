<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Edit Hak Akses</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content- -->

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="the-box full">
					<form role="form" class="form-horizontal" action="http://localhost/CodeIgniter_SiMonTA-master/admin/akses/submit/1" method="POST">
						<input type="hidden" name="akses_id" id="akses_id">
						<div class="form-group">
							<label class="col-sm-2 control-label">Dosen</label>
							<div class="col-sm-8">
								<select class="form-control" name="pegawai">
									<option value="" selected>--Pilih Disini--</option>
									<option value='1' selected>Tory Ariyanto</option>
									<option value='2'>Rifqi Maulana</option>
									<option value='3'>Christanto P.A</option>
									<option value='4'>Eddy Priyadi</option>
									<option value='5'>Christian Yulianto Rusli</option>
									<option value='6'>Prastuti Sulistyorini</option>
									<option value='7'>Tri Pudji W</option>
									<option value='9'>Asif bin Barkhiya</option>
									<option value='20'>nemo</option>
									<option value='21'>wqw</option>
									<option value='22'>fa</option>
									<option value='23'>dsm</option>
									<option value='24'>mcm</option>
									<option value='25'>tessatu</option>
								</select>
								<span></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Level</label>
							<div class="col-sm-8">
								<input type='checkbox' name='level[]' value='2' checked>Administrator<br><input type='checkbox' name='level[]' value='4' checked>Dosen Pembimbing<br><input type='checkbox' name='level[]' value='10'>Ka. Prodi SI<br><input type='checkbox' name='level[]' value='11'>Ka. Prodi TI<br><input type='checkbox' name='level[]' value='12'>Ka. Prodi MI<br><input type='checkbox' name='level[]' value='13'>Ka. Prodi KA<br> <span></span>
							</div>

						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-8">
								<button class="btn btn-primary btn-square">Simpan</button>
								<a href="<?= site_url('superadmin/hakakses'); ?>" class="btn btn-warning btn-square">Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('superadmin/menu'); ?>