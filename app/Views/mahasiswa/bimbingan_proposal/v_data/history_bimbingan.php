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
                            <?php
                            $session = session();
                            $id = $session->get('user_id');
                            foreach ((new \App\Models\Model_bimbinganmhs)->get_recordbimbingan($id_ok) as  $data) { ?>
                                <?php if (($data['id_pengajuan'] >= 1) && ($data['id_pengajuan'] < 8)) {
                                    echo '<button type="button" class="btn btn-primary btn-sm tomboltambah">
                                         <i class=" fa fa-plus-circle"></i> Tambah Data
                                    </button>';
                                } elseif ($data['id_pengajuan'] == 0) {
                                    echo '<button type="button" class="btn btn-primary btn-sm tomboltambah">
                                        <i class=" fa fa-plus-circle"></i> Tambah Data
                                   </button>';
                                } else {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                         <strong>MAAF!</strong> Pengajuan Bimbingan telah ditolak 8x Silahkan Mengajukan Judul Baru.
                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>';
                                } ?>
                            <?php break;
                            } ?>
                        </div><br><br><br>
                        <table id="data_detailbimbingan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Judul Bimbingan</th>
                                    <th>Deskripsi judul Proposal</th>
                                    <th>berkas bimbingan</th>
                                    <th>catatan Bimbingan</th>
                                    <th>tanggal Bimbingan</th>
                                    <th>status Bimbingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($tampildatabimbingan as $row) :
                                    $i++; ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td> <?= $row['nim_mhs']; ?></td>
                                        <td> <?= $row['judul_mhs']; ?></td>
                                        <td> <?= $row['deskripsi']; ?></td>
                                        <td> <?= $row['berkas_mhs']; ?></td>
                                        <td> <?= $row['catatan_mhs']; ?></td>
                                        <td> <?= $row['tanggal_mhs']; ?></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php if ($row['status_mhs'] == "belum di setujui") :
                                                echo '<span class="badge badge-warning d-inline-flex p-2">Belum Disetujui</span>';
                                            elseif ($row['status_mhs'] == "di setujui") :
                                                echo '<span class="badge badge-success d-inline-flex p-2">Disetujui</span>';
                                            else :
                                                echo '<span class="badge badge-danger d-inline-flex p-2">DiTolak</span>';
                                            endif ?>
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
                url: "<?= site_url('mahasiswa/formtambahbimbingan/' . $id_ok) ?>",
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