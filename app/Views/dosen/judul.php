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
                        <table id="datapengajuan" class="table table-bordered table-striped" style="text-align: center; vertical-align: middle; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Dosen Pembimbing I</th>
                                    <th>Nama Dosen Pembimbing II</th>
                                    <th>Judul</th>
                                    <th>Deskripsi Proposal</th>
                                    <th>Status</th>
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
                                    <td>
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td>
                                        PENGAJUAN
                                    </td>
                                    <td>
                                        <a href="/dosen/tabelbimbingan"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                                            </button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td> 2018420080</td>
                                    <td> Aditya Hernanda</td>
                                    <td> Dosen Pembimbing I</td>
                                    <td> Dosen Pembimbing II</td>
                                    <td> Sistem pendukung keputusan</td>
                                    <td>
                                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                                    </td>
                                    <td>
                                        PENGAJUAN
                                    </td>
                                    <td>
                                        <a href="/dosen/tabelbimbingan"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                                            </button></a>
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