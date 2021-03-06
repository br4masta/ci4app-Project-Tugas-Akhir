<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('mahasiswa/simpandatabimbingan', ['class' => 'formmahasiswa']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label" hidden>ID Seminar</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="id_seminar" id="id_seminar" hidden value="<?php echo $id ?>" readonly>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-4">
                        <?php
                        $session = session();
                        //  print_r( $_SESSION["ok"] );
                        $id2 = $session->get('user_id');
                        foreach ((new \App\Models\Model_pengajuanjudulmhs)->pilih_datamhs($id2) as  $data) { ?>
                            <input type="text" class="form-control" value="<?php echo $data['nim_mhs'] ?>" readonly>
                        <?php break;
                        } ?>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-4">
                        <?php
                        $session = session();
                        $id3 = $session->get('user_id');
                        foreach ((new \App\Models\Model_pengajuanjudulmhs)->pilih_datamhs($id3) as  $data) { ?>
                            <input type="text" class="form-control" value="<?php echo $data['nama_mhs'] ?>" readonly>
                        <?php break;
                        } ?>
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Judul Final</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="judul" name="judul">
                        <div class="invalid-feedback errorJudul">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Upload File Bimbingan</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <input type="file" class="custom-file-input" required id="berkas" name="berkas">
                                <div class="invalid-feedback errorBerkas">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".btnsimpan").click(function(e) {
                e.preventDefault();

                let form = $('.formmahasiswa')[0];

                let data = new FormData(form);
                $.ajax({
                    type: "post",
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: "<?= site_url('mahasiswa/simpandatabimbinganta'); ?>",
                    data: data,
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnsimpan').attr('disable', 'disabled');
                        $('.btnsimpan').html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    complete: function() {
                        $('.btnsimpan').removeAttr('disable');
                        $('.btnsimpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.judul) {
                                $('#judul').addClass('is-invalid');
                                $('.errorJudul').html(response.error.judul);
                            } else {
                                $('#judul').removeClass('is-invalid');
                                $('.errorJudul').html('');
                            }

                            if (response.error.berkas) {
                                $('#berkas').addClass('is-invalid');
                                $('.errorBerkas').html(response.error.berkas);
                            } else {
                                $('#berkas').removeClass('is-invalid');
                                $('.errorBerkas').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            });
                            $('modaltambah').modal('hide');
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>