<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="{{ URL::asset('dist/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">SIBMN</div>
    </div>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fa fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>

    {{-- Pengguna --}}
    <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
        <a class="nav-link" href="/user">
          <i class="far fa-address-card"></i>
          <span>Pengguna</span>
        </a>
    </li>
    {{-- Pengguna --}}


    {{-- Kategori --}}
    <li class="nav-item {{ Request::is('category', 'category/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori"
            aria-expanded="true" aria-controls="collapseKategori">
            <i class="fas fa-archive"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori</h6>
                <a class="collapse-item {{ Request::is('category') ? 'active' : '' }}" href="/category">Daftar Kategori</a>
                <a class="collapse-item {{ Request::is('category/create') ? 'active' : '' }}" href="/category/create">Tambah Kategori</a>
            </div>
        </div>
    </li>
    {{-- Kategori --}}

    {{-- Lokasi --}}
    <li class="nav-item {{ Request::is('place', 'place/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLokasi"
            aria-expanded="true" aria-controls="collapseLokasi">
            <i class="fa fa-building"></i>
            <span>Lokasi</span>
        </a>
        <div id="collapseLokasi" class="collapse" aria-labelledby="headingLokasi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Lokasi</h6>
                <a class="collapse-item {{ Request::is('place') ? 'active' : '' }}" href="/place">Daftar Lokasi</a>
                <a class="collapse-item {{ Request::is('place/create') ? 'active' : '' }}" href="/place/create">Tambah Lokasi</a>
            </div>
        </div>
    </li>
    {{-- Lokasi --}}   

    {{-- BMN --}}
    <li class="nav-item {{ Request::is('inventory', 'inventory/*', 'importFile') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBMN"
            aria-expanded="true" aria-controls="collapseBMN">
            <i class="fas fa-boxes"></i>
            <span>Barang Milik Negara</span>
        </a>
        <div id="collapseBMN" class="collapse" aria-labelledby="headingBMN"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Barang Milik Negara</h6>
                <a class="collapse-item {{ Request::is('inventory') ? 'active' : '' }}" href="/inventory">Daftar Inventaris</a>
                <a class="collapse-item {{ Request::is('inventory/create') ? 'active' : '' }}" href="/inventory/create">Tambah Inventaris</a>
                <a class="collapse-item {{ Request::is('importFile') ? 'active' : '' }}" href="/importFile">Tambah Inventaris - File</a>
            </div>
        </div>
    </li>
    {{-- BMN --}}

    {{-- Pengaturan --}}
    <li class="nav-item {{ Request::is('setting') ? 'active' : '' }}">
        <a class="nav-link" href="/setting">
          <i class="fas fa-wrench"></i>
          <span>Pengaturan</span>
        </a>
    </li>
    {{-- Pengaturan --}}

    <hr class="sidebar-divider">
</ul>
