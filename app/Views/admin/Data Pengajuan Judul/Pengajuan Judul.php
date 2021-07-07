<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengajuan Judul</h1>
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
                        <h3 class="card-title">DataTable Pengajuan Judul Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datapengajuan" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama(s)</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Dosen Pembimbing I</th>
                                    <th>Dosen Pembimbing II</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($datajudul as $c);
                                foreach ($datajudul2 as $d) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $d['nim_mhs']; ?></td>
                                        <td><?= $d['nama_mhs']; ?></td>
                                        <td> <?= $d['judul']; ?></td>
                                        <td> <?= $d['deskripsi']; ?></td>
                                        <td><?= $c['nama_dosen']; ?></td>
                                        <td><?= $d['nama_dosen']; ?></td>
                                        <td style="text-align: center; ">
                                            <span class="badge badge-danger d-inline-flex p-2"> <?= $c['status_pengajuan']; ?></span>
                                        </td>


                                        <td>
                                            <a>
                                                <button class="btn btn-xs btn-flat btn-info " data-toggle="modal" data-id="" data-target="#Detail<?= $d['id_pengajuan']; ?>">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                        <td class=" center">
                                            <a>
                                                <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaltambah">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="" onClick="return confirm('Anda yakin akan menghapus data ini ?')" />
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
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nim</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="2018420076" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="Brian Aldy Brmasta" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Calon dosen pembimbing I</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="Calon dosen pembimbing I" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Calon dosen pembimbing II</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="Calon dosen pembimbing II" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">judul</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="Nama judul" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">deskripsi rencana proposal</label>
                        <div class="col-sm-6">
                            <a href="<?= base_url() ?>/assets/admin/berkas/doc 1.pdf"> <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50"></a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-8">
                            <input name="status" type="radio" id="status" value=1>AKTIF
                            &nbsp;&nbsp;&nbsp;
                            <input name="status" type="radio" id="status" value=0 checked>NON AKTIF
                            &nbsp;&nbsp;&nbsp;
                            <input name="status" type="radio" id="status" value=0 checked>PENDING
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal detail--><?php foreach ($datajudul2 as $d) : ?>
    <div class="modal fade" id="Detail<?= $d['id_pengajuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nim</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $d['nim_mhs']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $d['nama_mhs']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Calon dosen pembimbing I</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $d['nama_dosen']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Calon dosen pembimbing II</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $d['nama_dosen']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">judul</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $d['judul']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">deskripsi rencana proposal</label>
                        <div class="col-sm-6">
                            <a href="<?= base_url() ?>/assets/admin/berkas/<?= $d['deskripsi_judul']; ?>.pdf"> <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50"></a>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nim" name="nim" value=" <?= $d['status_pengajuan']; ?>" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><?php endforeach; ?>
<!-- Page specific script -->
<script>
    $(function() {
        $("#datapengajuan").DataTable({
            "scrollY": "300px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": false,
            "fixedColumns": {
                leftColumns: 2
            }
        })
    });
</script>
<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>