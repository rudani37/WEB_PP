<?php

$host = "localhost";
$user = "id5762022_admin";
$pass = "pzt254sc32";
$db = "id5762022_hij";

$konek = new mysqli($host, $user, $pass, $db);

function koneksi () {
$host = "localhost";
$user = "id5762022_admin";
$pass = "pzt254sc32";
$db = "id5762022_hij";

$konek = mysql_connect($host, $user, $pass, $db);
if ($konek) {
mysql_select_db($db, $konek);
} else {
echo mysql_error();
}
}

function query($str) {
koneksi();
$ekse = mysql_query("$str");
return $ekse;
}

function uploadFoto($file) {
    
    $namafile = $file[name];
    $tmp = $file[tmp_name];
    $ekstensi = strtolower(end(explode('.', $namafile)));

    //Validasi+Upload
    if ($ekstensi == 'jpg' || $ekstensi == 'png' || $ekstensi == 'jpeg') {
        move_uploaded_file($tmp, '../img/' . $namafile);
        return $namafile;
    } else {
        echo "<script> alert('Format File tidak mendukung'); history.back(); </script>";
        die();
    }
    
}

?>