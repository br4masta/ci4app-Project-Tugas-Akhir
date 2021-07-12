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
            <form action="/admin/savedatadosen" method="POST">

                <?= csrf_field(); ?>
                <?php foreach ($dataakademik as $c) : ?>

                    <input type="hidden" name="id_dataakademik" id="id_dataakademik" value="<?= $c['id_dataakademik']; ?>">

                <?php endforeach; ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">NIDN</label>
                    <div class="col-sm-8">
                        <input name="nidn" class="form-control" id="nidn" type="text" value="" autofocus />
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
                    <label class="col-sm-2 control-label">Hak akses</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="jabatan">
                            <option value="">- Pilih Disini -</option>
                            <option value='1' selected>Administrator</option>
                            <option value='2'>Dosen Pembimbing</option>
                            <option value='3'>mahasiswa</option>
                            <option value='4'>Dosen penguji</option>
                            <option value='5'>Kaprodi</option>

                        </select>
                    </div>
                    <span></span>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-8">
                        <input name="foto" id="foto" type="file" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button class="btn btn-primary btn-square">Simpan</button>
                        <a href="<?= site_url('admin/datadosen'); ?>" class="btn btn-warning btn-square">Kembali</a>
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