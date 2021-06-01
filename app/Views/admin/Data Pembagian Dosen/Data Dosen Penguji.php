<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa Seminar Proposal</h1>
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
<div class="the-box full">
    <div class="table-responsive" style="margin:5px;padding:5px" id="stack-personal">
        <p><strong>LIST DOSEN</strong></p>
        <p><a href="http://localhost/CodeIgniter_SiMonTA-master/admin/dosen/add"><button class="btn btn-primary btn-square">Add Data</button></a></p>
        <table id="tbl-personal" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width='5%'>NO</th>
                    <th width='15%'>NPPY</th>
                    <th width='15%'>NAMA</th>
                    <th width='15%'>Role</th>
                    <th width='15%'>FOTO</th>
                    <th width='5%'>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>43100810001</td>
                    <td>Tory Ariyanto</td>
                    <td>Penguji 1</td>
                    <td><img src='http://localhost/CodeIgniter_SiMonTA-master/assets/mahasiswa/anonim.png' width='20%'></td>
                    <td>
                        <a href='<?= site_url('admin/detaildatadosenpenguji'); ?>'>
                            <button class="btn btn-xs btn-flat btn-info">
                                Detail
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>43100810002</td>
                    <td>Rifqi Maulana</td>
                    <td>Penguji 2</td>
                    <td><img src='http://localhost/CodeIgniter_SiMonTA-master/assets/mahasiswa/anonim.png' width='20%'></td>
                    <td>
                        <a href='<?= site_url('admin/detaildatadosenpenguji'); ?>'>
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