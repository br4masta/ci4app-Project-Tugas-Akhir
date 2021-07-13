<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Akademik</h1>
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

<!-- content/ -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="the-box full">
                    <div class="table-responsive" style="margin:5px;padding:5px" id="stack-personal">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <p> <?= session()->getFlashdata('pesan'); ?> </p>
                            </div>
                        <?php endif; ?>
                        <p><strong>LIST TAHUN AKADEMIK</strong></p>
                        <div class="card-title  d-flex ">

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TAHUN AKADEMIK</th>
                                    <th>TANGGAL MULAI</th>
                                    <th>TANGGAL AKHIR</th>
                                    <th>SEMESTER</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody><?php $i = 1; ?>
                                <?php foreach ($dataakademik as $a) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $a['tahun_akademik']; ?></td>
                                        <td><?= $a['tanggal_mulai']; ?></td>
                                        <td><?= $a['tanggal_akhir']; ?></td>
                                        <td><?= $a['semester']; ?></td>
                                        <td>
                                            <?php if ($a['status'] == "aktif") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">AKTIF</span>';
                                            elseif ($a['status'] == "nonaktif") :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">NONAKTIF</span>';

                                            endif ?>
                                        </td>
                                        <td>

                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaledit<?= $a['id_dataakademik']; ?> ">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href='/admin/deletedataakademik/<?= $a['id_dataakademik']; ?>' onClick="return confirm('Anda yakin akan menghapus data ini ?')">
                                                <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr> <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div><!-- /.the-box full -->
            </div>
        </div>
    </div>
</div>
<!-- content/ -->

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
            <form action="/admin/tambahdataakademik/" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tahun Akademik</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control <?= ($validation->hasError('tahun_akademik')) ? 'is-invalid' : ''; ?>" id="tahun_akademik" name="tahun_akademik" value=""> / <input type="text" class="form-control <?= ($validation->hasError('tahun_akademik')) ? 'is-invalid' : ''; ?>" id="tahun_akademik2" name="tahun_akademik2" value="">

                            <div class="invalid-feedback">
                                <?= $validation->getError('tahun_akademik'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Semester</label>
                        <div class="col-sm-6">
                            <select name="semester" id="semester" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>">
                                <option value="">-Pilih-</option>
                                <option value="ganjil">Genap</option>
                                <option value="genap">Ganjil</option>
                            </select>

                            <div class="invalid-feedback">
                                <?= $validation->getError('semester'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Mulai</label>
                        <div class="col-sm-6">
                            <input class="form-control <?= ($validation->hasError('mulai')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal_mulai" id="tanggal_mulai">
                            <div class="invalid-feedback">
                                <?= $validation->getError('mulai'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Akhir</label>
                        <div class="col-sm-6">
                            <input class="form-control <?= ($validation->hasError('akhir')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal_akhir" id="tanggal_akhir">
                            <div class="invalid-feedback">
                                <?= $validation->getError('akhir'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-8">
                            <input name="status" type="radio" id="status" value="aktif">AKTIF
                            &nbsp;&nbsp;&nbsp;
                            <input name="status" type="radio" id="status" value="nonaktif" checked>NON AKTIF
                            <span></span>
                            <span></span>
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

<!-- Modal Edit--><?php foreach ($dataakademik as $a) : ?>
    <div class="modal fade" id="modaledit<?= $a['id_dataakademik']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/updatedataakademik/<?= $a['id_dataakademik']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Tahun Akademik</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="<?= $a['tahun_akademik']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="semester" name="semester" value="<?= $a['semester']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Mulai</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="tanggal_mulai" name="tanggal_mulai" value="<?= $a['tanggal_mulai']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Akhir</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="tanggal_akhir" name="tanggal_akhir" value="<?= $a['tanggal_akhir']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <input name="status" type="radio" id="status" value="aktif">AKTIF
                                &nbsp;&nbsp;&nbsp;
                                <input name="status" type="radio" id="status" value="nonaktif" checked>NON AKTIF
                                <span></span>
                                <span></span>
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
    </div><?php endforeach; ?>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "searching": true,
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