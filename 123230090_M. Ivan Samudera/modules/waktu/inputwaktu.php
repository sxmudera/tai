<?php
session_start();
include '../../config/connect.php';

$wm = $_POST['wmulai'];
$ws = $_POST['wselesai'];

mysqli_query($cn, "INSERT INTO `waktu` (`waktu_mulai`, `waktu_selesai`) VALUES ('$wm', '$ws')");
header("location:waktu.php?pesan=input");
?>