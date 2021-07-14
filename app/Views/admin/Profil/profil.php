<?= $this->extend('templates/index'); ?>

<!-- tambahan css -->


<?= $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil Dosen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<div class="container">
    <div class="data">
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="foto">
                    <h4>Foto</h4>
                    <hr>
                    <img src="/assets/img/dosen 1.jpg" alt="">
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="form">
                    <h4>Biodata Dosen</h4>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href='/admin/editprofil'>
                            <button class="btn btn-xs btn-flat btn-info " float='right' ;>
                                Ubah profil
                            </button>
                    </div>
                    </a>
                    <hr>
                    <!-- Table 2 -->
                    <?php foreach ($data_profil as $c) : ?>
                        <table class="table table-striped table-borderless">
                            <tbody>

                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td><?= $c['nama_dosen']; ?></td>
                                </tr>
                                <tr>


                                    <th scope="row">nidn</th>
                                    <td><?= $c['nidn_dosen']; ?></td>

                                </tr>

                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <?php if ($c['level'] == "1") :
                                            echo 'Admin';
                                        elseif ($c['level'] == "2") :
                                            echo 'Dosen Pembimbing';
                                        elseif ($c['level'] == "4") :
                                            echo 'Dosen Penguji';
                                        elseif ($c['level'] == "5") :
                                            echo 'Kaprodi';

                                        endif ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Akademik</th>
                                    <td>
                                        <?= $c['tahun_akademik']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jurusan/Fakultas</th>
                                    <td>
                                        Teknik Informatika/Teknik
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>

                                        <?= $c['jkdosen']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">No. Telp</th>
                                    <td> <?= $c['notelp']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        <?= $c['email']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table><?php endforeach; ?>
                    <!-- Akhir Table 2 -->

                    <div class="proses">
                        <button class="btn btn-primary tombol">Proses</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>