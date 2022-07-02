<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item"><a href="{{ route('app.dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a></li>

        <li class="menu-header">Menu</li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i><span>Agenda</span></a>
            <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="{{ route('app.agenda.index') }}">List Agenda</a></li>
                <li><a class="nav-link" href="{{ route('app.agenda.create') }}">Tambah Agenda</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Aduan</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="#">List Aduan</a></li>
                <li><a class="nav-link" href="#">Tambah Aduan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i><span>Pendanaan</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="#">List Dana</a></li>
                <li><a class="nav-link" href="#">Tambah Pendanaan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Data Warga</span></a>
            <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="#">List Warga</a></li>
                <li><a class="nav-link" href="#">Tambah Warga</a></li>
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
