<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Halaman Bimbingan Proposal</h1>
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
                        <h3 class="card-title">DataTable Bimbingan Proposal</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-title  d-flex">
                        </div>
                        <table id="datapengajuan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Dosen Pembimbing I</th>
                                    <th>Nama Dosen Pembimbing II</th>
                                    <th>Judul</th>
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
                                    <td> Aerodinamik Di Mesin robot</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td style=" text-align : center; vertical-align: middle;">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                         <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#Detail">Detail</span>
                                    </td>
                                    <td style=" text-align : center; vertical-align: middle;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit"><i class='fas fa-pencil-alt'></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td> 2018420080</td>
                                    <td> Aditya Hernanda</td>
                                    <td> Dosen Pembimbing I</td>
                                    <td> Dosen Pembimbing II</td>
                                    <td> Sistem pendukung keputusan</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td style=" text-align : center; vertical-align: middle;">
                                        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                         <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <span class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#Detail">Detail</span>
                                    </td>
                                    <td style=" text-align : center; vertical-align: middle;">
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
                        <input type="text" class="form-control" id="waktu" name="waktu" value="Di lab praktikum 1" readonly>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Masukkan</h5>
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
<?= $this->endSection(); ?>

<?= $this->include('dosen/menu'); ?>