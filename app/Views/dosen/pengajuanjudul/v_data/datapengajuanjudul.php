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
                  <th>File</th>
                  <th>Status</th>
                  <th>Aksi</th>
              </tr>
          </thead>

          <?php $i = 1; ?>
          <?php foreach ($tampildatadsn as $c) : ?>
              <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $c['nim_mhs']; ?>
                  </td>
                  <td><?= $c['nama_mhs']; ?></td>
                  <td> <?= $c['judul']; ?> </td>
                  <td>
                      <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                  </td>
                  <td>
                      <?php if ($c['konfirmasi_pembimbing_1'] == "belum di setujui") :
                            echo '<span class="badge badge-warning d-inline-flex p-2">Belum Disetujui</span>';
                        elseif ($c['konfirmasi_pembimbing_1'] == "di setujui") :
                            echo '<span class="badge badge-success d-inline-flex p-2">Disetujui</span>';
                        else :
                            echo '<span class="badge badge-danger d-inline-flex p-2">DiTolak</span>';
                        endif ?>
                  </td>
                  <td>
                      <a href="/dosen/editpengajuan/<?= $c['id_pengajuan']; ?>"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                          </button></a>
                  </td>

              </tr>
          <?php endforeach; ?>
          <?php foreach ($tampildatadsn2 as $d) :  ?>
              <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $d['nim_mhs']; ?>
                  </td>
                  <td><?= $d['nama_mhs']; ?></td>
                  <td> <?= $d['judul']; ?> </td>
                  <td>
                      <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                  </td>
                  <td>
                      <?php if ($d['konfirmasi_pembimbing_2'] == "belum di setujui") :
                            echo '<span class="badge badge-warning d-inline-flex p-2">Belum Disetujui</span>';
                        elseif ($d['konfirmasi_pembimbing_2'] == "di setujui") :
                            echo '<span class="badge badge-success d-inline-flex p-2">Disetujui</span>';
                        else :
                            echo '<span class="badge badge-danger d-inline-flex p-2">DiTolak</span>';
                        endif ?>
                  </td>
                  <td>
                      <a href="/dosen/editpengajuan/<?= $d['id_pengajuan']; ?>"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=""><i class='fas fa-pencil-alt'></i>
                          </button></a>
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
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
              "fixedColumns": {
                  leftColumns: 2
              }
          })
      });
  </script>