<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sejarah</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Sejarah</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
        
          <div class="col-lg-12 entries">
          <?php foreach ($sejarah as $value) : ?>
            <article class="entry" data-aos="fade-up">

              <div class="entry-content">
                <p>
                <?= $value['sejarah']?>
                </p>
              </div>
            </article>
            <?php endforeach; ?>


          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
