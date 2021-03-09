<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Berita</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url() ?>sa/berita">Berita</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Data</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>sa/berita" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
            </div>
            <div class="col-sm-12">&nbsp;
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img style="max-height: 300px; max-width: 300px;" src="<?php echo base_url('assets/admin/upload/berita/' . $berita['foto']); ?>" class="rounded" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;&nbsp;
                <div class="col-sm-4">
                    <div class="card-body">
                        <label><strong>Judul Berita</strong></label><br>
                        <label><strong>Kategori</strong></label><br>
                        <label><strong>Tanggal Update</strong></label><br>
                        <label><strong>Isi Berita</strong></label><br>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                        <label>: <?php echo $berita['judul_berita']; ?></label><br>
                        <label>: <?php echo $berita['kategori']; ?></label><br>
                        <label>: <?php echo date('d-m-Y', strtotime($berita['tanggal_update'])); ?></label><br>
                        <label>: <?php echo $berita['isi']; ?></label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>