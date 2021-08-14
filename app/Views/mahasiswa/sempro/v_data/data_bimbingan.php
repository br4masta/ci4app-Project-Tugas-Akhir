<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Halaman Bimbingan Sidang Tugas Akhir</h1>
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
                        <h3 class="card-title">DataTable Bimbingan Sidang Tugas Akhir Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-title  d-flex">
                            <button type="button" class="btn btn-primary btn-sm tomboltambah">
                                <i class=" fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>
                        <br><br>
                        <table id="data_detailbimbingan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Judul Final</th>
                                    <th>berkas bimbingan</th>
                                    <th>tanggal Bimbingan</th>
                                    <th>status Bimbingan Tugas Akhir Pembimbing I</th>
                                    <th>status Bimbingan Tugas Akhir Pembimbing II</th>
                                    <th>catatan Bimbingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($tampildatabimbingan as $row) :
                                    $i++; ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nim_mhs']; ?></td>
                                        <td><?= $row['judul_final_ta']; ?></td>
                                        <td><?= $row['berkas_bimbingan_ta']; ?></td>
                                        <td><?= $row['tanggal_bimbingan_ta']; ?></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php if ($row['status_bimbingan_pembimbing1_ta'] == "proses") :
                                                echo '<span class="badge badge-warning d-inline-flex p-2">Proses</span>';
                                            elseif ($row['status_bimbingan_pembimbing1_ta'] == "lanjut bimbingan") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut bimbingan</span>';
                                            elseif ($row['status_bimbingan_pembimbing1_ta'] == "lanjut pengajuan sidang ta") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut pengajuan sidang ta</span>';
                                            else :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">Revisi</span>';
                                            endif ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php if ($row['status_bimbingan_pembimbing2_ta'] == "proses") :
                                                echo '<span class="badge badge-warning d-inline-flex p-2">Proses</span>';
                                            elseif ($row['status_bimbingan_pembimbing2_ta'] == "lanjut bimbingan") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut bimbingan</span>';
                                            elseif ($row['status_bimbingan_pembimbing2_ta'] == "lanjut pengajuan sidang ta") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">lanjut pengajuan sidang ta</span>';
                                            else :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">Revisi</span>';
                                            endif ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <button class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#produknew<?php echo $row['id_bimbingan_ta']; ?>"><span>Detail</span></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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
<?php foreach ($tampildatabimbingan as $row) : ?>
    <div class="modal fade" id="produknew<?php echo $row['id_bimbingan_ta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Catatan Dosen Pembimbing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-md">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Catatan Pembimbing I</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="width:320px;"><?= $row['catatan_bimbingan_pembimbing1_ta']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Catatan Pembimbing II</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="width:320px;"><?= $row['catatan_bimbingan_pembimbing1_ta']; ?></textarea></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<div class="viewmodal" style="display: none;"></div>
<!-- Page specific script -->
<script>
    function datadetailbimbinganmahasiswa() {
        $("#data_detailbimbingan").DataTable({
            "scrollY": "300px",
            "scrollX": true,
            "searching": false,
            "scrollCollapse": true,
            "paging": false,
            "fixedColumns": {
                leftColumns: 2
            }
        })
    }

    $(document).ready(function() {
        datadetailbimbinganmahasiswa();
        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('mahasiswa/formtambahbimbinganta/' . $id_ok1) ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>

<?= $this->include('mahasiswa/menu'); ?>