<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Proposal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables Dosen</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<!-- /.card-header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Proposal</h3>
                </div>
                <div class="card-body">
                    <div class="card-title  d-flex">
                    </div>
                    <table id="datapengajuan" class="table table-bordered table-striped" style="text-align: center; vertical-align: middle; ">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Judul Bimbingan</th>
                                <th>Deskripsi</th>
                                <th>Berkas</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($tampildata_bimbingan as $c) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <?php if ($status_dospem == 'dosen pembimbing I') : ?>
                                        <td><?= $c['nim_mhs']; ?></td>
                                        <td><?= $c['nama_mhs']; ?></td>
                                        <td> <?= $c['judul_bimbingan']; ?> </td>
                                        <td> <?= $c['deskripsi_bimbingan'] ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                        </td>
                                        <td><?= $c['tanggal_bimbingan']; ?></td>

                                        <td><?= $c['catatan_bimbingan_pembimbing1']; ?> </td>
                                        <td style="text-align: center;">
                                            <?php if ($c['status_bimbingan_pembimbing1'] == "proses") :
                                                echo '<span class="badge badge-warning d-inline-flex p-2">Proses</span>';
                                            elseif ($c['status_bimbingan_pembimbing1'] == "lanjut bimbingan") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut bimbingan</span>';
                                            elseif ($c['status_bimbingan_pembimbing1'] == "lanjut pengajuan seminar") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut pengajuan seminar</span>';
                                            else :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">Revisi</span>';
                                            endif ?>
                                        </td>

                                        <td><a><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit<?= $c['id_bimbingan']; ?>"><i class='fas fa-pencil-alt'></i>
                                                </button> </a>
                                        </td>

                                    <?php elseif ($status_dospem == 'dosen pembimbing II') : ?>
                                        <td><?= $c['nim_mhs']; ?></td>
                                        <td><?= $c['nama_mhs']; ?></td>
                                        <td> <?= $c['judul_bimbingan']; ?> </td>
                                        <td> <?= $c['deskripsi_bimbingan'] ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                        </td>
                                        <td><?= $c['tanggal_bimbingan']; ?></td>

                                        <td><?= $c['catatan_bimbingan_pembimbing2']; ?> </td>
                                        <td style="text-align: center;">
                                            <?php if ($c['status_bimbingan_pembimbing2'] == "proses") :
                                                echo '<span class="badge badge-warning d-inline-flex p-2">Proses</span>';
                                            elseif ($c['status_bimbingan_pembimbing2'] == "lanjut bimbingan") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut bimbingan</span>';
                                            elseif ($c['status_bimbingan_pembimbing2'] == "lanjut pengajuan seminar") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut pengajuan seminar</span>';
                                            else :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">Revisi</span>';
                                            endif ?>
                                        </td>
                                        <td><a><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit<?= $c['id_bimbingan']; ?>"><i class='fas fa-pencil-alt'></i>
                                                </button> </a>
                                        </td>


                                    <?php endif; ?>



                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.card-body -->



<!-- Modal edit--><?php foreach ($tampildata_bimbingan as $c) : ?>
    <div class="modal fade" id="modaledit<?= $c['id_bimbingan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dosen/updateproposal/<?= $c['id_bimbingan']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <!-- jika login pembimbing 1 -->
                        <div class="form-group row">
                            <input type="hidden" name="id_pengajuan" id="id_pengajuan" value="<?= $c['id_pengajuan']; ?>">
                        </div>
                        <?php if ($status_dospem == 'dosen pembimbing I') : ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Status pembimbing 2</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="status pembimbing2" name="status pembimbing2" value="<?= $c['status_bimbingan_pembimbing2']; ?>" readonly>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">catatan pembimbing 2</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="catatan2" id="catatan2" cols="30" rows="10" readonly><?= $c['catatan_bimbingan_pembimbing2']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"> Status pembimbing 1</label>
                                <div class="col-sm-6">
                                    <select name="statuspembimbing" id="statuspembimbing" class="form-control" required>
                                        <option value="<?= $c['status_bimbingan_pembimbing1']; ?>" selected><?= $c['status_bimbingan_pembimbing1']; ?></option>
                                        <option value="lanjut bimbingan">lanjut bimbingan</option>
                                        <option value="proses">proses</option>
                                        <option value="revisi">revisi</option>
                                        <option value="lanjut pengajuan seminar">lanjut pengajuan seminar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">catatan pembimbing 1</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10"><?= $c['catatan_bimbingan_pembimbing1']; ?></textarea>
                                </div>
                            </div>
                            <!-- ======jika login pembimbing 2====== -->
                        <?php elseif ($status_dospem == 'dosen pembimbing II') : ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Status pembimbing 1</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="status pembimbing1" name="status pembimbing1" value="<?= $c['status_bimbingan_pembimbing1']; ?>" readonly>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">catatan pembimbing 1</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="catatan1" id="catatan1" cols="30" rows="10" readonly><?= $c['catatan_bimbingan_pembimbing1']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label"> Status pembimbing 2</label>
                                <div class="col-sm-6">
                                    <select name="statuspembimbing" id="statuspembimbing" class="form-control" required>
                                        <option value="<?= $c['status_bimbingan_pembimbing2']; ?>" selected><?= $c['status_bimbingan_pembimbing2']; ?></option>
                                        <option value="lanjut bimbingan">lanjut bimbingan</option>
                                        <option value="proses">proses</option>
                                        <option value="revisi">revisi</option>
                                        <option value="lanjut pengajuan seminar">lanjut pengajuan seminar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">catatan pembimbing 2</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10"><?= $c['catatan_bimbingan_pembimbing2']; ?></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<script>
    $(document).ready(function() {
        $("#datapengajuan").DataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "paging": false,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "info": true,


            "fixedColumns": {
                leftColumns: 2
            }
        })
    });
</script>

<?= $this->endSection(); ?>

<?= $this->include('dosen/menu'); ?>