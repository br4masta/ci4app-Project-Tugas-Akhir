<table id="data_pengajuan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Dosen Pembimbing I</th>
            <th>Dosen Pembimbing II</th>
            <th>Status</th>
            <th>Detail</th>
            <th>aksi</th>
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
                <td><?= $row['nama_dosen']; ?></td>
                <td><?= $row['nama_dosen']; ?></td>
                <td style="text-align: center; vertical-align: middle;">
                    <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <?php if ($row['status_pengajuan'] == "belum di setujui") :
                        echo '<span class="badge badge-warning d-inline-flex p-2">Belum Disetujui</span>';
                    elseif ($row['status_pengajuan'] == "di setujui") :
                        echo '<span class="badge badge-success d-inline-flex p-2">Disetujui</span>';
                    else :
                        echo '<span class="badge badge-danger d-inline-flex p-2">DiTolak</span>';
                    endif ?>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <span class="badge badge-primary d-inline-flex p-2" data-toggle="modal" data-target="#Detail">Detail</span>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

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
                <div class="form-group">                
                    <?php
                    foreach ($tampildata as $row) : ?>
                    <div class="form-group">
                    <label for="#" class="col-form-label">Deskripsi Keterangan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"><?= $row['deskripsi']; ?></textarea>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#data_pengajuan").DataTable({
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