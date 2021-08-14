<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open">
            <a href="<?= site_url('mahasiswa/pengajuan_judul'); ?>" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li> -->

        <li class="nav-header">Menu mahasiswa</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    judul & Bimbingan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/pengajuan_judul'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Judul</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/bimbingan_proposal'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bimbingan Proposal</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon  fas fa-graduation-cap "></i>
                <p>
                    Sempro & Sidang TA
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/pengajuan_sempro'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Sempro</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/bimbingan_mhs_ta'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hasil Seminar Proposal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/seminar'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bimbingan Tugas Akhir</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/pengajuan_ta'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Sidang Tugas Akhir</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('mahasiswa/sidang_ta'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hasil Sidang Tugas AKhir</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('mahasiswa/showprofil'); ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data Profil
                    <!-- <span class="badge badge-info right">2</span> -->
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Auth/logout'); ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                    <!-- <span class="badge badge-info right">2</span> -->
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<?= $this->endSection(); ?>