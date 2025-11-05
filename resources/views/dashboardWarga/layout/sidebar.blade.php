<div class="sidebar">
    <div>
        <div class="menu">
            <a href="{{ route('dashboardWarga') }}" 
            class="menu-item {{ request()->routeIs('dashboardWarga') ? 'active' : '' }}">
                <span class="material-icons-outlined">home</span> Beranda
            </a>

            <a href="{{ route('tambah-laporan-warga') }}" 
            class="menu-item {{ request()->routeIs('tambah-laporan-warga') ? 'active' : '' }}">
                <span class="material-icons-outlined">post_add</span> Tambah Laporan
            </a>

            <a href="{{ route('edukasi-tips-warga') }}" 
            class="menu-item {{ request()->routeIs('edukasi-tips-warga') ? 'active' : '' }}">
                <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
            </a>
        </div>
    </div>

</div>
