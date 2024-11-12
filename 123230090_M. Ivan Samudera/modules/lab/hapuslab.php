<?php
session_start();


include '../../config/connect.php';

$id = $_GET['id_lab'];

mysqli_query($cn, "DELETE FROM lab WHERE id_lab = '$id' ");

header('location:lab.php?pesan=hapus')

?>