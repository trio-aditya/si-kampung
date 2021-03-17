<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">SI | KAMPUNG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li <?= $this->uri->segment(1) == 'home' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('home'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'kategori_berita' || $this->uri->segment(2) == 'kategori_perangkat_desa' || $this->uri->segment(2) == 'kepala_desa' || $this->uri->segment(2) == 'slider_utama' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('sa/kategori_berita'); ?>">Kategori Berita</a>
                <a class="collapse-item" href="<?php echo base_url('sa/kepala_desa'); ?>">Kepala Desa</a>
                <a class="collapse-item" href="<?php echo base_url('sa/kategori_perangkat_desa'); ?>">Perangkat Desa</a>
                <a class="collapse-item" href="<?php echo base_url('sa/slider_utama'); ?>">Slider Utama</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'berita' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('sa/berita'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Berita</span></a>
    </li>

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'sejarah' || $this->uri->segment(2) == 'wilayah' || $this->uri->segment(2) == 'potensi' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('sa/sejarah'); ?>">Sejarah</a>
                <a class="collapse-item" href="<?php echo base_url('sa/wilayah'); ?>">Wilayah</a>
                <a class="collapse-item" href="<?php echo base_url('sa/potensi'); ?>">Potensi</a>
            </div>
        </div>
    </li>

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'pemerintah' || $this->uri->segment(2) == 'bpd' || $this->uri->segment(2) == 'lpm' || $this->uri->segment(2) == 'pkk' || $this->uri->segment(2) == 'karang_taruna' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Lembaga</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('sa/pemerintah'); ?>">Pemerintah</a>
                <a class="collapse-item" href="<?php echo base_url('sa/bpd'); ?>">BPD</a>
                <a class="collapse-item" href="<?php echo base_url('sa/lpm'); ?>">LPM</a>
                <a class="collapse-item" href="<?php echo base_url('sa/pkk'); ?>">PKK</a>
                <a class="collapse-item" href="<?php echo base_url('sa/karang_taruna'); ?>">Karang Taruna</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <!-- <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'pembangunan' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-university"></i>
        <span>Pembangunan</span></a>
</li>

<li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'layanan' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-desktop"></i>
        <span>Layanan</span></a>
</li> -->

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'kontak' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('sa/kontak'); ?>">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Kontak</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'penduduk' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penduduk" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>Kependudukan</span>
        </a>
        <div id="penduduk" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('sa/penduduk'); ?>">Penduduk</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == 'slider' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
        <a class="nav-link" href="<?php echo base_url('sa/slider'); ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Slider</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->