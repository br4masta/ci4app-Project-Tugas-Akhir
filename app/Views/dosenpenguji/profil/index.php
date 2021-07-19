<?= $this->extend('templates/index'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
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
    <div class="row viewdatadsnpenguji">

</div>
    </div>

</section>
<!-- viewModal - Section -->

<!-- Page specific script -->
<script>
    function datadsn_profil() {
        $.ajax({
            url: "<?= site_url('dosenpenguji/profil/id') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdatadsnpenguji').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        datadsn_profil();
    });
</script>
<?= $this->endSection(); ?>

<?= $this->include('dosenpenguji/menu'); ?>