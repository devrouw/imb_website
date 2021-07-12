<?php include('config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $no_ktp            = $_POST['no_ktp'];
    $nama_lengkap    = $_POST['nama_lengkap'];
    $provinsi        = $_POST['provinsi'];
    $alamat            = $_POST['alamat'];
    $no_hp            = $_POST['no_hp'];

    $cek = mysqli_query($koneksi, "SELECT * FROM tb_profil WHERE no_ktp='$no_ktp'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek) == 0) {
        $sql = mysqli_query($koneksi, "INSERT INTO tb_profil(no_ktp, nama_lengkap, provinsi, alamat, no_hp) VALUES('$no_ktp', '$nama_lengkap', '$provinsi', '$alamat', '$no_hp')") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Gagal, NO KTP sudah terdaftar.</div>';
    }
}
?>

<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Permohonan IMB</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Permohonan IMB <small>Pendaftaran Permohonan IMB</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Silakan melakukan pengajuan IMB melalui langkah-langkah berikut</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li>
                                <a href="#step-1">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                                        Data Pemilik Bangunan<br />
                                        <small>Step 1 description</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                                        Lokasi Bangunan<br />
                                        <small>Step 2 description</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                                        Jenis Bangunan<br />
                                        <small>Step 3 description</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4">
                                    <span class="step_no">4</span>
                                    <span class="step_descr">
                                        Data Tanah<br />
                                        <small>Step 4 description</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-5">
                                    <span class="step_no">5</span>
                                    <span class="step_descr">
                                        Data Administrasi<br />
                                        <small>Step 5 description</small>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div id="step-1">
                        <center><font size="4">Data Pemilik Bangunan</font></center><hr>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Memiliki NIB? <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Bentuk Kepemilikan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nama Pemilik/Perusahaan</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col" type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pemilik/Perusahaan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telp/HP<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Identitas<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-2">
                        <center><font size="4">Lokasi Bangunan</font></center><hr>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Provinsi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kab/Kota<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col" type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Bangunan Gedung<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-3">
                        <center><font size="4">Jenis Bangunan</font></center><hr>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Permohonan IMB<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Fungsi Bangunan</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col" type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tinggi Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Lantai Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Luas Basement Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Lantai Basement Bangunan<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Dokumen Teknis<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-4">
                        <center><font size="4">Data Tanah</font></center><hr>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Dokumen<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal Terbit Dokumen<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Hak Atas Tanah</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col" type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Lokasi Tanah<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Berkas Kepemilikan Tanah<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Dokumen<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Luas Tanah<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pemegang Hak Atas Tanah<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-5">
                        <center><font size="4">Data Administrasi</font></center><hr>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Scan KTP Pemohon atau KITAS untuk pemohon (WNA)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="first-name" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Scan Keterangan Rencana Kabupaten/Kota<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Surat Pernyataan untuk mengikuti Ketentuan dalam KRK</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="middle-name" class="form-control col" type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Data Perencana Konstruksi dan Sertifikat Keahlian<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- End SmartWizard Content -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- jQuery -->
<script src="assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="assets/fastclick/lib/fastclick.js"></script>
<!-- jQuery Smart Wizard -->
<script src="assets/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<!-- <script src="assets/js/custom.min.js"></script> -->