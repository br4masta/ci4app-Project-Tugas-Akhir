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
                        <?php
                        foreach ($tampildatamhs as $row2) : ?>
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Lengkap</th>
                                    <td><?= $row2['nama_mhs']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">NIM</th>
                                    <td><?= $row2['nim_mhs']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Program Studi/Fakultas</th>
                                    <td>
                                        <?= $row2['program_studi_mhs']; ?>/<?= $row2['fakultas_mhs']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $row2['jk_mhs'] ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tempat Lahir</th>
                                    <td>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $row2['tplhr_mhs'] ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Lahir</th>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="date" value="<?= $row2['tgllhr_mhs'] ?>" id="example-date-input">
                                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-date"></i></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">No. Telp</th>
                                    <td>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $row2['handphone'] ?>" placeholder="081234567890">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="exampleFormControlInput1" value="<?= $row2['email_mhs'] ?>" placeholder="name@example.com">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php break;
                        endforeach ?>
                    </table>

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $row2['id_mhs']; ?>')"> Simpan </button>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">


                <img class="profile-user-img img-fluid img-circle" src="/img/default.png" alt="User profile picture">
            </div>
            <?php
            foreach ($tampildatadosenmhs as $row1) : ?>
                <h3 class="profile-username text-center"><?= $row1['nama_mhs']; ?></h3>

                <p class="text-muted text-center"><?= $row1['nim_mhs']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <?php if ($row1['dos1_nama'] == null) {
                        echo ' <li class="list-group-item">
                    <b>Dosen Pembimbing I</b> <a class="float-right"></a>
                </li>';
                    } else {
                        echo "<li class='list-group-item'>
                    <b>Dosen Pembimbing I</b> <a class='float-right'>" . $row1['dos1_nama'] . "</a></li>";
                    }
                    ?>
                    <?php if ($row1['dos2_nama'] == null) {
                        echo ' <li class="list-group-item">
                    <b>Dosen Pembimbing I</b> <a class="float-right"></a>
                </li>';
                    } else {
                        echo "<li class='list-group-item'>
                    <b>Dosen Pembimbing I</b> <a class='float-right'>" . $row1['dos2_nama'] . "</a></li>";
                    }
                    ?>
                </ul>
        </div>
    <?php break;
            endforeach ?>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->


<script>
    $(document).ready(function() {
        $("#datamahasiswa").DataTable({
            "autoWidth": false,
            "lengthChange": true,
            "responsive": true,
        })
    });

    function edit(id_mhs) {
        $.ajax({
            type: "post",
            url: "<?= site_url('mahasiswa/formedit'); ?>",
            data: {
                id_mhs: id_mhs
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    };
</script>