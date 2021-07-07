<!-- Profile Image -->
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <?php
            foreach ($tampildatadosen as $dd) :

            ?>
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/assets/style/img/user4-128x128.jpg" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center"><?= $dd['nama_dosen']; ?></h3>

        <p class="text-muted text-center"><?= $dd['nidn_dosen'] ?></p>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<?php endforeach ?>
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

                            <th scope="row">Nama Lengkap</th>
                            <td></td>
                            </tr>
                            <tr>
                                <th scope="row">NIP</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Pria/Wanita">
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
                                <th scope="row">Tahun Akademik</th>
                                <td>

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