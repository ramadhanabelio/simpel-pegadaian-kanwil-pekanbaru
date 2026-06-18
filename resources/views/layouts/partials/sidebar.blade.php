<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ Auth::user()->profile ? asset('uploads/profile/' . Auth::user()->profile) : asset('img/profile.jpg') }}"
                        alt="Profile Default" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-success">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'active submenu' : '' }}">
                    <a data-toggle="collapse" href="#sidebarLayouts"
                        aria-expanded="{{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'true' : 'false' }}">
                        <i class="fas fa-envelope"></i>
                        <p>Surat</p>
                        <span class="caret"></span>
                    </a>

                    <div class="collapse {{ request()->routeIs('surat-masuk.*') || request()->routeIs('surat-keluar.*') ? 'show' : '' }}"
                        id="sidebarLayouts">

                        <ul class="nav nav-collapse">

                            <li class="{{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}">
                                <a href="{{ route('surat-masuk.index') }}">
                                    <span class="sub-item">Surat Masuk</span>
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}">
                                <a href="{{ route('surat-keluar.index') }}">
                                    <span class="sub-item">Surat Keluar</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('memo.*') ? 'active' : '' }}">
                    <a href="{{ route('memo.index') }}">
                        <i class="fas fa-sticky-note"></i>
                        <p>Memo</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
