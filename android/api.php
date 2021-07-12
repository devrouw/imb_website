<?php
set_time_limit(0);
date_default_timezone_set("Asia/Makassar");
include_once './conn.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// mysqli_set_charset('utf8');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(json_decode(file_get_contents('php://input'), true)){
        $_POST = json_decode(file_get_contents('php://input'), true);
    };
    $date=date("Ymd-h_i_s");
    $case=$_POST['case'];
    switch($case){

#----------------------------------------------------------------------------------------------------------------------------------------
case "daftar":
    $type_query = "input";
    $no_ktp = $_POST['no_ktp'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $provinsi = $_POST['provinsi'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        $response["code"] = 404;
        $response["status"] = "error";
        $response["data"] = null;
        $response["message"] = "Email Sudah Terdaftar";
        
        echo json_encode($response);
    } else {
    $query = "BEGIN; 
    INSERT INTO tb_profil(
        no_ktp,nama_lengkap,provinsi,alamat,no_hp
    ) VALUES(
        '$no_ktp','$nama_lengkap','$provinsi','$alamat','$no_hp'
    );
    INSERT INTO tb_akun(
        email,password,no_ktp,id_role
    ) VALUES (
        '$email','$password','$no_ktp','2'
    );
    COMMIT;";

    $message = 'Berhasil Registrasi!'; 
    include './res.php';
}
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "login":
    $type_query = "show";
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
    $message = 'Data Ada!';
    
    include './res.php';
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "input_pengajuan":
    $type_query = "input";
    $kepemilikan_nib = $_POST['kepemilikan_nib'];
    $bentuk_kepemilikan = $_POST['bentuk_kepemilikan'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat_pemilik = $_POST['alamat_pemilik'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $no_ktp = $_POST['no_ktp'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $alamat_bangunan = $_POST['alamat_bangunan'];
    $nama_bangunan = $_POST['nama_bangunan'];
    $permohonan_imb = $_POST['permohonan_imb'];
    $fungsi_bangunan = $_POST['fungsi_bangunan'];
    $jenis_bangunan = $_POST['jenis_bangunan'];
    $tinggi_bangunan = $_POST['tinggi_bangunan'];
    $jumlah_lantai = $_POST['jumlah_lantai'];
    $luas_basement = $_POST['luas_basement'];
    $luas_lantai_basement = $_POST['luas_lantai_basement'];
    $dokumen_teknis = $_POST['dokumen_teknis'];
    $jenis_dokumen = $_POST['jenis_dokumen'];
    $tgl_terbit_dokumen = $_POST['tgl_terbit_dokumen'];
    $hak_atas_tanah = $_POST['hak_atas_tanah'];
    $lokasi_tanah = $_POST['lokasi_tanah'];
    $batas_kepemilikan = $_POST['batas_kepemilikan'];
    $nomor_dokumen = $_POST['nomor_dokumen'];
    $luas_tanah = $_POST['luas_tanah'];
    $nama_pemegang = $_POST['nama_pemegang'];
    $scan_ktp = $_POST['scan_ktp'];
    $scan_bukti_lunas_pbb = $_POST['scan_bukti_lunas_pbb'];
    $scan_pehitungan_sondir = $_POST['scan_pehitungan_sondir'];
    $id_akun = $_POST['id_akun'];

    $query = "INSERT INTO tb_pengajuan(
        kepemilikan_nib,bentuk_kepemilikan,nama_pemilik,alamat_pemilik,no_telp,email,no_ktp,provinsi,kota,kecamatan,alamat_bangunan,
        nama_bangunan,permohonan_imb,fungsi_bangunan,jenis_bangunan,tinggi_bangunan,jumlah_lantai,luas_basement,luas_lantai_basement,
        dokumen_teknis,jenis_dokumen,tgl_terbit_dokumen,hak_atas_tanah,lokasi_tanah,batas_kepemilikan,nomor_dokumen,luas_tanah,
        nama_pemegang,scan_ktp,scan_bukti_lunas_pbb,scan_pehitungan_sondir,id_akun
    ) VALUES(
        '$kepemilikan_nib','$bentuk_kepemilikan','$nama_pemilik','$alamat_pemilik','$no_telp','$email','$no_ktp','$provinsi','$kota',
        '$kecamatan','$alamat_bangunan','$nama_bangunan','$permohonan_imb','$fungsi_bangunan','$jenis_bangunan','$tinggi_bangunan',
        '$jumlah_lantai','$luas_basement','$luas_lantai_basement','$dokumen_teknis','$jenis_dokumen','$tgl_terbit_dokumen','$hak_atas_tanah',
        '$lokasi_tanah','$batas_kepemilikan','$nomor_dokumen','$luas_tanah','$nama_pemegang','$scan_ktp','$scan_bukti_lunas_pbb',
        '$scan_pehitungan_sondir','$id_akun'
    )";
    $message = 'Data Berhasil diinput!';
    
    include './res.php';
die();
break;

    }
}
