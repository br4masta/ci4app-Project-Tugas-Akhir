<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

        <li class="nav-header">Menu Dosen Pembimbing</li>
        <li class="nav-item">
            <a href="/dosen/index" class="nav-link">
                <i class="fa fa-home"></i>
                <p>Profil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('dosen/judul'); ?>" class="nav-link">
                <i class="fa fa-home"></i>
                <p>Pengajuan Judul</p>
            </a>
        </li>

        <!-- menu bimbingan -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>Data Bimbingan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
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
            <a href="#" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>Data Jadwal
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('dosen/jadwalsempro'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Seminar Proposal</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('dosen/jadwalta'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p style="size: small;"> Sidang Tugas Akhir</p>
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