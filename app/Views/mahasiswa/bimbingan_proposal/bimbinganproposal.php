<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Halaman Bimbingan Judul</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables Mahasiswa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable Bimbingan Proposal Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-title  d-flex">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>
                        <table id="datapengajuan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Dosen Pembimbing I</th>
                                    <th>Nama Dosen Pembimbing II</th>
                                    <th>Deskripsi Proposal</th>
                                    <th>Acc Dosen Pembimbing</th>
                                    <th>keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> 2018420017</td>
                                    <td> Muhammad Hafizh Azzasafah</td>
                                    <td> Dosen Pembimbing I</td>
                                    <td> Dosen Pembimbing II</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-success d-inline-flex p-2">Di Setujui</span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#Detail">Detail</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit"><i class='fas fa-pencil-alt'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td> 2018420080</td>
                                    <td> Aditya Hernanda</td>
                                    <td> Dosen Pembimbing I</td>
                                    <td> Dosen Pembimbing II</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-warning d-inline-flex p-2">Menunggu Persetujuan</span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#Detail">Detail</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit"><i class='fas fa-pencil-alt'></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
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

<!-- Modal Detail -->
<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Keterangan Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Waktu</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="waktu" name="waktu" value="Pukul 12.00" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">tempat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="waktu" name="waktu" value="dilab praktikum 1" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Tgl Bimbingan</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="tgl" name="tgl" value="2021-08-12" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-lg-3 col-form-label">Deskripsi Keterangan</label>
                    <div class="col-lg-9">
                        <textarea id="inputDescription" class="form-control" rows="3" readonly>Judul menarik cukup dapat dipahami</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Proposal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Muhammad Hafizh Azzasafah" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen Pembimbing I</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Dosen pembimbing I" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen Pembimbing II</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Dosen pembimbing I" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Upload File Proposal</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Ajukan Proposal</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Muhammad Hafizh Azzasafah" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen Pembimbing I</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Dosen pembimbing I" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen Pembimbing II</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="Dosen pembimbing I" readonly>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Upload File Proposal</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">ubah pengajuan proposal</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Page specific script -->
<script>
    $(function() {
        $("#datapengajuan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        })
    });
</script>
<?= $this->endSection(); ?>

<?= $this->include('mahasiswa/menu'); ?>