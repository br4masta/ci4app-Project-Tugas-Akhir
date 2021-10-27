<table id="data_pengajuansempro" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Judul</th>
            <th>Nama Dosen Pembimbing I</th>
            <th>Nama Dosen Pembimbing II</th>
            <th>keterangan Jadwal Sidang Proposal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php $i = 0;
            foreach ($tampildata as $row) :
                $i++; ?>
                <td><?= $i; ?></td>
                <td> <?= $row['nim_mhs']; ?></td>
                <td> <?= $row['nama_mhs']; ?></td>
                <td> <?= $row['judul']; ?></td>
                <td> <?= $row['dos1_nama']; ?></td>
                <td> <?= $row['dos2_nama']; ?></td>
                <td style="text-align: center; vertical-align: middle;">
                    <button class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#produknew<?php echo $row['id_jadwal']; ?>"><span>Detail</span></button>
                </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<!-- Modal Detail -->
<?php foreach ($tampildata as $row) : ?>
    <div class="modal fade" id="produknew<?php echo $row['id_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Keterangan Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">jenis Acara</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?= $row['acara_sidang']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Tanggal Sidang Seminar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?= $row['tanggal_sidang']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">Ruang Sidang Seminar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="waktu" name="waktu" value="<?= $row['tempat_sidang']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">penguji 1</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="penguji" name="penguji" value="<?= $row['dos3_nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-6 col-form-label">penguji 2</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="penguji" name="penguji" value="<?= $row['dos4_nama']; ?>" readonly>
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
<script>
    $(document).ready(function() {
        $("#data_pengajuansempro").DataTable({
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