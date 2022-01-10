<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa</h1>
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


                        <h3 class="card-title">DataTable Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-title  d-flex ">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>
                        <table id="datapengajuan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Detail</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php foreach ($datamhs as $d) : ?>

                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nim_mhs']; ?></td>
                                        <td><?= $d['nama_mhs']; ?></td>


                                        <td>
                                            <a>
                                                <button class="btn btn-xs btn-flat btn-info " data-toggle="modal" data-id="" data-target="#Detail<?= $d['id_mhs']; ?>">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                        <td class=" center">
                                            <a>
                                                <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaledit<?= $d['id_mhs']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="/admin/deletemahasiswa/<?= $d['id_mhs']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini ?')" />
                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </a>
                                        </td>

                                    </tr><?php endforeach; ?>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal tambah-->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/tambahmahasiswa/" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <?php foreach ($akademik as $c) : ?>
                        <input type="hidden" name="dataakademik" id="dataakademik" value="<?= $c['id_dataakademik']; ?>">
                    <?php endforeach; ?>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="" placeholder="masukan nama mahasiswa" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nim Mahasiswa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="" placeholder="masukan nim mahasiswa" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nim'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Jenis Kelamin</label>
                        <div class="col-sm-6">
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Program Studi</label>

                        <div class="col-sm-6">
                            <select name="program_studi_mhs" id="program_studi_mhs" class="form-control" required>

                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Geomatika">Teknik Geomatika</option>
                            </select>


                        </div>

                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Fakultas</label>

                        <div class="col-sm-6">

                            <select name="fakultas_mhs" id="fakultas_mhs" class="form-control" required>

                                <option value="Teknik">Teknik</option>

                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kata Sandi</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="masukan Kata Sandi" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit--><?php foreach ($detailmhs as $c) : ?>
    <div class="modal fade" id="modaledit<?= $c['id_mhs']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/updatemahasiswa/<?= $c['id_mhs']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <!-- hidden input -->

                        <input type="hidden" name="dataakademik" id="dataakademik" value="<?= $c['id_dataakademik']; ?>">

                        <input type="hidden" name="id_user" id="id_user" value="<?= $c['id_user']; ?>">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $c['nama_mhs']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nim Mahasiswa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $c['nim_mhs']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                    <option value="<?= $c['jk_mhs']; ?>"><?= $c['jk_mhs']; ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $c['username']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="password" name="password" value="<?= $c['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Program Studi</label>

                            <div class="col-sm-6">
                                <select name="program_studi_mhs" id="program_studi_mhs" class="form-control" required>
                                    <option value="<?= $c['program_studi_mhs']; ?>" selected><?= $c['program_studi_mhs']; ?></option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Teknik Geomatika">Teknik Geomatika</option>
                                </select>


                            </div>

                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Fakultas</label>

                            <div class="col-sm-6">

                                <select name="fakultas_mhs" id="fakultas_mhs" class="form-control" required>
                                    <option value="<?= $c['fakultas_mhs']; ?>" selected><?= $c['fakultas_mhs']; ?></option>
                                    <option value="Teknik">Teknik</option>

                                </select>

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    </div> <?php endforeach; ?>

<!-- Modal detail--><?php foreach ($detailmhs as $c) : ?>
    <div class="modal fade" id="Detail<?= $c['id_mhs']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="">
                    <?= csrf_field(); ?>
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $c['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $c['password']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Tahun Akademik</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $c['tahun_akademik']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $c['fakultas_mhs']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $c['program_studi_mhs']; ?>" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    </div> <?php endforeach; ?>

<!-- Page specific script -->
<script>
    $(function() {
        $("#datapengajuan").DataTable({
            // "scrollY": "300px",
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        })
    });
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>