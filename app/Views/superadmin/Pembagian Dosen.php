<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pembagian Dosen</h1>
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
<!-- end Content Header (Page header) -->


<div class="contaner">
    <div class="ror">
        <div class="col">
            <div class="the-box full">
                <div class="table-responsive" style="margin:5px;padding:5px" id="stack-personal">
                    <div class="card">
                        <p><strong>LIST PEMBAGIAN DOSEN</strong></p>
                        <p><a href=""><button class="btn btn-primary btn-square">Tambah</button></a></p>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!--<th><input type="checkbox" name="cek_all" value="all"></th>-->
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>DOSEN P1</th>
                                    <th>DOSEN P2</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tory Ariyanto</td>
                                    <td>T</td>
                                    <td>Y</td>
                                    <td>
                                        <a href='<?= site_url('superadmin/editpembagiandosen'); ?>'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Christian Yulianto Rusli</td>
                                    <td>Y</td>
                                    <td>T</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/2'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rifqi Maulana</td>
                                    <td>Y</td>
                                    <td>T</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/3'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Eddy Priyadi</td>
                                    <td>Y</td>
                                    <td>T</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/4'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Asif bin Barkhiya</td>
                                    <td>T</td>
                                    <td>Y</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/5'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>nemo</td>
                                    <td>T</td>
                                    <td>Y</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/6'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Belum Dipilih</td>
                                    <td>Y</td>
                                    <td>Y</td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/bagiedit/7'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.the-box full -->
        </div>
    </div>
</div>

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