<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dosen</h1>
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
            <form role="form" class="form-horizontal" enctype="multipart/form-data" action="" method="POST">
                <input type="hidden" id="pgw_id" name="pgw_id" value="1" />
                <div class="form-group">
                    <label class="col-sm-2 control-label">NIDN</label>
                    <div class="col-sm-8">
                        <input name="username" class="form-control" id="username" type="text" value="" />
                        <span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input name="nama" class="form-control" id="nama" type="text" value=" " />
                        <span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-8">
                        <input name="username" class="form-control" id="username" type="text" value="" />
                        <span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input name="password" id="pass" class="form-control" type="password" value="" />
                        <span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="jabatan">
                            <option value="">- Pilih Disini -</option>
                            <option value='2' selected>Administrator</option>
                            <option value='5'>Dosen Tetap</option>
                            <option value='7'>Dosen Tidak Tetap</option>
                            <option value='10'>Ka Progdi SI</option>
                            <option value='11'>Ka Progdi TI</option>
                            <option value='12'>Ka Progdi MI</option>
                            <option value='13'>Ka Progdi KA</option>
                        </select>
                    </div>
                    <span></span>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-8">
                        <input name="userfile" id="userfile" type="file" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button class="btn btn-primary btn-square">Simpan</button>
                        <a href="<?= site_url('Superadmin/index'); ?>" class="btn btn-warning btn-square">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.content- -->
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

<?= $this->include('admin/menu'); ?>