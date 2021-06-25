<?= $this->extend('templates/index'); ?>

<?= $this->section('menu'); ?>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
            <a href="/dosenpenguji/index" class="nav-link">
                <i class="fa fa-home"></i>
                <p>Profil</p>
            </a>
        </li>
        <!-- menu pengajuan -->
        <li class="nav-item">
            <a href="/dosenpenguji/jadwaluji" class="nav-link">
                <i class=" fa fa-copy"></i>
                <p>Berita Jadwal
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('Auth/logout'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <p>
                    Logout
                    <!-- <span class="badge badge-info right">2</span> -->
                </p>
            </a>
        </li>
    </ul>
    </ul>

</nav>
<!-- /.sidebar-menu -->
</div>
<?= $this->endSection(); ?>