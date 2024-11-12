<?php
session_start();
include '../../config/connect.php';

$mk= $_POST['namamk'];
$j = $_POST ['jurusan'];
$lab = $_POST['lab'];
$waktu = $_POST['waktu'];


mysqli_query($cn, "INSERT INTO `jadwal` (`mk`, `jurusan`, `id_lab`, `id_waktu`) 
                   VALUES ('$mk', '$j', '$lab', '$waktu')") 
or die(mysqli_error($cn));


header("location:jadwal.php?pesan=input");
?>