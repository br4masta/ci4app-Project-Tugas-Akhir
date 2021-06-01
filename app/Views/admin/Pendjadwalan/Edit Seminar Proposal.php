<?= $this->extend('templates/index'); ?>
<!-- import css+bootstrap -->

<!--  -->
<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Seminar</h1>
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
            <div class="card ">
                <div class="form-group">
                    <!-- Start: Bootstrap Form Basic -->
                    <form class="bootstrap-form-with-validation mx-5">
                        <div class="form-group"><label for="password-input"><strong>Nama:&nbsp;</strong></label>
                            <!-- Start: Multi-Select Dropdown by Jigar Mistry --><select class="form-control" name="katberita">
                                <option value="" selected>--Pilih Disini--</option>
                                <option value='1'>Brian Aldy</option>
                                <option value='2'>Aditya Hermanto</option>
                                <!-- -->
                            </select>
                            <!-- End: Multi-Select Dropdown by Jigar Mistry -->
                        </div>
                        <div class="form-group"><label for="text-input"><strong>Nim:&nbsp;</strong></label><label for="text-input">&nbsp;2018420076</label></div>
                        <div class="form-group"><label for="email-input"><strong>Judul:&nbsp;</strong></label><label for="email-input">Pemanfaatan Sistem Pendukung Keputusan terhadap Sistem Informasi kelayakan terbang</label></div>
                        <div class="form-group"><label for="textarea-input"><strong>HARI&nbsp;</strong></label><input class="form-control" type="date" name="tanggal ujian"><label for="textarea-input"></label></div>
                        <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Pukul:</strong></label><input class="form-control" type="time" name="jam ujian"></div>
                        <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Masukan Tempat:</strong></label><input class="form-control" type="text"></div>
                        <div class="form-group"><label for="password-input"><strong>Pilih Dosen Penguji 1:&nbsp;</strong></label>
                            <!-- Start: Multi-Select Dropdown by Jigar Mistry --><select class="form-control" name="katberita">
                                <option value="" selected>--Pilih Disini--</option>
                                <option value='1'>Brian Aldy</option>
                                <option value='2'>Aditya Hermanto</option>
                                <!-- -->
                            </select>
                            <!-- End: Multi-Select Dropdown by Jigar Mistry -->
                        </div>
                        <div class="form-group"><label for="password-input"><strong>Pilih Dosen Penguji 2:&nbsp;</strong></label>
                            <!-- Start: Multi-Select Dropdown by Jigar Mistry --><select class="form-control" name="katberita">
                                <option value="" selected>--Pilih Disini--</option>
                                <option value='1'>Brian Aldy</option>
                                <option value='2'>Aditya Hermanto</option>
                                <!-- -->
                            </select>
                            <!-- End: Multi-Select Dropdown by Jigar Mistry -->
                        </div>
                        <div class="form-group"><label for="textarea-input"></label><label for="textarea-input"><strong>Status</strong></label>
                            <div class="custom-control custom-radio"><input type="radio" id="customRadio1" class="custom-control-input" name="customRadio" checked=""><label class="custom-control-label" for="customRadio1">Aktif</label></div>
                            <div class="custom-control custom-radio"><input type="radio" id="customRadio2" class="custom-control-input" name="customRadio"><label class="custom-control-label" for="customRadio2">NonAktif</label></div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"></div>
                            </div>
                        </div>
                        <!-- Start: Bootstrap 4's Custom Radios & Checkboxes -->
                        <div>
                            <fieldset></fieldset>
                            <fieldset></fieldset>
                        </div>
                        <!-- End: Bootstrap 4's Custom Radios & Checkboxes -->
                        <div class="form-group">
                            <!-- Start: Bootstrap 4's Custom Radios & Checkboxes -->
                            <div>
                                <fieldset></fieldset>
                                <fieldset></fieldset>
                            </div>
                            <!-- End: Bootstrap 4's Custom Radios & Checkboxes --><label for="textarea-input"></label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button class="btn btn-primary btn-square">Simpan</button>
                                <a href="" class="btn btn-warning btn-square">Kembali</a>
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
<!-- /.import js -->


<?= $this->include('admin/menu'); ?>