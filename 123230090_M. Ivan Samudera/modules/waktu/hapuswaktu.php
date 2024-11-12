<?php
session_start();
include '../../config/connect.php';

$id = $_GET['id_waktu'];

mysqli_query($cn, "DELETE FROM waktu WHERE id_waktu = '$id' ");

header('location:waktu.php?pesan=hapus')

?>