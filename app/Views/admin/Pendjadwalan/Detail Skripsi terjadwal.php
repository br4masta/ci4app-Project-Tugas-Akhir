<?= $this->extend('templates/index'); ?>
<!-- css -->



<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Skripsi</h1>
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
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <?php foreach ($data3 as $c);
                foreach ($data4 as $d) : ?>
                    <form class="bootstrap-form-with-validation mx-5">


                        <!-- End: Multi-Select Dropdown by Jigar Mistry -->

                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['nim_mhs']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['nama_mhs']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Acara</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['acara_sidang_ta']; ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['judul']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['tanggal_sidang_ta']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pukul</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['jam_sidang_ta']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['tempat_sidang_ta']; ?> " readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $c['nama_dosen']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 2</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="<?= $d['nama_dosen']; ?>" readonly>
                            </div>
                        </div>
                        <div class=""><label for="textarea-input" class=""></label><label for=" search-input"><strong>Berkas:</strong></label></div>
                        <div id="pdfDownloadLinkContainer" class="mb-5">
                            <a class="action pdf" id="pdfDownloadLink" target="_parent" href="<?= base_url() ?>/assets/admin/berkas/<?= $c['berkas_proposal']; ?>">Download this PDF file</a>
                        </div>
                        <a href="<?= site_url('admin/jadwalskripsi'); ?>" class="btn btn-warning btn-square mb-5">Kembali</a>
                    </form><?php endforeach; ?>
            </div>

        </div>
    </div>
</div>


<!-- /.content -->
<!-- Page specific script -->
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