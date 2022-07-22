<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">SIMA</div>
        <!-- <div class="sidebar-brand-text mx-3">SIMA</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - APP List -->
    <li class="nav-item {{ Request::is('app*') ? 'active' : '' }}">
        <a class="nav-link" href="/app">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Aplikasi</span></a>
    </li>

    <!-- Nav Item - PIC List -->
    <li class="nav-item {{ Request::is('pic*') ? 'active' : '' }}">
        <a class="nav-link" href="/pic">
            <i class="fas fa-fw fa-user"></i>
            <span>PIC</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>