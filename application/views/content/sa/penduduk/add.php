<script type="text/javascript" src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Tambah Data Penduduk</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>home">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>penduduk">Penduduk</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Tambah Data</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>NIK</strong></label>
                                <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group col-md-8">
                                <label><strong>Nama Lengkap</strong></label>
                                <input type="password" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Nomor KK</strong></label>
                                <input type="text" class="form-control" name="no_kk" placeholder="Masukkan Nomor KK">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Hubungan Dalam Keluarga</strong></label>
                                <input type="password" class="form-control" name="hubungan_keluarga" placeholder="Masukkan Hubungan Dalam Keluarga">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Jenis Kelamin</strong></label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option selected>- Pilih Jenis kelamin -</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><strong>Agama</strong></label>
                                <select name="agama" class="form-control">
                                    <option selected>- Pilih Agama -</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Kristen</option>
                                    <option value="3">Katolik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Budha</option>
                                    <option value="6">Khonghucu</option>
                                    <option value="7">Kepercayaan Terhadap Tuhan YME / Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>Status Penduduk</strong></label>
                                <select name="agama" class="form-control">
                                    <option selected>- Pilih Status Penduduk -</option>
                                    <option value="1">Tetap</option>
                                    <option value="2">Tidak Tetap</option>
                                    <option value="3">Pendatang</option>
                                    <option value="2">Hindu</option>
                                    <option value="2">Budha</option>
                                    <option value="2">Khonghucu</option>
                                    <option value="2">Kepercayaan Terhadap Tuhan YME / Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>DATA KELAHIRAN</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Nomor Akta Kelahiran</strong></label>
                                <input type="text" class="form-control" name="no_akta" placeholder="Masukkan Nomor Akta Kelahiran">
                            </div>
                            <div class="form-group col-md-8">
                                <label><strong>Tempat Lahir</strong></label>
                                <input type="password" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Tanggal Lahir</strong></label>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Waktu Lahir</strong></label>
                                <input type="time" class="form-control" name="waktu_lahir" placeholder="Masukkan Waktu Lahir">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Tempat Dilahirkan</strong></label>
                                <select name="tempat_dilahirkan" class="form-control">
                                    <option selected>- Pilih Tempat Dilahirkan -</option>
                                    <option value="1">RS/RB</option>
                                    <option value="2">Puskesmas</option>
                                    <option value="3">Polindes</option>
                                    <option value="4">Rumah</option>
                                    <option value="5">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Jenis Kelahiran</strong></label>
                                <select name="jenis_kelahiran" class="form-control">
                                    <option selected>- Pilih Jenis Kelahiran -</option>
                                    <option value="1">Tunggal</option>
                                    <option value="2">Kembar 2</option>
                                    <option value="3">Kembar 3</option>
                                    <option value="4">Kembar 4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Anak Ke</strong></label>
                                <input type="number" class="form-control" name="anak_ke" placeholder="Masukkan Anak Ke">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Penolong Kelahiran</strong></label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option selected>- Pilih Penolong Kelahiran -</option>
                                    <option value="1">Dokter</option>
                                    <option value="2">Bidan Perawat</option>
                                    <option value="3">Dukun</option>
                                    <option value="4">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Berat Lahir (Gram)</strong></label>
                                <input type="number" class="form-control" name="berat_lahir" placeholder="Masukkan Berat Lahir">
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Panjang Lahir (cm)</strong></label>
                                <input type="number" class="form-control" name="panjang_lahir" placeholder="Masukkan Panjang Lahir">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>PENDIDIKAN DAN PEKERJAAN</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Pendidikan Dalam KK</strong></label>
                                <select name="pendidikan" class="form-control">
                                    <option selected>- Pilih Pendidikan Dalam KK -</option>
                                    <option value="1">Tidak/Belum Sekolah</option>
                                    <option value="2">Belum Tamat SD/Sederajat</option>
                                    <option value="3">Tamat SD/Sederajat</option>
                                    <option value="4">SMP/Sederajat</option>
                                    <option value="5">SMA/Sederajat</option>
                                    <option value="6">Diploma I/II</option>
                                    <option value="7">Akademi/Diploma III/S.Muda</option>
                                    <option value="8">Diploma IV/Strata I</option>
                                    <option value="9">Strata II</option>
                                    <option value="10">Strata III</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Pendidikan Sedang Ditempuh</strong></label>
                                <select name="pendidikan_ditempuh" class="form-control">
                                    <option selected>- Pilih Pendidikan -</option>
                                    <option value="1">Belum Masuk TK/Kelompok Bermain</option>
                                    <option value="2">Sedang TK/Kelompok Bermain</option>
                                    <option value="3">Tidak Pernah Sekolah</option>
                                    <option value="4">Sedang SD/Sederajat</option>
                                    <option value="5">Sedang SMP/Sederajat</option>
                                    <option value="6">Sedang SMA/Sederajat</option>
                                    <option value="7">Sedang D-1/Sederajat</option>
                                    <option value="8">Sedang D-2/Sederajat</option>
                                    <option value="9">Sedang D-2/Sederajat</option>
                                    <option value="10">Sedang S-1/Sederajat</option>
                                    <option value="11">Sedang S-2/Sederajat</option>
                                    <option value="12">Sedang S-3/Sederajat</option>
                                    <option value="13">Sedang SLB A/Sederajat</option>
                                    <option value="14">Sedang SLB B/Sederajat</option>
                                    <option value="15">Sedang SLB C/Sederajat</option>
                                    <option value="16">Tidak Sedang Sekolah</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Pekerjaan</strong></label>
                                <select name="pekerjaan" class="form-control">
                                    <option selected>- Pilih Pekerjaan -</option>
                                    <option value="1">Belum/Tidak Bekerja</option>
                                    <option value="2">Mengurus Rumah Tangga</option>
                                    <option value="3">Pelajar/Mahasiswa</option>
                                    <option value="4">Pensiunan</option>
                                    <option value="5">Pegawai Negeri Sipil (PNS)</option>
                                    <option value="6">Tentara Nasional Indonesia (TNI)</option>
                                    <option value="7">Kepolisian RI (POLRI)</option>
                                    <option value="8">Perdagangan</option>
                                    <option value="9">Petani/Pekebun</option>
                                    <option value="10">Sedang S-1/Sederajat</option>
                                    <option value="11">Peternak</option>
                                    <option value="12">Nelayan/Perikanan</option>
                                    <option value="13">Industri</option>
                                    <option value="14">Konstruksi</option>
                                    <option value="15">Transportasi</option>
                                    <option value="16">Karyawan Swasta</option>
                                    <option value="17">Karyawan BUMN</option>
                                    <option value="18">Karyawan BUMD</option>
                                    <option value="19">Karyawan Honorer</option>
                                    <option value="20">Buruh Harian Lepas</option>
                                    <option value="21">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>DATA KEWARGANEGARAAN</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Status Warga Negara</strong></label>
                                <select name="status_warga_negara" class="form-control">
                                    <option selected>- Pilih Status Warga Negara -</option>
                                    <option value="1">WNI</option>
                                    <option value="2">WNA</option>
                                    <option value="3">Dua Kewarganegaraan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>Nomor KITAS/KITAP</strong></label>
                                <input type="text" class="form-control" name="no_kitas" placeholder="Masukkan Nomor KITAS/KITAP">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>DATA ORANG TUA</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label><strong>NIK Ayah</strong></label>
                                <input type="text" class="form-control" name="nik_ayah" placeholder="Masukkan NIK Ayah">
                            </div>
                            <div class="form-group col-md-7">
                                <label><strong>Nama Ayah</strong></label>
                                <input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                            </div>
                            <div class="form-group col-md-5">
                                <label><strong>NIK Ibu</strong></label>
                                <input type="text" class="form-control" name="nik_ibu" placeholder="Masukkan NIK Ibu">
                            </div>
                            <div class="form-group col-md-7">
                                <label><strong>Nama Ibu</strong></label>
                                <input type="text" class="form-control" name="nama_ibu" placeholder="Masukkan Nama Ibu">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>ALAMAT</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Dusun</strong></label>
                                <select name="dusun" class="form-control">
                                    <option selected>- Pilih Dusun -</option>
                                    <option value="1">Dusun A</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>RT</strong></label>
                                <select name="rt" class="form-control">
                                    <option selected>- Pilih RT -</option>
                                    <option value="1">RT A</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>RW</strong></label>
                                <select name="rw" class="form-control">
                                    <option selected>- Pilih RW -</option>
                                    <option value="1">RW A</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="alert alert-warning" role="alert">
                                <b>ALAMAT</b>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label><strong>Dusun</strong></label>
                                <select name="dusun" class="form-control">
                                    <option selected>- Pilih Dusun -</option>
                                    <option value="1">Dusun A</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>RT</strong></label>
                                <select name="rt" class="form-control">
                                    <option selected>- Pilih RT -</option>
                                    <option value="1">RT A</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label><strong>RW</strong></label>
                                <select name="rw" class="form-control">
                                    <option selected>- Pilih RW -</option>
                                    <option value="1">RW A</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Start of Modal Tambah Data -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/kepala_desa/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Nama Lengkap</strong></label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Foto</strong></label>
                    <input type="file" name="foto" class="form-control-file" required>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Periode</strong></label>
                    <input type="text" name="periode" class="form-control" required>
                </div>
                <hr>
                <div class="form-group">
                    <label><strong>Sambutan Singkat</strong></label>
                    <textarea class="ckeditor" id="ckeditor" name="sambutan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div> -->
