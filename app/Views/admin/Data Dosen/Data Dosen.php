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
<!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<section class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">

                        <a href="<?= site_url('admin/tambahdatadosen'); ?>"><button type="button" class="btn btn-primary btn-sm">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button></a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIDN</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>foto</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2000011133

                                    </td>
                                    <td>Sucipto</td>
                                    <td>Sucipto</td>
                                    <td><img src="<?= base_url('assets/img/dosen 1.jpg');  ?>" alt="" width="70"></td>
                                    <td class="center">
                                        <a href="<?= site_url('admin/editdatadosen'); ?>" />
                                        <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        </a>
                                        <a href="" onClick="return confirm('Anda yakin akan menghapus data ini ?')" />
                                        <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        </a>
                                    </td>
                                </tr>

                        </table>
                    </div>

                </div>

            </div>

        </div>

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
            "searching": true,
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