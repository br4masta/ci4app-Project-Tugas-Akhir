<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>

<!-- My CSS -->
<link rel="stylesheet" href="/css/style.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fa fa-home"></i>
                <p>Data Dosen</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/dosen/judul" class="nav-link">
                <i class="fa fa-book"></i>
                <p>Data Judul</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>
                    Bimbingan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/dosen/proposal" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Proposal</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tugas Akhir</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<?= $this->endSection(); ?>