<!-- End of Modal Tambah Data -->

<!-- Start of Modal Edit Data -->
<!-- <?php $no = 0; ?>
<?php foreach ($kepala_desa as $value) : $no++ ?>
    <div class="modal fade" id="editmodal<?php echo $value['id_kepala_desa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart('sa/kepala_desa/proses_edit_data'); ?>
                <input type="hidden" name="id_kepala_desa" value="<?php echo $value['id_kepala_desa']; ?>"></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong>Nama Lengkap</strong></label>
                        <input type="text" name="nama" value="<?php echo $value['nama']; ?>" class="form-control" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Foto</strong></label>
                        <input type="file" name="foto" class="form-control-file"><br>
                        <img style="max-height: 70px; max-width: 70px;" src="<?php echo base_url('assets/admin/upload/kepala_desa/' . $value['foto']); ?>" class="rounded" alt="...">
                        <p><?php echo $value['foto']; ?></p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Periode</strong></label>
                        <input type="text" name="periode" value="<?php echo $value['periode']; ?>" class="form-control" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label><strong>Sambutan Singkat</strong></label>
                        <textarea class="ckeditor" id="ckeditor" name="sambutan"><?php echo $value['sambutan']; ?></textarea>
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
<?php endforeach ?> -->
<!-- End of Modal Edit Data -->