<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="<?php echo site_url('superadmin/Dataakademik'); ?>" class="nav-link">
                <p>
                    Data Akademik

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('superadmin/mahasiswa'); ?>" class="nav-link">
                <p>
                    Data Mahasiswa

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href=" <?php echo site_url('superadmin/index'); ?>" class="nav-link">

                <p>
                    Data Dosen
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('superadmin/Pembagiandosen'); ?>" class="nav-link">
                <p>
                    Pembagian Dosen

                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo site_url('superadmin/hakakses'); ?>" class="nav-link">
                <p>
                    Hak Akses

                </p>
            </a>
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