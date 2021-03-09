<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner" role="listbox">

      <?php foreach ($slider_utama as $value) : ?>
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?php echo base_url('assets/admin/upload/slider/' . $value['foto']); ?>);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <!-- <h2>Welcome to <span>Company</span></h2> -->
              <h3><?= $value['judul']?></h3>
              <p><?= $value['pesan']?></p>
              <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        
      <?php foreach ($slider as $value) : ?>
        <!-- Slide 1 -->
        <div class="carousel-item" style="background-image: url(<?php echo base_url('assets/admin/upload/slider/' . $value['foto']); ?>);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <!-- <h2>Welcome to <span>Company</span></h2> -->
              <p><?= $value['pesan']?></p>
              <!-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> -->
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      

    </div>
  </section><!-- End Hero -->

  <main id="main" class="text-center">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sambutan Kepala Desa</strong></h2>
        </div>

        <div class="row content text-center">
          <div class="row g-0">
          <?php foreach ($kepala_desa as $value) : ?>
            <div class="col-md-3">
              <img src="<?php echo base_url('assets/admin/upload/kepala_desa/' . $value['foto']); ?>" alt="...">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="card-title">Selamat datang di Website Kampung kami</h5>
                <p class="card-text"><?= $value['sambutan']?></p>
                <p class="card-text"><small class="text-muted"><?= $value['nama']?></small></p>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Potensi Kampung</strong></h2>
          <p>Kampung A memiliki banyak potensi yang baik untuk dikembangkan. </p>
        </div>

        <div class="row text-center">
          <?php foreach ($potensi as $value) : ?>
          <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="card text-center">
            <img src="<?php echo base_url('assets/admin/upload/potensi/' . $value['foto']); ?>" class="card-img-top" alt="...">
              <div class="card-body">
              <h5><b><?= $value['judul']?></b></h5>
              <hr>
              <a class="btn btn-outline-success" href="<?php echo base_url() ?>potensi/detail/<?php echo $value['id_potensi']; ?>" role="button">Lihat Potensi</a>
              </div>
            </div>
            <br>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Informasi Kampung</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

        <?php foreach ($berita as $value) : ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="<?php echo base_url('assets/admin/upload/berita/' . $value['foto']); ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?= $value['judul_berita']?></h4>
              <p><?= $value['kategori']?></p>
              <a href="<?php echo base_url('assets/admin/upload/berita/' . $value['foto']); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="<?= $value['judul_berita']?>"><i class="bx bx-show-alt"></i></a>
              <a href="<?php echo base_url() ?>berita/detail/<?php echo $value['id_berita']; ?>" class="details-link" title="Detail"><i class="bx bx-link"></i></a>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <!-- <hr>
          <?php echo $this->pagination->create_links(); ?> -->
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  