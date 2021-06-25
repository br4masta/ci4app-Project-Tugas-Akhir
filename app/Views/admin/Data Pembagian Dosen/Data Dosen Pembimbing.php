<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dosen Pembimbing</h1>
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
                <div class="card-title  d-flex">

                </div>
                <div class="the-box full">
                    <p><strong>Data Dosen Pembimbing</strong></p>
                    <div class="card-title  d-flex ">
                        <button type="button" class="btn btn-primary btn-sm ml-3" data-toggle="modal" data-target="#modaltambah">
                            <i class=" fa fa-plus-circle"></i> Tambah Data
                        </button>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width='5%'>NO</th>
                                <th width='15%'>NIDN</th>
                                <th width='15%'>NAMA</th>
                                <th width='15%'>Role</th>
                                <th width='15%'>Plot</th>
                                <th width='15%'>FOTO</th>
                                <th width='5%'>Detail</th>
                                <th width='5%'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($datapembimbing as $c) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $c['nidn_dosen']; ?></td>
                                    <td><?= $c['nama_dosen']; ?></td>
                                    <td><?= $c['role']; ?></td>
                                    <td><?= $c['tahun_akademik']; ?></td>
                                    <td><img src='http://localhost/CodeIgniter_SiMonTA-master/assets/mahasiswa/anonim.png' width='20%'></td>
                                    <td>
                                        <a href='<?= site_url('admin/detaildatadosenpembimbing'); ?>'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                    <td class="center">

                                        <button class="btn btn-xs btn-flat btn-success btnbrg-edit" data-toggle="modal" data-target="#modaledit">
                                            <i class=" fa fa-edit"></i>
                                        </button>

                                        <a href="" onClick="return confirm('Anda yakin akan menghapus data ini ?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="Laki-laki">Tory Ariyanto</option>
                            <option value="Perempuan">Sucipto</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIDN </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Pilih Role</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="Laki-laki">Dosen pembimbing I</option>
                            <option value="Perempuan">Dosen pembimbing II</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">plot semester </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018/2019">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Ajukan Judul</button>
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
                    <label for="" class="col-sm-2 col-form-label">Nama Dosen </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="Tory Ariyanto" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIDN </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018420017" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"> Pilih Role</label>
                    <div class="col-sm-6">
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="Laki-laki">Dosen pembimbing I</option>
                            <option value="Perempuan">Dosen pembimbing II</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">plot semester </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nim" name="nim" value="2018/2019">
                    </div>
                </div>


            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Edit data</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

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