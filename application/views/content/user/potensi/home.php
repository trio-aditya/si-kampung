<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Potensi</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Potensi</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
        
          <div class="col-lg-8 entries">
          <?php foreach ($potensi as $value) : ?>
            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="<?php echo base_url('assets/admin/upload/potensi/' . $value['foto']); ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?php echo base_url() ?>potensi/detail/<?php echo $value['id_potensi']; ?>"><?= $value['judul']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time datetime="2020-01-01"><?php echo date_indo('Y-m-d', strtotime($value['tanggal_update'])); ?></time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?= $value['isi']?>
                </p>
                <div class="read-more">
                  <a href="<?php echo base_url() ?>potensi/detail/<?php echo $value['id_potensi']; ?>">Detail Potensi</a>
                </div>
              </div>

            </article>
            <?php endforeach; ?>
            <?php echo $this->pagination->create_links(); ?>

            <!-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div> -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Pencarian</h3>
              <div class="sidebar-item search-form">
              <?php echo form_open('potensi/search') ?>
                  <input type="text" name="keyword" placeholder="Pencarian...">
                  <button type="submit" name="search_submit" value="Cari"><i class="icofont-search"></i></button>
                  <?php echo form_close() ?>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Potensi</h3>
              <div class="sidebar-item categories">
                <ul>
                <?php foreach ($potensi as $value) : ?>
                  <li><a href="<?php echo base_url() ?>potensi/detail/<?php echo $value['id_potensi']; ?>"><?= $value['judul']?></a></li>
                  <?php endforeach ?>
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Potensi Terbaru</h3>
              <div class="sidebar-item recent-posts">
              <?php foreach ($potensi as $value) : ?>
                <div class="post-item clearfix">
                  <img src="<?php echo base_url('assets/admin/upload/potensi/' . $value['foto']); ?>" alt="">
                  <h4><a href="<?php echo base_url() ?>potensi/detail/<?php echo $value['id_potensi']; ?>"><?= $value['judul']?></a></h4>
                  <time datetime="2020-01-01"><?php echo date_indo('Y-m-d', strtotime($value['tanggal_update'])); ?></time>
                </div>
                <?php endforeach ?>
                <hr>
                <?php echo $this->pagination->create_links(); ?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
