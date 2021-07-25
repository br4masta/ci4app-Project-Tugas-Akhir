<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Jadwal Mahasiswa Skripsi</h1>
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
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="card-title">Data Sidang Tugas Akhir</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datapengajuan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Dosen penguji I</th>
                                    <th>Dosen penguji II</th>
                                    <th>Tanggal</th>
                                    <th>Tempat</th>
                                    <th>acara</th>
                                    <th>Pukul</th>
                                    <th>Status Penjadwalan</th>
                                    <th>detail</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>
                                <?php foreach ($jadwal as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nim_mhs']; ?>
                                        </td>
                                        <td><?= $d['nama_mhs']; ?></td>
                                        <td> <?= $d['judul']; ?></td>
                                        <td><?= $d['nama_dosen']; ?></td>
                                        <td><?= $d['penguji2_nama']; ?></td>
                                        <td><?= $d['tanggal_sidang_ta']; ?></td>
                                        <td><?= $d['tempat_sidang_ta']; ?></td>
                                        <td><?= $d['acara_sidang_ta']; ?></td>
                                        <td><?= $d['jam_sidang_ta']; ?></td>
                                        <td><?= $d['status_penjadwalan_kaprodi_ta']; ?></td>
                                        <td>
                                            <a href='/admin/detailskripsiterjadwal/<?= $d['id_jadwal_ta']; ?>'>
                                                <button class="btn btn-xs btn-flat btn-info">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                        <td class="center">
                                            <a href='/admin/editskripsi/<?= $d['id_jadwal_ta']; ?>'><button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                    <i class="fa fa-edit"></i>
                                                </button></a>

                                            <!-- <a href='/admin/ooo/' onClick="return confirm('Anda yakin akan menghapus data ini ?')">
                                                <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </a> -->

                                        </td>
                                    </tr><?php endforeach; ?>


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
        $("#datapengajuan").DataTable({
            "scrollY": "300px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": false,

            "fixedColumns": {
                leftColumns: 2
            }
        })
    });
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>