<?= $this->extend('templates/index'); ?>
<!-- css -->


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





<!-- Main content -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">

                <form class="bootstrap-form-with-validation mx-5">
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="katberita">
                                <option value="" selected>--Pilih Disini--</option>
                                <option value='1' selected>2018420076-Brian Aldy</option>
                                <option value='2'>2018420077-Aditya Hermanto</option>
                                <!-- -->
                            </select>
                        </div>
                    </div>

                    <!-- End: Multi-Select Dropdown by Jigar Mistry -->


                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Acara</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Skripsi" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Sucipto" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Pemanfaatan Sistem Pendukung Keputusan terhadap Sistem Informasi kelayakan terbang" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="27 Juli 2021" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pukul</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="09.30" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ruang</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Ruang 205" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nilai Akhir</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="90" readonly>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 1</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Dosen 1" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Dosen Penguji 2</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="Dosen 2" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nilai</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" value="B" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="floatingTextarea2" class="col-sm-2 col-form-label">Revisi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Informasi soal Metode penggunaan kurang lengkap" readonly id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                    </div> -->




                    <div class=""><label for="textarea-input" class=""></label><label for=" search-input"><strong>Berkas:</strong></label></div>
                    <div id="pdfDownloadLinkContainer" class="mb-5">
                        <a class="action pdf" id="pdfDownloadLink" target="_parent" href="<?= base_url() ?>/assets/admin/berkas/doc 1.pdf">Download this PDF file</a>
                    </div>

                </form>
                <div class="card-body ">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>Role Dosen</th>
                                <th>Nilai</th>
                                <th>Catatan</th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Dosen 1</td>
                                <td>Penguji 1</td>
                                <td>90</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla deserunt ullam tempora reprehenderit rerum dolorum excepturi possimus reiciendis. Rem delectus sed aliquid perferendis reprehenderit sunt non dolore facilis ipsa perspiciatis!</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Dosen 2</td>
                                <td>Penguji 2</td>
                                <td>90</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla deserunt ullam tempora reprehenderit rerum dolorum excepturi possimus reiciendis. Rem delectus sed aliquid perferendis reprehenderit sunt non dolore facilis ipsa perspiciatis!</td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Dosen 3</td>
                                <td>Penguji 3</td>
                                <td>90</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla deserunt ullam tempora reprehenderit rerum dolorum excepturi possimus reiciendis. Rem delectus sed aliquid perferendis reprehenderit sunt non dolore facilis ipsa perspiciatis!</td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Dosen 4</td>
                                <td>Penguji 4</td>
                                <td>90</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla deserunt ullam tempora reprehenderit rerum dolorum excepturi possimus reiciendis. Rem delectus sed aliquid perferendis reprehenderit sunt non dolore facilis ipsa perspiciatis!</td>

                            </tr>



                        </tbody>

                    </table>
                    <a href="<?= site_url('kaprodi/Berita'); ?>" class="btn btn-warning btn-square mb-5">Kembali</a>
                </div>


            </div>
        </div>
    </div>
</div>


<!-- /.content -->
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<!-- /.content -->
<?= $this->endSection(); ?>

<?= $this->include('admin/menu'); ?>