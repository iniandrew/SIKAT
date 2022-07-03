<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ request()->routeIs('app.dashboard') ? 'active' : '' }}"><a href="{{ route('app.dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a></li>

        <li class="menu-header">Menu</li>

        <li class="nav-item dropdown {{ request()->routeIs('app.agenda.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i><span>Agenda</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('app.agenda.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.agenda.index') }}">List Agenda</a></li>
                <li class="{{ request()->routeIs('app.agenda.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.agenda.create') }}">Tambah Agenda</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('app.aduan.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Aduan</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('app.aduan.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.aduan.index') }}">List Aduan</a></li>
                <li class="{{ request()->routeIs('app.aduan.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.aduan.create') }}">Tambah Aduan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('app.dana.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i><span>Pendanaan</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('app.dana.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.dana.index') }}">List Dana</a></li>
                <li class="{{ request()->routeIs('app.dana.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.dana.create') }}">Tambah Pendanaan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('app.warga.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Data Warga</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->routeIs('app.warga.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.warga.index') }}">List Warga</a></li>
                <li class="{{ request()->routeIs('app.warga.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('app.warga.create') }}">Tambah Warga</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Data Pengguna</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="#">List Pengguna</a></li>
                <li><a class="nav-link" href="#">Tambah Pengguna</a></li>
            </ul>
        </li>
    </ul>
</aside>
