<script type="text/javascript" src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Pendidikan Sedang Ditempuh</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>home">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Data Master</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Pendidikan Sekarang</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pendidikan Sedang Ditempuh
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Berita" data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</button>
                        </div>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>Pendidikan Sedang Ditempuh</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pendidikan_sekarang as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['pendidikan_sekarang']; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Edit Data" data-target="#editmodal<?php echo $value['id_pendidikan_sekarang']; ?>">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                            <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?php echo base_url() ?>sa/pendidikan_sekarang/hapus_data/<?php echo $value['id_pendidikan_sekarang']; ?>" role="button">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>Pendidikan</th>
                                    <th width="15%">Aksi</th>
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

<!-- Start of Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pendidikan_sekarang/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Pendidikan Sedang Ditempuh</strong></label>
                    <input type="text" name="pendidikan_sekarang" class="form-control" required>
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
<!-- End of Modal Tambah Data -->

<!-- Start of Modal Edit Data -->
<?php $no = 0; ?>
<?php foreach ($pendidikan_sekarang as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_pendidikan_sekarang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/pendidikan_sekarang/proses_edit_data'); ?>
                <input type="hidden" name="id_pendidikan_sekarang" value="<?php echo $value['id_pendidikan_sekarang']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Pendidikan Sedang Ditempuh</strong></label>
                        <input type="text" name="pendidikan_sekarang" value="<?php echo $value['pendidikan_sekarang']; ?>" class="form-control" required>
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