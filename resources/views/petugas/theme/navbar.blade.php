<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <div class="nav-header">
                <span>Data Siswa</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('petugas/siswa*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('siswa.index') }}">
                        <i class="material-icons">school</i>
                        <span class="nav-link-text">Siswa</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('petugas/kelas*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kelas.index') }}">
                        <i class="material-icons">home</i>
                        <span class="nav-link-text"> Kelas</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Buku</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('petugas/buku*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('buku.index') }}">
                        <i class="material-icons">menu_book</i>
                        <span class="nav-link-text">Buku</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('petugas/rak*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rak.index') }}">
                        <i class="material-icons">shelves</i>
                        <span class="nav-link-text">Rak Buku</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Petugas</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('petugas/petugas*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('petugas.index') }}">
                        <i class="material-icons">groups</i>
                        <span class="nav-link-text">Petugas</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('petugas/kepsek*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kepsek.index') }}">
                        <i class="material-icons">school</i>
                        <span class="nav-link-text">Kepala Sekolah</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Pengaturan</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('petugas/denda*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('denda.index') }}">
                        <i class="material-icons">monetization_on</i>
                        <span class="nav-link-text">Denda</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
