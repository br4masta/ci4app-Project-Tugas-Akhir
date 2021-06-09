<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Profil Dosen</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/assets/style/img/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Cokro Winoto S,pd</h3>

                        <p class="text-muted text-center">1234567890</p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                               
                                <!-- Table 1 -->
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama Lengkap</th>
                                            <td>Cokro Winoto S,pd</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIP</th>
                                            <td>1234567890</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td>
                                                Dosen Pembimbing
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Agama</th>
                                            <td>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected>--- Pilih Agama ---</option>
                                                    <option value="1">Islam</option>
                                                    <option value="2">Kristen</option>
                                                    <option value="3">Hindu</option>
                                                    <option value="3">Budha</option>
                                                    <option value="3">KonghuCu</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tempat Lahir</th>
                                            <td>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option selected>--- Tempat Lahir ---</option>
                                                    <option value="1">Gresik</option>
                                                    <option value="1">Surabaya</option>
                                                    <option value="2">Sidoarjo</option>
                                                    <option value="3">TulungAgung</option>
                                                </select>
                                                <small>
                                                    *Pilih Lain-Lain jika tidak ditemukan Tempat Lahir Yang Sesuai
                                                </small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Lahir</th>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
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
                                        </tr>
                                        <tr>
                                            <th scope="row">No. Telp</th>
                                            <td>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="081234567890">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pin</th>
                                            <td>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="3213">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Akhir Table 2 -->
                                <div>
                                    <button type="submit" class="btn btn-danger">Proses</button>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>

<?= $this->include('dosenpenguji/menu'); ?>