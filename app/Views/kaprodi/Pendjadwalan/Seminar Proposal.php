<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa Seminar Proposal</h1>
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
        <div class="d-sm-flex justify-content-between align-items-center mb-4"><a class="btn btn-primary btn-sm d-none d-sm-inline-block d-lg-flex ml-auto" role="button" href="login.html" style="padding: 4px;"><strong>log out</strong></a></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Tempat</th>
                                    <th>detail</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2018420076
                                    </td>
                                    <td>Brian Aldy</td>
                                    <td> Sistem Informasi Tugas Akhir</td>
                                    <td>sucipto</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <a href='<?php echo site_url('admin/detailseminar'); ?>'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href=" <?php echo site_url('admin/editseminar'); ?> " />
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
                                <tr>
                                    <td>2</td>
                                    <td>2018420003
                                    </td>
                                    <td>Aditya Hermanto</td>
                                    <td> Sistem Informasi Pendukung keputusan kelayakan terbang</td>
                                    <td>sucipto</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <a href='<?php echo site_url('admin/detailseminar'); ?>'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="" />
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

                            </tbody>

                        </table>
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

<?= $this->include('kaprodi/menu'); ?>