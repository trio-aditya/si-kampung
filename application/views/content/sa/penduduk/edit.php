<script type="text/javascript" src="<?php echo base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Edit Data Penduduk</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>home">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>sa/penduduk">Penduduk</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Edit Data</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php echo form_open_multipart('sa/penduduk/proses_edit_data'); ?>
                    <div class="form-row">
                        <input type="hidden" name="id_penduduk" value="<?php echo $penduduk['id_penduduk']; ?>"></input>
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="text-center">
                                    <img style="max-height: 300px; max-width: 300px;" src="<?php echo base_url('assets/admin/upload/penduduk/' . $penduduk['foto']); ?>" class="rounded" alt="...">
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="form-group col-md-4">
                            <label><strong>Foto</strong></label>
                            <input type="file" class="form-control-file" name="foto" placeholder="Masukkan Foto">
                            <p><?php echo $penduduk['foto']; ?></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>NIK</strong></label>
                            <input type="text" class="form-control" name="nik" value="<?php echo $penduduk['nik']; ?>" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Nomor KK</strong></label>
                            <input type="text" class="form-control" name="no_kk" value="<?php echo $penduduk['no_kk']; ?>" placeholder="Masukkan Nomor KK" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Nama Lengkap</strong></label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $penduduk['nama']; ?>" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Hubungan Dalam Keluarga</strong></label>
                            <select name="hubungan_keluarga_id" class="form-control">
                                <option value="<?= $penduduk['id_hubungan_keluarga'] ?>" selected><?php echo $penduduk['hubungan_keluarga']; ?></option>
                                <?php foreach ($hubungan_keluarga as $value) : ?>
                                    <option value="<?= $value['id_hubungan_keluarga'] ?>"><?= $value['hubungan_keluarga'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Jenis Kelamin</strong></label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="<?php echo $penduduk['jenis_kelamin']; ?>" selected><?php echo $penduduk['jenis_kelamin']; ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Agama</strong></label>
                            <select name="agama_id" class="form-control">
                                <option value="<?= $penduduk['id_agama'] ?>" selected><?php echo $penduduk['agama']; ?></option>
                                <?php foreach ($agama as $value) : ?>
                                    <option value="<?= $value['id_agama'] ?>"><?= $value['agama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Status Penduduk</strong></label>
                            <select name="status_penduduk" class="form-control">
                                <option value="<?= $penduduk['status_penduduk'] ?>" selected><?php echo $penduduk['status_penduduk']; ?></option>
                                <option value="Tetap">Tetap</option>
                                <option value="Tidak Tetap">Tidak Tetap</option>
                                <option value="Pendatang">Pendatang</option>
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
                            <input type="text" class="form-control" name="no_akta" value="<?= $penduduk['no_akta'] ?>" placeholder="Masukkan Nomor Akta Kelahiran">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Tempat Lahir</strong></label>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $penduduk['tempat_lahir'] ?>" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Tanggal Lahir</strong></label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $penduduk['tanggal_lahir'] ?>" placeholder="Masukkan Tanggal Lahir">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Waktu Lahir</strong></label>
                            <input type="time" class="form-control" name="waktu_kelahiran" placeholder="Masukkan Waktu Lahir" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Tempat Dilahirkan</strong></label>
                            <select name="tempat_dilahirkan" class="form-control">
                                <option value="<?= $penduduk['tempat_dilahirkan'] ?>" selected><?php echo $penduduk['tempat_dilahirkan']; ?></option>
                                <option value="RS/RB">RS/RB</option>
                                <option value="Puskesmas">Puskesmas</option>
                                <option value="Polindes">Polindes</option>
                                <option value="Rumah">Rumah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Jenis Kelahiran</strong></label>
                            <select name="jenis_kelahiran" class="form-control">
                                <option value="<?= $penduduk['jenis_kelahiran'] ?>" selected><?php echo $penduduk['jenis_kelahiran']; ?></option>
                                <option value="Tunggal">Tunggal</option>
                                <option value="Kembar 2">Kembar 2</option>
                                <option value="Kembar 3">Kembar 3</option>
                                <option value="Kembar 4">Kembar 4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Anak Ke</strong></label>
                            <input type="number" class="form-control" name="anak_ke" value="<?= $penduduk['anak_ke'] ?>" placeholder="Masukkan Anak Ke">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Penolong Kelahiran</strong></label>
                            <select name="penolong_kelahiran" class="form-control">
                                <option value="<?= $penduduk['penolong_kelahiran'] ?>" selected><?php echo $penduduk['penolong_kelahiran']; ?></option>
                                <option value="Dokter">Dokter</option>
                                <option value="Bidan Perawat">Bidan Perawat</option>
                                <option value="Dukun">Dukun</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Berat Lahir (gram)</strong></label>
                            <input type="text" class="form-control" name="berat_badan" value="<?= $penduduk['berat_badan'] ?>" placeholder="Masukkan Berat Lahir">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Panjang Lahir (cm)</strong></label>
                            <input type="text" class="form-control" name="panjang_lahir" value="<?= $penduduk['panjang_lahir'] ?>" placeholder="Masukkan Panjang Lahir">
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
                            <select name="pendidikan_id" class="form-control">
                                <option value="<?= $penduduk['id_pendidikan'] ?>" selected><?php echo $penduduk['pendidikan']; ?></option>
                                <?php foreach ($pendidikan as $value) : ?>
                                    <option value="<?= $value['id_pendidikan'] ?>"><?= $value['pendidikan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Pendidikan Sedang Ditempuh</strong></label>
                            <select name="pendidikan_ditempuh_id" class="form-control">
                                <option value="<?= $penduduk['id_pendidikan_sekarang'] ?>" selected><?php echo $penduduk['pendidikan_sekarang']; ?></option>
                                <?php foreach ($pendidikan_sekarang as $value) : ?>
                                    <option value="<?= $value['id_pendidikan_sekarang'] ?>"><?= $value['pendidikan_sekarang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Pekerjaan</strong></label>
                            <select name="pekerjaan_id" class="form-control">
                                <option value="<?= $penduduk['id_pekerjaan'] ?>" selected><?= $penduduk['pekerjaan'] ?></option>
                                <!-- <option selected>- Pilih Pekerjaan -</option> -->
                                <?php foreach ($pekerjaan as $value) : ?>
                                    <option value="<?= $value['id_pekerjaan'] ?>"><?= $value['pekerjaan'] ?></option>
                                <?php endforeach; ?>
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
                                <option value="<?= $penduduk['status_warga_negara'] ?>" selected><?= $penduduk['status_warga_negara'] ?></option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                                <option value="Dua Kewarganegaraan">Dua Kewarganegaraan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Nomor KITAS/KITAP</strong></label>
                            <input type="text" class="form-control" name="nomor_kitas" value="<?= $penduduk['nomor_kitas'] ?>" placeholder="Masukkan Nomor KITAS/KITAP">
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
                            <input type="text" class="form-control" name="nik_ayah" value="<?= $penduduk['nik_ayah'] ?>" placeholder="Masukkan NIK Ayah">
                        </div>
                        <div class="form-group col-md-7">
                            <label><strong>Nama Ayah</strong></label>
                            <input type="text" class="form-control" name="nama_ayah" value="<?= $penduduk['nama_ayah'] ?>" placeholder="Masukkan Nama Ayah">
                        </div>
                        <div class="form-group col-md-5">
                            <label><strong>NIK Ibu</strong></label>
                            <input type="text" class="form-control" name="nik_ibu" value="<?= $penduduk['nik_ibu'] ?>" placeholder="Masukkan NIK Ibu">
                        </div>
                        <div class="form-group col-md-7">
                            <label><strong>Nama Ibu</strong></label>
                            <input type="text" class="form-control" name="nama_ibu" value="<?= $penduduk['nama_ibu'] ?>" placeholder="Masukkan Nama Ibu">
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
                            <input type="text" class="form-control" name="dusun" value="<?= $penduduk['dusun'] ?>" placeholder="Masukkan Nama Dusun">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>RT</strong></label>
                            <input type="text" class="form-control" name="rt" value="<?= $penduduk['rt'] ?>" placeholder="Masukkan RT">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>RW</strong></label>
                            <input type="text" class="form-control" name="rw" value="<?= $penduduk['rw'] ?>" placeholder="Masukkan RW">
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Nomor Telepon</strong></label>
                            <input type="text" class="form-control" name="no_telepon" value="<?= $penduduk['no_telepon'] ?>" placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Alamat Email</strong></label>
                            <input type="email" class="form-control" name="email" value="<?= $penduduk['email'] ?>" placeholder="Masukkan Alamat Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Alamat Sebelumnya</strong></label>
                            <input type="text" class="form-control" name="alamat_sebelumnya" value="<?= $penduduk['alamat_sebelumnya'] ?>" placeholder="Masukkan Alamat Sebelumnya">
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Alamat Sekarang</strong></label>
                            <input type="text" class="form-control" name="alamat_sekarang" value="<?= $penduduk['alamat_sekarang'] ?>" placeholder="Masukkan Alamat Sekarang">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            <b>STATUS PERKAWINAN</b>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label><strong>Status Perkawinan</strong></label>
                            <select name="status_perkawinan" class="form-control">
                                <option value="<?= $penduduk['status_perkawinan'] ?>" selected><?= $penduduk['status_perkawinan'] ?></option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>No. Akta Nikah (Buku Nikah) / Perkawinan</strong></label>
                            <input type="text" class="form-control" name="no_akta_nikah" value="<?= $penduduk['no_akta_nikah'] ?>" placeholder="Masukkan No. Akta Nikah (Buku Nikah) / Perkawinan">
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Tanggal Perkawinan</strong></label>
                            <input type="date" class="form-control" name="tanggal_perkawinan" value="<?= $penduduk['tanggal_perkawinan'] ?>" placeholder="Masukkan Tanggal Perkawinan">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            <b>KESEHATAN</b>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label><strong>Golongan Darah</strong></label>
                            <select name="golongan_darah_id" class="form-control">
                                <option value="<?= $penduduk['id_golongan_darah'] ?>" selected><?= $penduduk['golongan_darah'] ?></option>
                                <?php foreach ($golongan_darah as $value) : ?>
                                    <option value="<?= $value['id_golongan_darah'] ?>"><?= $value['golongan_darah'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Cacat</strong></label>
                            <select name="jenis_cacat_id" class="form-control">
                                <option value="<?= $penduduk['id_jenis_cacat'] ?>" selected><?= $penduduk['jenis_cacat'] ?></option>
                                <?php foreach ($jenis_cacat as $value) : ?>
                                    <option value="<?= $value['id_jenis_cacat'] ?>"><?= $value['jenis_cacat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Sakit Menahun</strong></label>
                            <select name="sakit_menahun_id" class="form-control">
                                <option value="<?= $penduduk['id_sakit_menahun'] ?>" selected><?= $penduduk['sakit_menahun'] ?></option>
                                <?php foreach ($sakit_menahun as $value) : ?>
                                    <option value="<?= $value['id_sakit_menahun'] ?>"><?= $value['sakit_menahun'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Akseptor KB</strong></label>
                            <select name="akseptor_kb_id" class="form-control">
                                <option value="<?= $penduduk['id_akseptor'] ?>" selected><?= $penduduk['akseptor'] ?></option>
                                <?php foreach ($akseptor as $value) : ?>
                                    <option value="<?= $value['id_akseptor'] ?>"><?= $value['akseptor'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label><strong>Asuransi</strong></label>
                            <select name="asuransi_id" class="form-control">
                                <option value="<?= $penduduk['id_asuransi'] ?>" selected><?= $penduduk['asuransi'] ?></option>
                                <?php foreach ($asuransi as $value) : ?>
                                    <option value="<?= $value['id_asuransi'] ?>"><?= $value['asuransi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
                    <a href="<?php echo base_url() ?>sa/penduduk" class="btn btn-danger" role="button" aria-pressed="true">BATAL</a>&nbsp;&nbsp;
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->