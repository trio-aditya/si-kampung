<body>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kontak</h2>
          <ol>
            <li><a href="<?php echo base_url(''); ?>">Beranda</a></li>
            <li>Kontak</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Alamat:</h4>
                  <p>Alamat Lengkap<br>Lampung Tengah, Lampung</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>email@example.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Telepon:</h4>
                  <p>0997786<br>0897646462</p>
                </div>
              </div>
            </div>

          </div>

        </div>


        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10 php-email-form">
          <?php echo form_open_multipart('kontak/proses_tambah_data'); ?>
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Harap masukkan setidaknya 4 karakter" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" data-rule="email" data-msg="Silahkan masukkan email yang benar" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subjek" placeholder="Subjek" data-rule="minlen:4" data-msg="Harap masukkan setidaknya 4 karakter" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="isi_pesan" rows="5" data-rule="required" data-msg="Silahkan tulis sesuatu untuk kami" placeholder="Pesan Anda"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
              <?php echo $this->session->flashdata('pesan'); ?>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
              <?php echo form_close() ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
