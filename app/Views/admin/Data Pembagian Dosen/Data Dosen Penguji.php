<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dosen Penguji</h1>
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
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="the-box full">
                    <div class="table-responsive" style="margin:5px;padding:5px" id="stack-personal">
                        <p><strong>Data Dosen Penguji</strong></p>
                        <div class="card-title  d-flex ">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width='5%'>NO</th>
                                    <th width='15%'>NPPY</th>
                                    <th width='15%'>NAMA</th>
                                    <th width='15%'>Role</th>
                                    <th width='15%'>Plot</th>
                                    <th width='15%'>FOTO</th>
                                    <!-- <th width='5%'>Detail</th> -->
                                    <th width='5%'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> <?php $i = 1; ?>
                                <?php foreach ($datapenguji as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nidn_dosen']; ?></td>
                                        <td><?= $d['nama_dosen']; ?></td>
                                        <td><?= $d['role_penguji']; ?></td>
                                        <td><?= $d['tahun_akademik']; ?></td>
                                        <td><img src='http://localhost/CodeIgniter_SiMonTA-master/assets/mahasiswa/anonim.png' width='20%'></td>

                                        <td class="center">

                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaledit<?= $d['id_dosenpenguji']; ?>">
                                                <i class=" fa fa-edit"></i>
                                            </button>

                                            <a href="/admin/deletepenguji/<?= $d['id_dosenpenguji']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini ?')" />

                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </a>
                                        </td>
                                    </tr><?php endforeach; ?>



                            </tbody>
                        </table>
                    </div>
                </div><!-- /.the-box full -->
            </div>
        </div>
    </div>
</div>
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
            <form action="/admin/tambahdatadosenpenguji" method="POST">

                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-6">
                            <select name="id_dosenta" id="id_dosenta" class="form-control <?= ($validation->hasError('id_dosenta')) ? 'is-invalid' : ''; ?>">
                                <option value="">-Pilih-</option>
                                <?php foreach ($data_dosenta as $d) :
                                ?>
                                    <!-- value = level dosen -->
                                    <option value="<?= $d['id_dosenta']; ?>"><?= $d['nidn_dosen']; ?>- <?= $d['nama_dosen']; ?> </option>

                                <?php endforeach; ?>

                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_dosenta'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Pilih Role</label>
                        <div class="col-sm-6">
                            <select name="role_penguji" id="role_penguji" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="penguji">Dosen penguji</option>
                                <!-- <option value="penguji">Dosen penguji 2</option> -->
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal edit-->
<!-- Modal edit--><?php foreach ($datapenguji as $c) : ?>
    <div class="modal fade" id="modaledit<?= $c['id_dosenpenguji']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/editdatadosenpenguji/<?= $c['id_dosenpenguji']; ?>" method="POST">

                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_dosenta" id="id_dosenta" value="<?= $c['id_dosenta']; ?>">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Dosen </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $c['nama_dosen']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">NIDN </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $c['nidn_dosen']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Pilih Role</label>
                            <div class="col-sm-6">
                                <select name="role_penguji" id="role_penguji" class="form-control">
                                    <option value="">-Pilih-</option>
                                    <option selected value="penguji">Dosen penguji 1</option>

                                </select>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Edit data</button>
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