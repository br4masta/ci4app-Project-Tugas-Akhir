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
            <!-- <div class="col-lg-3 col-md-3">
                <div class="foto">
                    <h4>Foto</h4>
                    <hr>
                    <img src="/assets/img/dosen 1.jpg" alt="" style="">
                </div>
            </div> -->

            <div class="col-lg-9 col-md-9">
                <div class="form">
                    <h4>Biodata Dosen</h4>
                    <hr>
                    <!-- Table 2 --><?php foreach ($data_profil as $c) : ?>
                        <form action="/admin/updatedataprofil/<?= $c['id_dosen']; ?>" method="POST" enctype="multipart/form-data"><?= csrf_field(); ?>
                            <table class="table table-striped table-borderless">
                                <tbody>

                                    <tr>
                                        <th scope="row">Nama lengkap</th>
                                        <td>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="<?= $c['nama_dosen']; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>


                                        <th scope="row">nidn</th>
                                        <td><?= $c['nidn_dosen']; ?></td>

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
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio1" value="Laki-laki">
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio2" value="Perempuan">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                <th scope="row">Agama</th>
                                <td>
                                    <select class="form-control" aria-label="Default select example">
                                        <option selected>--- Pilih Agama ---</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="3">KonghuCu</option>
                                    </select>
                                </td>
                            </tr> -->
                                    <!-- <tr>
                                <<th scope="row">Tempat lahir</th>
                                    <td>
                                        <div class="mb-3">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="MM/DD/YYYY" aria-label="Tanggal Lahir" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-date"></i></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr> -->
                                    <tr>
                                        <th scope="row">No. Telp</th>
                                        <td>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="" value="<?= $c['notelp']; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?= $c['email']; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                <th scope="row">Pin</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="3213">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">HP </th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="081234567890">
                                    </div>
                                </td>
                            </tr> -->
                                </tbody>
                            </table>

                            <div class="proses">
                                <button class="btn btn-primary tombol">Proses</button>
                            </div>
                        </form>
                    <?php endforeach; ?>
                    <!-- Akhir Table 2 -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>