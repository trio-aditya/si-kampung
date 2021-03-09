<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Potensi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url() ?>sa/potensi">Potensi</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Data</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>sa/potensi" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Potensi Kampung</h6>
            </div>
            <div class="col-sm-12">&nbsp;
                        <div class="text-center">
                            <img style="max-height: 600px; max-width:600px;" src="<?php echo base_url('assets/admin/upload/potensi/' . $potensi['foto']); ?>" class="rounded" alt="...">
                        </div>
            </div>
            
            <div class="row">&nbsp;&nbsp;
                <div class="col-sm-12">
                    <div class="card-body">
                    <hr>
                        <div class="text-center">
                            <h3><b><?php echo $potensi['judul']; ?></b></h3><br>
                        </div>
                        <div class="text-justify">
                            <label><?php echo $potensi['isi']; ?></label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>