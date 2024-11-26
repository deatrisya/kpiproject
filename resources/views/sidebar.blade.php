<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{asset('img/ktg-indonesia.svg')}}" alt="navbar brand" class="navbar-brand" height="50" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item {{ request()->routeIs('machines.index') ? 'active' : '' }}">
                    <a href="{{route('machines.index')}}">
                        <i class="fas fa-cogs"></i>
                        <p>Daftar Mesin</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('units.index') ? 'active' : '' }}">
                    <a href="{{route('units.index')}}">
                        <i class="fas fa-clone"></i>
                        <p>Daftar Unit</p>

                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-database"></i>
                        <p>Master Production Data</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-chart-line"></i>
                        <p>OEE Machine</p>

                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
