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
                                    <th>Dosen Pembimbing</th>
                                    <th>Acara</th>
                                    <th>detail</th>

                                </tr>
                            </thead>
                            <?php  $i = 1;  ?>
                            <?php foreach ($tampildatauji1 as $a) :?>
                            <tbody>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $a['acara_sidang']; ?> </td>
                                    <td><?= $a['tanggal_sidang']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><</td>
                                    <td>
                                        <a href='<?php echo site_url('dosenpenguji/detailberita'); ?>'>
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
              "fixedColumns": {
                  leftColumns: 2
              }
          })
      });
  </script>