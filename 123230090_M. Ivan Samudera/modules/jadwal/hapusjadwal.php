<?php
session_start();

include '../../config/connect.php';

$id = $_GET['id_jadwal'];

mysqli_query($cn, "DELETE FROM jadwal WHERE id_jadwal = '$id' ");

header('location:jadwal.php?pesan=hapus')

?>