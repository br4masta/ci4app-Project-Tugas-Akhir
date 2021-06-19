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
                        <table id="datapengajuan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Judul Mahasiswa</th>
                                    <th>Revisi Paragraf</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td> 2018420017</td>
                                    <td> Judul Pengajuan proposak</td>
                                    <td> paragraf 1 dan 2</td>
                                    <td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque eos, sunt, dolores aspernatur expedita eum voluptatum repellat omnis ipsam molestias laudantium ex quos corporis consequuntur quibusdam, recusandae magni sapiente dicta!</td>
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

<?= $this->include('mahasiswa/menu'); ?>