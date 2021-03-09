<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Wilayah</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Wilayah</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
        
          <div class="col-lg-12 entries">
          <?php foreach ($wilayah as $value) : ?>
            <article class="entry" data-aos="fade-up">

              <div class="entry-content">
                <p>
                <?= $value['wilayah']?>
                </p>
              </div>
            </article>
            <?php endforeach; ?>


          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
