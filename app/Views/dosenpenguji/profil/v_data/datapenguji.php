<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <?php
                foreach ($tampildata as $row1) : ?>
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/assets/style/img/user4-128x128.jpg" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= $row1['nama_dosen']; ?></h3>

            <p class="text-muted text-center"><?= $row1['nidn_dosen']; ?></p>
        </div>
    <?php break;
                endforeach ?>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
<?php
foreach ($tampildata as $row2) : ?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <!-- Table 2 -->
                        <table class="table table-striped table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td> <?= $row2['nama_dosen']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">NIDN</th>
                                    <td><?= $row2['nidn_dosen']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>
                                        <?= $row2['role_penguji']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun Akademik</th>
                                    <td>
                                        <?= $row2['tahun_akademik']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Program Studi/Fakultas</th>
                                    <td>
                                        <?= $row2['program_studi_dosen']; ?>/<?= $row2['fakultas_dosen']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>

                                        <?= $row2['jkdosen']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">No. Telp</th>
                                    <td> <?= $row2['notelp']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        <?= $row2['email']; ?>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <!-- /.row -->
<?php break;
endforeach ?>