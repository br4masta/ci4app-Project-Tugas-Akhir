<!-- <table id="data_detailbimbingan" class="table table-bordered table-striped">
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
<script>
    $(document).ready(function() {
        $("#data_detailbimbingan").DataTable({
            "scrollY": "300px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": false,
            "fixedColumns": {
                leftColumns: 2
            }
        })
    });
</script> -->