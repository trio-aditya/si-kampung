<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="<?php echo base_url(''); ?>"><span>SI</span> | KAMPUNG</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li <?= $this->uri->segment(1) == '' ? 'class="active"' : 'class="nav-item"' ?>>
          <a href="<?php echo base_url(''); ?>">Beranda</a></li>

          <li <?= $this->uri->segment(1) == 'berita' ? 'class="active"' : 'class="nav-item"' ?>>
          <a href="<?php echo base_url('berita'); ?>">Berita</a></li>

           <li <?= $this->uri->segment(1) == 'sejarah' || $this->uri->segment(1) == 'wilayah' || $this->uri->segment(1) == 'potensi' ? 'class="drop-down active"' : 'class="drop-down"' ?>> 
           <a href="">Profil</a>
            <ul>
              <li><a href="<?php echo base_url('sejarah'); ?>">Sejarah</a></li>
              <li><a href="<?php echo base_url('wilayah'); ?>">Wilayah</a></li>
              <li><a href="<?php echo base_url('potensi'); ?>">Potensi</a></li>
            </ul>
          </li>

          <li <?= $this->uri->segment(1) == 'pemerintah' || $this->uri->segment(1) == 'bpd' || $this->uri->segment(1) == 'lpm' || $this->uri->segment(1) == 'pkk' || $this->uri->segment(1) == 'karang_taruna'  ? 'class="drop-down active"' : 'class="drop-down"' ?>>
          <a href="">Lembaga</a>
            <ul>
              <li><a href="<?php echo base_url('pemerintah'); ?>">Pemerintah</a></li>
              <li><a href="<?php echo base_url('bpd'); ?>">BPD</a></li>
              <li><a href="<?php echo base_url('lpm'); ?>">LPM</a></li>
              <li><a href="<?php echo base_url('pkk'); ?>">PKK</a></li>
              <li><a href="<?php echo base_url('karang_taruna'); ?>">Karang Taruna</a></li>
            </ul>
          </li>
          <!-- <li><a href="<?php echo base_url(''); ?>">Pembangunan</a></li>
          <li><a href="<?php echo base_url(''); ?>">Layanan</a></li> -->
          <li <?= $this->uri->segment(1) == 'kontak' ? 'class="active"' : 'class="nav-item"' ?>><a href="<?php echo base_url('kontak'); ?>">Kontak</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="<?php echo base_url('auth/login'); ?>" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </a>
      </div>

    </div>
  </header><!-- End Header -->