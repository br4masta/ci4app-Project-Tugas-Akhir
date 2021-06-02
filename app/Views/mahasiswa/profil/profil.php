<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>

<style>
    .img-foto {
        width: 50%;
        height: 70%;
        margin: auto;
        display: block;
    }

    .foto {
        box-shadow: 0 0 10px rgba(182, 175, 175, 0.61);
        padding: 10px;
    }
</style>
<div class="container">
    <h2 class="pt-5">Ubah Profil Mahasiswa</h2>
    <hr>
    <div class="pb-5">
        <div class="alert alert-primary" role="alert">
            <p><b>Berdasarkan Surat DIKTII diharapkan mahasiswa melakukan pemutakhiran data kontak berupa NIK, alamat domisili, nomor telepon, dan email. Mohon hal ini dilakukan selambat-lambatnya hingga Rabu, 9 September 2020.</b></p>
            <a href="">Surat dapat di download disini</a>
            <p><b>Harap maklum, tanggal 10 dan 11 digunakan untuk upload data ke L2DIKTI</b></p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="foto">
                    <h4>Foto</h4>
                    <hr>
                    <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-foto" alt="User Image">
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="form">
                    <h4>Biodata Mahasiswa</h4>
                    <hr>
                    <!-- Table 1 -->
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">KTP</th>
                                <td>
                                    <div class="mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small>
                                        *file dibawah 500KB <br>
                                        *file Format JPG/JPEG/PNG
                                    </small>
                                </td>
                                <td>
                                    <a class="btn btn-success tombol" href="">View</a>
                                    <a class="btn btn-danger tombol" href="">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">KK</th>
                                <td>
                                    <div class="mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small>
                                        *file dibawah 500KB <br>
                                        *file Format JPG/JPEG/PNG
                                    </small>
                                </td>
                                <td>
                                    <a class="btn btn-success tombol" href="">View</a>
                                    <a class="btn btn-danger tombol" href="">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">AKTA</th>
                                <td>
                                    <div class="mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small>
                                        *file dibawah 500KB <br>
                                        *file Format JPG/JPEG/PNG
                                    </small>
                                </td>
                                <td>
                                    <a class="btn btn-success tombol" href="">View</a>
                                    <a class="btn btn-danger tombol" href="">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Akhir Table 1 -->

                    <!-- Table 2 -->
                    <table class="table table-striped table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td>Upin dan Ipin</td>
                            </tr>
                            <tr>
                                <th scope="row">NIM</th>
                                <td>1234567890</td>
                            </tr>
                            <tr>
                                <th scope="row">NIK</th>
                                <td>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="isi NIK anda">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jurusan/Fakultas</th>
                                <td>
                                    Teknik Informatika/Teknik
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">DPAM</th>
                                <td>
                                    Kak Rose S.Kom, M.Kom
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>--- Pilih Agama ---</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Hindu</option>
                                        <option value="3">Budha</option>
                                        <option value="3">KonghuCu</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tempat Lahir</th>
                                <td>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected>--- Tempat Lahir ---</option>
                                        <option value="1">Gresik</option>
                                        <option value="1">Surabaya</option>
                                        <option value="2">Sidoarjo</option>
                                        <option value="3">TulungAgung</option>
                                    </select>
                                    <small>
                                        *Pilih Lain-Lain jika tidak ditemukan Tempat Lahir Yang Sesuai
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-date"></i></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telp</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="081234567890">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Pin</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="3213">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Ayah</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama ayah">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Ibu</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama ibu">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">HP Ortu/Wali</th>
                                <td>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="081234567890">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Akhir Table 2 -->

                    <div class="proses">
                        <button class="btn btn-primary tombol">Proses</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->include('mahasiswa/menu'); ?>