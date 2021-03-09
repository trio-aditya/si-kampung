<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>LPM</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>LPM</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row text-center">
          <?php foreach ($lpm as $value) : ?>
          <div class="col-lg-3 text-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="card text-center">
            <img src="<?php echo base_url('assets/admin/upload/karang_taruna/' . $value['foto']); ?>" class="card-img-top" alt="...">
              <div class="card-body text-center">
              <h5><b><?= $value['nama']?></b></h5>
              <hr>
              <p class="card-text"><?= $value['jabatan']?></p>
              </div>
            </div>
            <br>
          </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
