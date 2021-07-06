<table id="data_bimbingan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Dosen Pembimbing I</th>
            <th>Dosen Pembimbing II</th>
            <th>Detail Bimbingan</th>
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
                <td style="text-align: center; vertical-align: middle;">
                    <a href='<?= site_url(); ?>/mahasiswa/detaildatabimbingan/<?= $row['id_pengajuan']; ?>'>
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