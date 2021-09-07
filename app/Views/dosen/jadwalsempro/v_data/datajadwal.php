  <!-- /.card-header -->
  <div class="card-body">
      <div class="card-title  d-flex">
      </div>
      <table id="datapengajuan" class="table table-bordered table-striped" style="text-align: center; vertical-align: middle; ">
          <thead>
              <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul</th>
                  <th>Acara</th>
                  <th>Jam</th>
                  <th>Tanggal</th>
                  <th>Tempat</th>
                  <th>Dosen Pembimbing 1</th>
                  <th>Dosen Pembimbing 2</th>
                  <th>Dosen Penguji</th>
                  <th>Dosen Penguji</th>
                  <th>Penilaian</th>

              </tr>
          </thead>
          <?php $i = 1;  ?>
          <?php foreach ($tampildatauji1 as $a) : ?>
              <tbody>
                  <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $a['nim_mhs']; ?> </td>
                      <td><?= $a['nama_mhs']; ?></td>
                      <td><?= $a['judul'] ?></td>
                      <td><?= $a['acara_sidang'] ?></td>
                      <td><?= $a['jam_sidang'] ?></td>
                      <td><?= $a['tanggal_sidang'] ?></td>
                      <td><?= $a['tempat_sidang'] ?></td>
                      <td><?= $a['pembimbing1_nama']; ?></td>
                      <td><?= $a['pembimbing2_nama']; ?></td>
                      <td><?= $a['penguji1_nama']; ?></td>
                      <td><?= $a['penguji2_nama']; ?></td>
                      <td>
                          <a href="/dosen/penilaiansempro/<?= $a['id_jadwal']; ?>">
                              <button class="btn btn-xs btn-flat btn-info">
                                  Detail
                              </button>
                          </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
              <?php foreach ($tampildatauji2 as $b) : ?>
                  <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $b['nim_mhs']; ?></td>
                      <td><?= $b['nama_mhs']; ?> </td>
                      <td><?= $b['judul'] ?></td>
                      <td><?= $b['acara_sidang'] ?></td>
                      <td><?= $b['jam_sidang'] ?></td>
                      <td><?= $b['tanggal_sidang'] ?></td>
                      <td><?= $b['tempat_sidang'] ?></td>
                      <td><?= $b['pembimbing1_nama']; ?></td>
                      <td><?= $b['pembimbing2_nama']; ?></td>
                      <td><?= $b['penguji1_nama']; ?></td>
                      <td><?= $b['penguji1_nama']; ?></td>
                      <td>
                          <a href="/dosen/penilaiansempro/<?= $b['id_jadwal']; ?>">
                              <button class="btn btn-xs btn-flat btn-info">
                                  Detail
                              </button>
                          </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
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
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "info": true,
              "autoWidth": true,
              "fixedColumns": {
                  leftColumns: 2
              }
          })
      });
  </script>