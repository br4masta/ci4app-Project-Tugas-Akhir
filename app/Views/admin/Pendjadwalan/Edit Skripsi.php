<?= $this->extend('templates/index'); ?>
<!-- import css+bootstrap -->

<!--  -->
<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Skripsi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="form-group">
                    <!-- Start: Bootstrap Form Basic --><?php foreach ($data1 as $c);
                                                        foreach ($data2 as $d) : ?>
                        <form class="bootstrap-form-with-validation mx-5" action="/admin/updatejadwalskripsi/<?= $c['id_jadwal_ta']; ?>" method="POST">
                            <div class="row mb-3 mt-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama_mhs']; ?>" readonly>
                                    </select>
                                </div>
                            </div>

                            <!-- End: Multi-Select Dropdown by Jigar Mistry -->

                            <div class="row mb-3 mt-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nim" name="nim" value=" <?= $d['nim_mhs']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Acara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="acara" name="acara" value="<?= $d['acara_sidang_ta']; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $d['judul']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="tanggal ujian">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pukul</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="time" name="jam ujian">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ruang" name="ruang" value=" <?= $d['tempat_sidang_ta']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                                <div class="col-sm-10">

                                    <select class="form-control" id="penguji1" name="penguji1">
                                        <option value="" selected>--Pilih Disini--</option>
                                        <?php foreach ($data3 as $a) : ?>

                                            <option value='<?= $a['id_dosenpenguji']; ?>'><?= $a['nama_dosen']; ?></option><?php endforeach; ?>

                                        <!-- -->
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                                <div class="col-sm-10">

                                    <select class="form-control" id="penguji2" name="penguji2">
                                        <option value="" selected>--Pilih Disini--</option>
                                        <?php foreach ($data4 as $b) :
                                        ?>
                                            <option value='<?= $b['id_dosenpenguji']; ?>'><?= $b['nama_dosen']; ?></option><?php endforeach; ?>

                                        <!-- -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button class="btn btn-primary btn-square">Simpan</button>
                                    <a href="<?= site_url('admin/jadwalskripsi'); ?>" class="btn btn-warning btn-square ">Kembali</a>
                                </div>
                            </div>


                        </form><?php endforeach; ?>
                    <!-- End: Bootstrap Form Basic -->
                </div>
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