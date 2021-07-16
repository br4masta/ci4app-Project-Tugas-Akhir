<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dosen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
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

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p><strong>Data Dosen</strong></p>
                        <div class="card-title  d-flex ">

                            <button type="button" class="btn btn-primary btn-sm ml-3" data-toggle="modal" data-target="#modaltambah ">
                                <i class=" fa fa-plus-circle"></i> Tambah Hak Akses
                            </button>

                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIDN</th>
                                    <th>Nama</th>

                                    <th>foto</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>hak akses</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($datadosen as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nidn_dosen']; ?>

                                        </td>
                                        <td><?= $d['nama_dosen']; ?></td>

                                        <td><img src="/img/<?= $d['foto_dosen']; ?>" alt="" width="70"></td>

                                        <td><?= $d['username']; ?>

                                        </td>
                                        <td><?= $d['password']; ?></td>
                                        <td> <?php if ($d['level'] == "1") :
                                                    echo 'Admin';
                                                elseif ($d['level'] == "2") :
                                                    echo 'Dosen Pembimbing';
                                                elseif ($d['level'] == "4") :
                                                    echo 'Dosen Penguji';
                                                elseif ($d['level'] == "5") :
                                                    echo 'Kaprodi';

                                                endif ?></td>
                                        <td class="center">
                                            <!-- <a href="<?= site_url('admin/editdatadosen'); ?>">
                                                <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> -->
                                            <a href="/admin/deletedosenhakakses/<?= $d['id_level']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini ?')" />
                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal edit--><?php foreach ($dosenta as $d) : ?>
    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/tambahdosenhakakses/<?= $d['id_dosenta']; ?>" method="POST">

                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_dosenta" id="id_dosenta" value="<?= $d['id_dosenta']; ?>">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Dosen </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama_dosen']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">NIDN </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $d['nidn_dosen']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Pilih Role</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="jabatan" id="jabatan">
                                    <option value="">- Pilih Disini -</option>
                                    <option value='1' selected>Administrator</option>
                                    <option value='2'>Dosen Pembimbing</option>
                                    <option value='4'>Dosen penguji</option>
                                    <option value='5'>Kaprodi</option>

                                </select>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Tambah data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>


        </div>
    </div><?php endforeach; ?>

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