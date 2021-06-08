<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pembagian Dosen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content- -->
<div class="container">
    <div class="row">

        <div class="col">
            <div class="card">
                <div class="alert alert-success alert-bold-border fade in alert-dismissable">
                    <h3 class="box-title">FORM PEMBAGIAN DOSEN</h3>
                </div>

                <div class="the-box full">
                    <form role="form" class="form-horizontal" action="http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagisubmit" method="POST">
                        <input type='hidden' name='id' value='1'>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dosen</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="dosen" id="dosen">
                                    <option value=''>- Pilih Disini -</option>
                                    <option value='1' selected>Sucipto</option>
                                    <option value='2'>Rifqi Maulana</option>
                                    <option value='3'>Christanto P.A</option>
                                    <option value='4'>Eddy Priyadi</option>
                                    <option value='5'>Christian Yulianto Rusli</option>
                                    <option value='6'>Prastuti Sulistyorini</option>
                                    <option value='7'>Tri Pudji W</option>
                                    <option value='9'>Asif bin Barkhiya</option>
                                    <option value='20'>nemo</option>
                                    <option value='21'>wqw</option>
                                    <option value='22'>fa</option>
                                    <option value='23'>dsm</option>
                                    <option value='24'>mcm</option>
                                    <option value='25'>tessatu</option>
                                </select>
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dosen Pembimbing 1</label>
                            <div class="col-sm-6">
                                <input name="satu" type="radio" id="satu" value="Y">&nbsp;Y
                                &nbsp;&nbsp;&nbsp;
                                <input name="satu" type="radio" id="satu" value="T" checked>&nbsp;T
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dosen Pembimbing 2</label>
                            <div class="col-sm-6">
                                <input name="dua" type="radio" id="dua" value="Y" checked>&nbsp;Y
                                &nbsp;&nbsp;&nbsp;
                                <input name="dua" type="radio" id="dua" value="T">&nbsp;T
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button class="btn btn-primary btn-square">Simpan</button>
                                <a href="<?= site_url('superadmin/pembagiandosen'); ?>" class="btn btn-warning btn-square">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content- -->
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

<?= $this->include('superadmin/menu'); ?>