<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= asset('/img/logo.png') ?>" alt="gotham" width="90">
        </div>
        <div class="sidebar-brand-text mx-3">GOTHAM SPP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= routeCurrent('dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= url('/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if($_SESSION['user']['role'] != 'siswa') { ?>
        <li class="nav-item <?= routeCurrent('entrytransaksi') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= url('/entrytransaksi') ?>">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Entry Transaksi</span></a>
        </li>
    <?php } ?>

    <li class="nav-item <?= routeCurrent('historytransaksi') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= url('/historytransaksi') ?>">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>History Transaksi</span></a>
    </li>

    <!-- Divider -->
    
    <?php if($_SESSION['user']['role'] != 'siswa') { ?>
        
        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= routeCurrent('kelas') || routeCurrent('siswa') || routeCurrent('spp') || routeCurrent('petugas') || routeCurrent('admin') ? 'active' : '' ?>
        ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-globe"></i>
                <span>Master Data</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= url('/kelas') ?>">Kelas</a>
                    <?php if($_SESSION['user']['role'] == 'admin') { ?>
                        <a class="collapse-item" href="<?= url('/siswa') ?>">Siswa</a>
                        <a class="collapse-item" href="<?= url('/spp') ?>">SPP</a>
                        <a class="collapse-item" href="<?= url('/petugas') ?>">Petugas</a>
                        <a class="collapse-item" href="<?= url('/admin') ?>">Admin</a>
                    <?php } ?>
                </div>
            </div>
        </li>
    <?php } ?>

</ul>