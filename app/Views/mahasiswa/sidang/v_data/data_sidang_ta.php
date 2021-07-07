<table id="datapengajuan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Dosen Penguji</th>
            <th>Nama Dosen Penguji</th>
            <th>Judul Final</th>
            <th>Nilai</th>
            <th>Status</th>
            <th>keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        foreach ($tampildata as $row) :
            $i++; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['nim_mhs']; ?></td>
                <td><?= $row['nama_mhs']; ?> </td>
                <td> <?= $row['dos1_nama']; ?></td>
                <td> <?= $row['dos2_nama']; ?></td>
                <td> <?= $row['judul_bimbingan_ta']; ?> </td>
                <td> <?= $row['nilai_ta']; ?> </td>
                <td style="text-align: center; vertical-align: middle;">
                    <?php if ($row['status_ta'] == "lulus") :
                        echo '<span class="badge badge-success d-inline-flex p-2">lulus</span>';
                    elseif ($row['status_ta'] == "lulus dengan revisi") :
                        echo '<span class="badge badge-success d-inline-flex p-2">lulus dengan revisi</span>';
                    else :
                        echo '<span class="badge badge-danger d-inline-flex p-2">tidak lulus</span>';
                    endif ?>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <button class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#produknew<?php echo $row['id_sidangta']; ?>"><span>Detail</span></button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<!-- Modal Detail -->
<?php foreach ($tampildata as $row) : ?>
    <div class="modal fade" id="produknew<?php echo $row['id_sidangta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Keterangan Judul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">jenis Acara</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $row['acara_sidang_ta']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Tanggal Sidang Seminar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $row['tanggal_sidang_ta']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Ruang Sidang Seminar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $row['tempat_sidang_ta']; ?>" readonly>
                            </div>
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