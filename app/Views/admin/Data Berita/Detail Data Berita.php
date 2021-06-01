<?= $this->extend('templates/index'); ?>
<!-- css -->


<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Seminar</h1>
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
                <form class="bootstrap-form-with-validation mx-5">
                    <div class="form-group"><label for="password-input"><strong>Nama:&nbsp;</strong></label>
                        <!-- Start: Multi-Select Dropdown by Jigar Mistry --><select class="form-control multiselect-ui form-control" id="dates-field2" multiple="">
                            <option value="12" selected="">Brian Aldy Bramasta</option>
                            <option value="13">Aditya Hermanto</option>
                            <option value="14">Faisal Roshadi</option>
                        </select>
                        <!-- End: Multi-Select Dropdown by Jigar Mistry -->
                    </div>
                    <div class="form-group"><label for="text-input"><strong>Nim:&nbsp;</strong></label><label for="text-input">&nbsp;2018420076</label></div>
                    <div class="form-group"><label for="text-input"><strong>Acara:</strong></label><label for="text-input">&nbsp;Seminar Proposal</label></div>
                    <div class="form-group"><label for="email-input"><strong>Judul:&nbsp;</strong></label><label for="email-input">Pemanfaatan Sistem Pendukung Keputusan terhadap Sistem Informasi kelayakan terbang</label></div>
                    <div class="form-group"><label for="textarea-input"><strong>HARI:&nbsp;</strong></label><label for="email-input">27 Juli 2021</label><label for="textarea-input"></label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Pukul:</strong></label><label for="email-input">&nbsp; 09.30</label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Tempat:</strong></label><label for="email-input">&nbsp; Ruang 205</label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="textarea-input"><strong>Dosen Pembimbing:</strong></label><label for="email-input">&nbsp; Sucipto</label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Dosen Penguji:</strong></label><label for="email-input">&nbsp; Dosen 1</label><label for="email-input">&nbsp; Dosen 2</label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="textarea-input"><strong>Nilai:</strong></label><label for="email-input">&nbsp; B</label></div>
                    <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>Revisi :</strong></label><label for="email-input"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></label>
                        <label for="email-input"></label>
                    </div>
                    <div class="form-group"><label for="textarea-input"></label><label for="search-input"><strong>File:</strong></label><label for="email-input"></label></div>
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
                    <div class="form-group"><button class="btn btn-warning" type="submit">Kembali</button></div>
                </form>
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