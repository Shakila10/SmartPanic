<div class="sidebar">
    <div>
        <div class="menu">
            <a href="{{ route('dashboardRT') }}" 
            class="menu-item {{ request()->routeIs('dashboardRT') ? 'active' : '' }}">
                <span class="material-icons-outlined">home</span> Beranda
            </a>

            <a href="{{ route('tambah-laporan') }}" 
            class="menu-item {{ request()->routeIs('tambah-laporan') ? 'active' : '' }}">
                <span class="material-icons-outlined">post_add</span> Tambah Laporan
            </a>

            <a href="{{ route('riwayat-laporan') }}" 
            class="menu-item {{ request()->routeIs('riwayat-laporan') ? 'active' : '' }}">
                <span class="material-icons-outlined">history</span> Riwayat Laporan
            </a>

            <a href="{{ route('edukasi-tips') }}" 
            class="menu-item {{ request()->routeIs('edukasi-tips') ? 'active' : '' }}">
                <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
            </a>
        </div>
    </div>

</div>
