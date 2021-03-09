<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pemerintah Desa</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Pemerintah Desa</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services section-bg">

      <div class="container" data-aos="fade-up">
        <div class="row text-center">
        <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="card text-center">
            </div>
          </div>
          <?php foreach ($kepala_desa as $value) : ?>
          <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="card text-center">
            <img src="<?php echo base_url('assets/admin/upload/kepala_desa/' . $value['foto']); ?>" class="card-img-top text-center" alt="...">
              <div class="card-body text-center">
              <h5><b><?= $value['nama']?></b></h5>
              <hr>
              <p class="card-text"><b><?= $value['periode']?></b></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>

      <hr>

      <div class="container" data-aos="fade-up">
        <div class="row text-center">
          <?php foreach ($pemerintah as $value) : ?>
          <div class="col-lg-3 text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="card text-center">
              <img src="<?php echo base_url('assets/admin/upload/pemerintah/' . $value['foto']); ?>" class="card-img-top" alt="...">
              <div class="card-body text-center">
              <h5><b><?= $value['nama']?></b></h5>
              <hr>
              <p class="card-text"><?= $value['kategori_pd']?></p>
              </div>
            </div>
            <br>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
