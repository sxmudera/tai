<?php

$hn = 'localhost';
$un = 'root';
$pw = '';
$db = 'praktikum';

$cn = new mysqli($hn, $un, $pw, $db);
if($cn -> connect_error){
    die('Maaf koneksi gagal!: '. $connect->connect_error);
}

?>