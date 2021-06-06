<?= $this->extend('templates/index'); ?>
<!-- import css+bootstrap -->

<!--  -->
<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Seminar Proposal</h1>
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
                    <!-- Start: Bootstrap Form Basic -->
                    <form class="bootstrap-form-with-validation mx-5">
                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="katberita">
                                    <option value="" selected>--Pilih Disini--</option>
                                    <option value='1'>Brian Aldy</option>
                                    <option value='2'>Aditya Hermanto</option>
                                    <!-- -->
                                </select>
                            </div>
                        </div>

                        <!-- End: Multi-Select Dropdown by Jigar Mistry -->

                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="2018420017" readonly>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Acara</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="Seminar Proposal" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="Sucipto" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" value="Pemanfaatan Sistem Pendukung Keputusan terhadap Sistem Informasi kelayakan terbang" readonly>
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
                                <input type="email" class="form-control" id="inputEmail3" value="Ruang 205">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="katberita">
                                    <option value="" selected>--Pilih Disini--</option>
                                    <option value='1'>Brian Aldy</option>
                                    <option value='2'>Aditya Hermanto</option>
                                    <!-- -->
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 2</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="katberita">
                                    <option value="" selected>--Pilih Disini--</option>
                                    <option value='1'>Brian Aldy</option>
                                    <option value='2'>Aditya Hermanto</option>
                                    <!-- -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button class="btn btn-primary btn-square">Simpan</button>
                                <a href="<?= site_url('admin/seminar'); ?>" class="btn btn-warning btn-square ">Kembali</a>
                            </div>
                        </div>


                    </form>
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