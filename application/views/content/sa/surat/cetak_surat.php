<script type="text/javascript" src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Cetak Layanan Surat</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>home">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Cetak Surat</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Cetak Layanan Surat
                        <!-- <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Tambah Data" data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</button>
                        </div> -->
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th width="10%">Aksi</th>
                                    <th>Layanan Administrasi Surat</th>
                                    <th>Kode Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($cetak_surat as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td align="center">
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Buat Surat" data-target="#editmodal<?php echo $value['id_surat']; ?>">
                                                <i class="fa fa-file-word" aria-hidden="true"></i> Buat Surat
                                            </button>
                                        </td>
                                        <td><?= $value['nama_layanan']; ?></td>
                                        <td><?= $value['kode']; ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th width="10%">Aksi</th>
                                    <th>Layanan Administrasi Surat</th>
                                    <th>Kode Surat</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Start of Modal Buat Surat -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/cetak_surat/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>NIK/Nama</strong></label>
                    <select name="penduduk_id" class="form-control">
                        <?php foreach ($penduduk as $value) : ?>
                            <option value="<?= $value['id_penduduk'] ?>"><?= $value['nik'] ?> - <?= $value['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Keperluan</strong></label>
                    <input type="text" name="keperluan" class="form-control" placeholder="Masukkan Keperluan" required>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Keterangan</strong></label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Berlaku Dari - Sampai</strong></label>
                    <div class="row">
                        <div class="col">
                            <input type="date" name="dari" class="form-control" required>
                        </div>
                        <div class="col">
                            <input type="date" name="sampai" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Buat Surat</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div> -->
<!-- End of Modal Buat Surat -->


<!-- Start of Modal Edit Data -->
<?php $no = 0; ?>
<?php foreach ($cetak_surat as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/cetak_surat/proses_tambah_data'); ?>
                <input type="hidden" name="surat_id" value="<?php echo $value['id_surat']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>NIK/Nama</strong></label>
                        <select name="penduduk_id" class="form-control">
                            <?php foreach ($penduduk as $value) : ?>
                                <option value="<?= $value['id_penduduk'] ?>"><?= $value['nik'] ?> - <?= $value['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Keperluan</strong></label>
                        <input type="text" name="keperluan" class="form-control" placeholder="Masukkan Keperluan" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Keterangan</strong></label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Berlaku Dari - Sampai</strong></label>
                        <div class="row">
                            <div class="col">
                                <input type="date" name="dari" class="form-control" required>
                            </div>
                            <div class="col">
                                <input type="date" name="sampai" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End of Modal Edit Data -->