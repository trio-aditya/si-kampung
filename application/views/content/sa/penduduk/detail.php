<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Penduduk</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo base_url() ?>sa/penduduk">Penduduk</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Data</strong>
                </li>
            </ol>
        </div>
    </div><br>

    <div class="col-lg-12">
        <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>sa/penduduk" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a><br><br>
        <!-- Basic Card Example -->
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Data Penduduk</h6>
            </div>
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="text-center">
                        <img style="max-height: 300px; max-width: 300px;" src="<?php echo base_url('assets/admin/upload/penduduk/' . $penduduk['foto']); ?>" class="rounded" alt="...">
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-sm-12">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0" boder="2">
                    <thead>
                        <tr>
                            <th width="20%">Nomor Kartu Keluarga</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['no_kk']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">NIK</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nik']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Lengkap</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nama']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Hubungan Dalam Keluarga</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['hubungan_keluarga']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jenis Kelamin</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Agama</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['agama']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Status Penduduk</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['status_penduduk']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Akta Kelahiran</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['no_akta']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tempat / Tanggal Lahir</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['tempat_lahir']; ?> / <?php echo date_indo($penduduk['tanggal_lahir']); ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tempat Dilahirkan</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['tempat_dilahirkan']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Jenis Kelahiran</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['jenis_kelahiran']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Kelahiran Anak Ke</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['anak_ke']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Penolong Kelahiran</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['penolong_kelahiran']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Berat Lahir</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['berat_badan']; ?> gram</td>
                        </tr>
                        <tr>
                            <th width="20%">Panjang Lahir</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['panjang_lahir']; ?> cm</td>
                        </tr>
                        <tr>
                            <th width="20%">Pendidikan Dalam KK</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['pendidikan_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Pendidikan sedang ditempuh</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['pendidikan_ditempuh_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Pekerjaan</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['pekerjaan_id']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Warga Negara</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['status_warga_negara']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nomor KITAS/KITAP</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nomor_kitas']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">NIK Ayah</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nik_ayah']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Ayah</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nama_ayah']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">NIK Ibu</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nik_ibu']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Ayah</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['nama_ibu']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nomor Telepon</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['no_telepon']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat Email</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['email']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['alamat_sekarang']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Dusun</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['dusun']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">RT/RW</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['rt']; ?>/<?php echo $penduduk['rw']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Alamat Sebelumnya</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['alamat_sebelumnya']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Status Kawin</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['status_perkawinan']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Akta Perkawinan</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['no_akta_nikah']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Tanggal Perkawinan</th>
                            <td width="2%"> : </td>
                            <td><?php echo date_indo($penduduk['tanggal_perkawinan']); ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Golongan Darah</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Cacat</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['jenis_cacat']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Sakit Menahun</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['sakit_menahun']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Akseptor KB</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['akseptor']; ?></td>
                        </tr>
                        <tr>
                            <th width="20%">Nama Asuransi</th>
                            <td width="2%"> : </td>
                            <td><?php echo $penduduk['asuransi']; ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>