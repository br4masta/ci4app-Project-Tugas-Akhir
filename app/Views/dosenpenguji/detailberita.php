<?= $this->extend('templates/index'); ?>
<!-- css -->


<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Berita</h1>
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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid" src="<?= base_url(); ?>/assets/style/img/pdf.png" alt="User profile picture">
                        </div>
                        <div class="mt-5" style=" text-align : center; vertical-align: middle;">
                           <button type="button" class="btn btn-outline-primary btn-sm">View File</button>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                               
                                <!-- Table 1 -->
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama</th>
                                            <td>Brian Aldy Bramasta</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIM</th>
                                            <td>2018420080</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fakultas</th>
                                            <td>
                                                Teknik Infortika
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <td>
                                                Laki-laki
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Acara</th>
                                            <td>
                                                Seminar Proposal
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Acara</th>
                                            <td>
                                                27-Juni-2021
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tempat Acara</th>
                                            <td>
                                                Lab Informatika
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Dosen Pembimbing</th>
                                            <td>
                                                Sucipto
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>
                                                brianrich@gmail.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Judul Proposal</th>
                                            <td>
                                                Sistem Informasi Tugas Akhir
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Akhir Table 2 -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('dosenpenguji/menu'); ?>