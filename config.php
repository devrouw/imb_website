<?php

//koneksi ke database mysql
$koneksi = mysqli_connect("localhost","u250888599_imb","User1234","u250888599_master");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if(mysqli_connect_errno()){
    echo "Gagal melakukan koneksi ke MYSQL: " . mysqli_connect_error();
}

?>