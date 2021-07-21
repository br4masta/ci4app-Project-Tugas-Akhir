<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
            <a href="/dosen/index" class="nav-link">
                <i class="fa fa-home"></i>
                <p>Profil</p>
            </a>
        </li>
        <!-- menu pengajuan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>Bimbingan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('dosen/judul'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Judul</p>
                    </a>
                </li>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('dosen/proposal'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Proposal</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('dosen/tugasakhir'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tugas Akhir</p>
            </a>
        </li>
    </ul>
    <!-- menu bimbingan -->
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class=" fa fa-copy"></i>
            <p>Pengajuan
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= site_url('dosen/pengajuanjudul'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Judul</p>
                </a>
            </li>
    </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('dosen/proposal'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Proposal</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('dosen/tugasakhir'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tugas Akhir</p>
            </a>
        </li>
    </ul>
    <li class="nav-item">
        <a href="<?= site_url('Auth/logout'); ?>" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>
                Logout
                <!-- <span class="badge badge-info right">2</span> -->
            </p>
        </a>
    </li>
    </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<?= $this->endSection(); ?>