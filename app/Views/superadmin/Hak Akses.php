<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hak Akses</h1>
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
                <div class="the-box full">
                    <div class="table-responsive" style="margin:5px;padding:5px" id="stack-personal">
                        <p><strong>LIST LEVEL DOSEN</strong></p>
                        <!--<p><a href="http://localhost/CodeIgniter_SiMonTA-master/admin/akses/add"><button class="btn btn-primary btn-square">Add Data</button></a></p>-->
                        <table id="tbl-personal" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>DOSEN</th>
                                    <th>LEVEL</th>
                                    <th>AKSI</th>
                                    <th>DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sucipto</td>
                                    <td>
                                        Administrator, Dosen Pembimbing, </td>
                                    <td>
                                        <a href='<?= site_url('superadmin/edithakakses'); ?>'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/detail/1'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Christanto P.A</td>
                                    <td>
                                        Dosen Pembimbing, </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/edit/3'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/detail/3'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Eddy Priyadi</td>
                                    <td>
                                        Dosen Pembimbing, </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/edit/4'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/detail/4'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Christian Yulianto Rusli</td>
                                    <td>
                                        Ka Progdi TI, Dosen Pembimbing, </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/edit/5'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/detail/5'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Rifqi Maulana</td>
                                    <td>
                                        Ka Progdi MI, Dosen Pembimbing, </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/edit/2'>
                                            <button class="btn btn-xs btn-flat btn-success btnbrg-edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='http://localhost/CodeIgniter_SiMonTA-master/admin/akses/detail/2'>
                                            <button class="btn btn-xs btn-flat btn-info">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div><!-- /.the-box full -->
            </div>
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