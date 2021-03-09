<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Berita</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Berita</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
        
          <div class="col-lg-8 entries">
          <?php foreach ($berita as $value) : ?>
            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="<?php echo base_url('assets/admin/upload/berita/' . $value['foto']); ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?php echo base_url() ?>berita/detail/<?php echo $value['id_berita']; ?>"><?= $value['judul_berita']?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <!-- <li class="d-flex align-items-center"><i class="icofont-user"></i><?= $value['username']?></li> -->
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time datetime="2020-01-01"><?php echo date('d-m-Y', strtotime($value['tanggal_update'])); ?></time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                <?= $value['isi']?>
                </p>
                <div class="read-more">
                  <a href="<?php echo base_url() ?>berita/detail/<?php echo $value['id_berita']; ?>">Detail Berita</a>
                </div>
              </div>

            </article>
            <?php endforeach; ?>

            <?php echo $this->pagination->create_links(); ?>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              <h3 class="sidebar-title">Pencarian</h3>
              <div class="sidebar-item search-form">
              <?php echo form_open('berita/search') ?>
                  <input type="text" name="keyword" placeholder="Pencarian...">
                  <button type="submit" name="search_submit" value="Cari"><i class="icofont-search"></i></button>
                  <?php echo form_close() ?>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Kategori</h3>
              <div class="sidebar-item categories">
                <ul>
                <?php foreach ($kategori as $value) : ?>
                  <li>&raquo <a href="<?php echo base_url() ?>berita/kategori/<?php echo $value['id_kategoriberita']; ?>"><?= $value['kategori']?></a></li>
                  <?php endforeach ?>
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Berita Terbaru</h3>
              <div class="sidebar-item recent-posts">
              <?php foreach ($berita as $value) : ?>
                <div class="post-item clearfix">
                  <img src="<?php echo base_url('assets/admin/upload/berita/' . $value['foto']); ?>" alt="">
                  <h4><a href="<?php echo base_url() ?>berita/detail/<?php echo $value['id_berita']; ?>"><?= $value['judul_berita']?></a></h4>
                  <time datetime="2020-01-01"><?php echo date('d-m-Y', strtotime($value['tanggal_update'])); ?></time>
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
