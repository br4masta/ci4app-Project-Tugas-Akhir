<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Berita Acara
                </h1>
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
                        <h3 class="card-title">DataTable Berita Acara</h3>
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
                                    <th>Acara</th>

                                    <th>detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($seminar as $c) :
                                ?><tr>

                                        <td><?= $i++; ?></td>
                                        <td><?= $c['nim_mhs']; ?>
                                        </td>
                                        <td><?= $c['nama_mhs']; ?></td>
                                        <td> <?= $c['judul']; ?></td>
                                        <td><?= $c['nama_dosen']; ?></td>
                                        <td><?= $c['acara_sidang']; ?></td>

                                        <td>
                                            <a href='/admin/detailberita/<?= $c['id_seminar']; ?>'>
                                                <button class="btn btn-xs btn-flat btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>

                                    </tr><?php endforeach; ?>
                                <?php foreach ($sidang_ta as $d) : ?>
                                    <tr>

                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nim_mhs']; ?>
                                        </td>
                                        <td><?= $d['nama_mhs']; ?></td>
                                        <td> <?= $d['judul']; ?></td>
                                        <td><?= $d['nama_dosen']; ?></td>
                                        <td><?= $d['acara_sidang_ta']; ?></td>

                                        <td>
                                            <a href='<?php echo site_url('admin/detailberita'); ?>'>
                                                <button class="btn btn-xs btn-flat btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>


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