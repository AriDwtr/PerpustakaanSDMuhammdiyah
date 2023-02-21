<nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
    <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        href="javascript:void(0);"><span class="feather-icon"><i data-feather="more-vertical"></i></span></a>
    <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
            class="feather-icon"><i data-feather="menu"></i></span></a>
    <a class="navbar-brand" href="index.html">
        <img class="brand-img d-inline-block" src="/perpus/logo-white.png" height="40" alt="brand" />
    </a>
    <ul class="navbar-nav hk-navbar-content order-xl-2">
        {{-- <li class="nav-item">
            <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span
                    class="feather-icon"><i data-feather="search"></i></span></a>
        </li> --}}
        {{-- <li class="nav-item">
            <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span
                    class="feather-icon"><i data-feather="settings"></i></span></a>
        </li> --}}
        {{-- <li class="nav-item dropdown dropdown-notifications">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="feather-icon bell"><i
                        data-feather="bell"></i></span></a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a></h6>
                <div class="notifications-nicescroll-bar">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <img src="dist/img/avatar1.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text"><span class="text-dark text-capitalize">Evie
                                            Ono</span> accepted your invitation to join the team</div>
                                    <div class="notifications-time">12m</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">New message received from <span
                                            class="text-dark text-capitalize">Misuko Heid</span></div>
                                    <div class="notifications-time">1h</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <span class="avatar-text avatar-text-primary rounded-circle">
                                        <span class="initial-wrap"><span><i
                                                    class="zmdi zmdi-account font-18"></i></span></span>
                                    </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">You have a follow up with<span
                                            class="text-dark text-capitalize"> dashgrin head</span> on <span
                                            class="text-dark text-capitalize">friday, dec 19</span> at <span
                                            class="text-dark">10.00 am</span></div>
                                    <div class="notifications-time">2d</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <span class="avatar-text avatar-text-success rounded-circle">
                                        <span class="initial-wrap"><span>A</span></span>
                                    </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">Application of <span
                                            class="text-dark text-capitalize">Sarah Williams</span> is waiting for your
                                        approval</div>
                                    <div class="notifications-time">1w</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar avatar-sm">
                                    <span class="avatar-text avatar-text-warning rounded-circle">
                                        <span class="initial-wrap"><span><i
                                                    class="zmdi zmdi-notifications font-18"></i></span></span>
                                    </span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div>
                                    <div class="notifications-text">Last 2 days left for the project</div>
                                    <div class="notifications-time">15d</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </li> --}}
        <li class="nav-item dropdown dropdown-authentication">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-img-wrap">
                        <div class="avatar">
                            @if (Auth::user()->foto == null)
                                <img src="/theme/dist/img/avatar12.jpg" alt="user"
                                    class="avatar-img rounded-circle">
                            @else
                                <img src="/foto_petugas/{{ Auth::user()->foto }}" alt="user"
                                    class="avatar-img rounded-circle">
                            @endif
                        </div>
                        <span class="badge badge-success badge-indicator"></span>
                    </div>
                    <div class="media-body">
                        <span>
                            @php
                                $nama = explode(' ', Auth::user()->name);
                                echo Str::title($nama[0]);
                            @endphp
                            <i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                        class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i
                        class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-0">
            <li class="nav-item {{ (request()->is('petugas/dashboard*')) ? 'active' : '' }}">
                <a href="{{ route('petugas.dashboard') }}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item {{ (request()->is('petugas/peminjaman*')) ? 'active' : '' }}">
                <a href="{{ route('peminjaman.index') }}" class="nav-link">Peminjaman Buku</a>
            </li>
            <li class="nav-item {{ (request()->is('petugas/pengembalian*')) ? 'active' : '' }}">
                <a href="{{ route('pengembalian.index') }}" class="nav-link">Pengembalian Buku</a>
            </li>
            <li class="nav-item {{ (request()->is('petugas/laporan*')) ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link">Laporan</a>
            </li>
        </ul>
    </div>

</nav>
