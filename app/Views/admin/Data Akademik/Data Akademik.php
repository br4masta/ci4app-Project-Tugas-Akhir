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
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2015/2016</td>
                                    <td>01-03-2015</td>
                                    <td>31-08-2015</td>
                                    <td>GASAL</td>
                                    <td>
                                        <a href='' onClick="return confirm('Anda yakin akan menonaktifkan data ini ?')">
                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-edit">
                                                Matikan
                                            </button>
                                        </a>
                                    </td>
                                    <td>

                                        <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaledit">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <a href='' onClick="return confirm('Anda yakin akan menghapus data ini ?')">
                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2014/2015</td>
                                    <td>01-02-2015</td>
                                    <td>28-02-2015</td>
                                    <td>GENAP</td>
                                    <td>
                                        <a href='' onClick="return confirm('Anda yakin akan mengaktifkan data ini ?')" s>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                Aktifkan
                                            </button>
                                        </a>
                                    </td>
                                    <td>

                                        <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                            <i class="fa fa-edit" data-toggle="modal" data-target="#modaledit"></i>
                                        </button>

                                        <a href='' onClick="return confirm('Anda yakin akan menghapus data ini ?')">
                                            <button class="btn btn-xs btn-flat btn-danger btnbrg-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>

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
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Semester</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="Laki-laki">Genap</option>
                            <option value="Perempuan">Ganjil</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Mulai</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="tanggal ujian">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Akhir</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="tanggal ujian">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                        <input name="status" type="radio" id="status" value=1>AKTIF
                        &nbsp;&nbsp;&nbsp;
                        <input name="status" type="radio" id="status" value=0 checked>NON AKTIF
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

<!-- Modal Edit-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2015/2016">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Semester</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="1">Genap</option>
                            <option value="2">Ganjil</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Mulai</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="tanggal ujian" value="6/9/2021">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Akhir</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="tanggal ujian">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                        <input name="status" type="radio" id="status" value=1>AKTIF
                        &nbsp;&nbsp;&nbsp;
                        <input name="status" type="radio" id="status" value=0 checked>NON AKTIF
                        <span></span>
                        <span></span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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