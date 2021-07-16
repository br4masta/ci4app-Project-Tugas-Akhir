<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Dosen</h1>
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



            <?php foreach ($datadosen as $d) : ?>
                <form action="/admin/updatedatadosen/<?= $d['id_dosen']; ?>" method="POST" enctype="multipart/form-data"><?= csrf_field(); ?>
                    <input type="hidden" id="fotolama" name="fotolama" value="<?= $d['foto_dosen']; ?>" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">NIDN</label>
                        <div class="col-sm-8">
                            <input name="nidn" class="form-control <?= ($validation->hasError('nidn')) ? 'is-invalid' : ''; ?>" id="nidn" type="text" value="<?= $d['nidn_dosen']; ?>" />
                            <span></span>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nidn'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" type="text" value="<?= $d['nama_dosen']; ?>" />
                            <span></span>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        </div>
                    </div>

                    <div class=" form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-2">
                            <img src="/img/<?= $d['foto_dosen']; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <input name="foto" id="foto" type="file" value="<?= $d['foto_dosen']; ?>" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" onchange="previewImg()" />
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button class="btn btn-primary btn-square">Simpan</button>
                            <a href="<?= site_url('admin/Datadosen'); ?>" class="btn btn-warning btn-square">Kembali</a>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>

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

    function previewImg() {
        const foto = document.querySelector('#foto');

        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>