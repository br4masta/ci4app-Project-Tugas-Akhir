<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('mahasiswa/updatedata', ['class' => 'formmahasiswa']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="id_mhs" name="id_mhs" value="<?= $id_mhs ?>" hidden>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">email Mahasiswa</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Handphone</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="hp" name="hp" value="<?= $hp ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $tempat ?>"readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tgl Lahir</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $tgl?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Jenis kelamin</label>
                    <div class="col-sm-6">
                       <input type="text" class="form-control" id="jenkel" name="jenkel" value="<?= $jenkel?>" readonly>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" id="btn-simpan" class="btn btn-primary btnsimpan">Update changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".formmahasiswa").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Update');
                },
                success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        });
                        $('modaledit').modal('hide');
                        datamahasiswa();
                    
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>