<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Detail Berita</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->





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
                  <th>Judul Bimbingan</th>
                  <th>Deskripsi</th>
                  <th>Berkas</th>
                  <th>Tanggal</th>
                  <th>Catatan</th>
                  <th>Status</th>
              </tr>
          </thead>

          <?php $i = 1; ?>
          <?php foreach ($tampildatadsn as $c) : ?>
              <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $c['nim_mhs']; ?>
                  </td>
                  <td><?= $c['nama_mhs']; ?></td>
                  <td> <?= $c['judul_bimbingan']; ?> </td>
                  <td> <?= $c['deskripsi_bimbingan'] ?></td>
                  <td>
                      <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                  </td>
                 <!--  <td><?= $c['tanggal_bimbingan']; ?></td>
                   <td><?= $c['catatan_pembimbing_1']; ?></td>
                   <td> <?= $c['status_bimbingan_pembimbing1'] ?></td> -->
                  

              </tr>
          <?php endforeach; ?>
          <?php foreach ($tampildatadsn2 as $d) :  ?>
              <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $d['nim_mhs']; ?>
                  </td>
                  <td><?= $d['nama_mhs']; ?></td>
                  <td> <?= $d['judul_bimbingan']; ?> </td>
                  <td> <?= $d['deskripsi_bimbingan'] ?></td>
                  <td>
                      <img src="<?= base_url() ?>/assets/style/img/pdf.png" width="50" height="50">
                  </td>
                <!--   <td><?= $d['tanggal_bimbingan']; ?></td>
                   <td><?= $d['catatan_pembimbing_2']; ?></td>
                   <td> <?= $d['status_bimbingan_pembimbing2'] ?></td> -->
                 
              </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
  </div>


  <script>
      $(document).ready(function() {
          $("#datapengajuan").DataTable({
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

<?= $this->endSection(); ?>

<?= $this->include('dosen/menu'); ?>