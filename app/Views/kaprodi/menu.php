<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>
<link rel="stylesheet" href="/assets/admin/css.css">

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">Menu Kaprodi</li>
        <li class="nav-item">
            <a href=" <?php echo site_url('kaprodi/profil'); ?>" class="nav-link">
                <i class=" fas fa-user"></i>
                <p>
                    Profil
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href=" <?php echo site_url('kaprodi/pengajuan'); ?>" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>
                    Data Pengajuan Judul
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-clock"></i>
                <p>
                    Penjadwalan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/jadwalseminar'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Sempro</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/seminarterjadwal'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Seminar Proposal</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/jadwalskripsi'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pengajuan Sidang TA</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/skripsiterjadwal'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sidang Tugas Akhir</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-newspaper"></i>
                <p>
                    Data Berita
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/beritaseminar'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Berita Seminar</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo site_url('kaprodi/beritaskripsi'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Berita Sidang TA</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Auth/logout'); ?>" class="nav-link">
                <i class=" fas fa-sign-out-alt"></i>
                <p>
                    Logout
                    <!-- <span class="badge badge-info right">2</span> -->
                </p>
            </a>
        </li>




        <li class="nav-item">

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Top Navigation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Top Navigation + Sidebar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Boxed</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fixed Sidebar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fixed Sidebar <small>+ Custom Area</small></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/fixed-topnav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fixed Navbar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fixed Footer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Collapsed Sidebar</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<?= $this->endSection(); ?>