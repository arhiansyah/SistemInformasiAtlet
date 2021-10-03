<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-menu' style='color:#a9c530' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('dashboard.index') }}"
                class="{{($data['currentAdminMenu'] == 'dashboard') ? 'active' : '' }}">
                <i class="bx bx-grid-alt" style='color:#a9c530'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <div class="master">MASTER DATA</div>
        </li>
        <li>
            <a href="{{ route('pages.atlet.index') }}"
                class="{{($data['currentAdminMenu'] == 'atlet') ? 'active' : '' }}">
                <i class='bx bx-run' style='color:#a9c530'></i>
                <span class="links_name">Atlet</span>
            </a>
            <span class="tooltip">Atlet</span>
        </li>
        <li>
            <a href="{{ route('pages.pelatih.index') }}"
                class="{{($data['currentAdminMenu'] == 'pelatih') ? 'active' : '' }}">
                <i class='bx bx-clipboard' style='color:#a9c530'></i>
                <span class="links_name">Pelatih</span>
            </a>
            <span class="tooltip">Pelatih</span>
        </li>
        <li>
            <a href="{{ route('pages.cabor.index') }}"
                class="{{($data['currentAdminMenu'] == 'cabor') ? 'active' : '' }}">
                <i class='bx bx-pie-chart-alt-2' style='color:#a9c530'></i>
                <span class="links_name">Cabor</span>
            </a>
            <span class="tooltip">Cabang Olahraga</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-award' style='color:#a9c530'></i>
                <span class="links_name">Prestasi</span>
            </a>
            <span class="tooltip">Prestasi</span>
        </li>
        <li>
            <div class="master">PENGATURAN</div>
        </li>
        <li>
            @if(session('username') !== 'admin')
            <a href="{{route('userSistem')}}" style="display: none;"
                class="{{ ($data['currentAdminMenu'] == 'userSistem') ? 'active' : '' }}">
                <i class='bx bx-cog' style='color:#a9c530'></i>
                <span class="links_name">Profil</span>
            </a>
            <span class="tooltip">Profil</span>
            @else
            <a href="{{route('userSistem')}}" class="{{ ($data['currentAdminMenu'] == 'userSistem') ? 'active' : '' }}">
                <i class='bx bx-cog' style='color:#a9c530'></i>
                <span class="links_name">Profil</span>
            </a>
            <span class="tooltip">Profil</span>
            @endif
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="{{ url('') }}/asset/img/DinporaLogo.png" alt="profileImg">
                <div class="name_job">
                    <div class="name">DINPORAPUDBAR</div>
                    <div class="job">Admin</div>
                </div>
            </div>
            <a href="{{ route('logout') }}" style="text-decoration: none;">
                <i class='bx bx-log-out' id="log_out"></i>
            </a>

        </li>
    </ul>
</div>