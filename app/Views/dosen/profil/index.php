<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Profil Dosen</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="viewdatadsn">
                    
                </div>
        </div><!-- /.container-fluid -->
    </div>
</div>

</section>
<!-- viewModal - Section -->

<!-- Page specific script -->
<script>
    function data_dsn() {
        $.ajax({
            url: "<?= site_url('dosen/index/id') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdatadsn').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        data_dsn();
    });
</script>

<?= $this->endSection(); ?>

<?= $this->include('dosen/menu'); ?>