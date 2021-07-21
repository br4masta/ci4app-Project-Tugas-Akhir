<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Data Dosen Pembimbing</h1>
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



        <!-- -->
        </select>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Mahasiswa yang di bimbing</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datapengajuan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Aksi</th>


                                </tr>
                            </thead>
                            <tbody><?php $i = 1; ?>
                                <?php foreach ($tampildatadsn as $c) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $c['nim_mhs']; ?>
                                        </td>
                                        <td><?= $c['nama_mhs']; ?></td>
                                        <td> <?= $c['judul']; ?> </td>

                                        <td>
                                            <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                        </td>
                                        <td>
                                            <?= $c['konfirmasi_pembimbing_1']; ?>
                                        </td>
                                        <td>
                                            <a href="/dosen/tabelbimbingan"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                                                </button></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($tampildatadsn2 as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nim_mhs']; ?>
                                        </td>
                                        <td><?= $d['nama_mhs']; ?></td>
                                        <td> <?= $d['judul']; ?> </td>
                                        <td>
                                            <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                        </td>
                                        <td>
                                            <?= $d['konfirmasi_pembimbing_2']; ?>
                                        </td>
                                        <td>
                                            <a href="/dosen/tabelbimbingan"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                                                </button></a>
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
    $(document).ready(function() {
        $("#datapengajuan").DataTable({
            "scrollY": "300px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": false,

            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "fixedColumns": {
                leftColumns: 2
            }
        })
    });
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('dosen/menu'); ?>