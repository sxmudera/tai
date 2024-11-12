<?php
session_start();
include '../../config/connect.php';

$nl = $_POST['namaLab'];

mysqli_query($cn, "INSERT INTO `lab` (`lab`) VALUES ('$nl')");
header("location:lab.php?pesan=input");
?>