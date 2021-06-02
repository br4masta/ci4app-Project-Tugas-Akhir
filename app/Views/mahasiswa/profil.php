<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="row pt-4 pb-5 ">
                        <div class="col-md-6 text-center">
                            <h3 class="text-center">Profile Picture</h3>
                            <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="col-md-6">
                            <h3>Detail Profile</h3>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="col-form-label">NIM Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Nama Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Email Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Handphone Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                                    </div>
                                </div>
                                <button class="btn btn-success " name="save">Proses</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
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

<?= $this->include('mahasiswa/menu'); ?>