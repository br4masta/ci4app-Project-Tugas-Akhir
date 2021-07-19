  <!-- /.card-header -->
  <div class="card-body">
    <div class="card-title  d-flex">
    </div>
    <table id="datapengajuan" class="table table-bordered table-striped" style="text-align: center; vertical-align: middle; ">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Judul</th>
                <th>Nama Dosen Pembimbing I</th>
                <th>Nama Dosen Pembimbing II</th>
                <th>File</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php $i = 1;
        foreach ($tampildatadsn2 as $td): ?>
            <tbody>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $td['nim_mhs']; ?></td>
                    <td><?= $td['nama_mhs']; ?></td>
                    <td><?= $td['judul']; ?></td>
                    <td><?= $td['dos1_nama']; ?></td>
                    <td><?= $td['dos2_nama']; ?></td>
                    <td>
                        <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                    </td>
                    <td>
                        PENGAJUAN
                    </td>
                    <td>
                        <a href="/dosen/tabelbimbingan"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                        </button></a>
                    </td>
                </tr>
                  <?php endforeach ?>
            </tbody>
        </table>
    </div>


<script>
    $(document).ready(function() {
        $("#datapengajuan").DataTable({
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

