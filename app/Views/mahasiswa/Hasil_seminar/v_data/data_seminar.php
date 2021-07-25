<table id="data_bimbingan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Judul</th>
            <th>Nama Dosen Penguji I</th>
            <th>Nama Dosen Penguji II</th>
            <th>Nama Dosen Pembimbing I</th>
            <th>Nama Dosen Pembimbing II</th>
            <th>Status</th>
            <th>Detail Catatan & Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($tampildata as $row) :
            $i++; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['nim_mhs']; ?></td>
                <td><?= $row['nama_mhs']; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['dos1_nama']; ?></td>
                <td><?= $row['dos2_nama']; ?></td>
                <td><?= $row['dos3_nama']; ?></td>
                <td><?= $row['dos4_nama']; ?></td>
                <td style="text-align: center; vertical-align: middle;">
                    <?php if ($row['status'] == "mengulang") :
                        echo '<span class="badge badge-warning d-inline-flex p-2">Mengulang</span>';
                    elseif ($row['status'] == "disetujui dengan revisi") :
                        echo '<span class="badge badge-success d-inline-flex p-2">Disetujui dengan revisi</span>';
                    else :
                        echo '<span class="badge badge-success d-inline-flex p-2">Lanjut Sidang TA/span>';
                    endif ?>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <button class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#produknew<?php echo $row['id_seminar']; ?>"><span>Detail</span></button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Modal Detail -->
<?php foreach ($tampildata as $row) : ?>
    <div class="modal fade" id="produknew<?php echo $row['id_seminar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Nilai dan Catatan Seminar proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-lg">
                    <div class="row">
                        <div class="col-lg-6"> 
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nilai Penguji I</th>
                                    <td><input class="form-control" type="text" value="<?= $row['nilai_penguji_1']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Nilai Penguji II</th>
                                    <td><input class="form-control" type="text" value="<?= $row['nilai_penguji_2']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Nilai Pembimbing I</th>
                                    <td><input class="form-control" type="text" value="<?= $row['nilai_pembimbing_1']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Nilai Pembimbing II</th>
                                    <td><input class="form-control" type="text" value="<?= $row['nilai_pembimbing_2']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Nilai Akhir Sempro</th>
                                    <td>
                                        <?php $tot = $row['nilai_penguji_1'] + $row['nilai_penguji_2'] + $row['nilai_pembimbing_1'] + $row['nilai_pembimbing_2'];
                                        $rata = $tot / 4;
                                        echo $rata; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6" style="width:1250px;">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Catatan Nilai Penguji I</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width:580px;"><?= $row['catatan_pembimbing_1']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Catatan Penguji II</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width:580px;"><?= $row['catatan_pembimbing_2']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Catatan Pembimbing I</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width:580px;"><?= $row['catatan_penguji_1']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Catatan Pembimbing II</th>
                                    <td> <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width:580px;"><?= $row['catatan_penguji_2']; ?></textarea></td>
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

<script>
    $(document).ready(function() {
        $("#data_bimbingan").DataTable({
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