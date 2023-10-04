<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('pengalaman-kerja','pengalaman-kerja/*') ? 'active' : ''}}">
                    <a data-toggle="collapse" href="#base1">
                        <i class="fas fa-id-card"></i>
                        <p>Riwayat Hidup</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base1">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('pengalaman-kerja.index') }}">
                                    <span class="sub-item">Pengalaman Kerja</span>
                                </a>
                                {{-- <a href="#">
                                    <span class="sub-item">PPPoE Profile</span>
                                </a> --}}
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item {{ request()->is('hotspot/user', 'hotspot/user/*') ? 'active' : ''}}">
                    <a data-toggle="collapse" href="#base2">
                        <i class="fas fa-wifi"></i>
                        <p>Hotspot</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Hotspot User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="nav-item {{ request()->is('report-traffic') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fas fa-bell"></i>
                        <p>Report Up</p>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>