<table id="data_bimbingan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Dosen Penguji I</th>
            <th>Nama Dosen Penguji II</th>
            <th>Nama Dosen Pembimbing I</th>
            <th>Nama Dosen Pembimbing II</th>
            <th>Pengajuan Bimbingan TA</th>
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
                <td><?= $row['dos1_nama']; ?></td>
                <td><?= $row['dos2_nama']; ?></td>
                <td><?= $row['dos3_nama']; ?></td>
                <td><?= $row['dos4_nama']; ?></td>
                <td style="text-align: center; vertical-align: middle;">
                    <a href='<?= site_url(); ?>/mahasiswa/detaildatabimbinganta/<?= $row['id_seminar']; ?>'>
                        <button class="badge badge-primary d-inline-flex p-2">
                            <span>Detail</span>
                        </button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

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