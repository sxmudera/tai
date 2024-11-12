<?php

session_start();

include '../../config/connect.php';

$mk = $_POST['pilmk'];
$jurusan = $_POST['jurusan'];
$lab = $_POST['pilab'];
$waktu = $_POST['waktu'];
$idjadwal = $_POST['idjadwal'];

mysqli_query($cn, "UPDATE jadwal SET mk='$mk', jurusan='$jurusan', id_lab='$lab', id_waktu='$waktu' WHERE id_jadwal='$idjadwal'");

header("Location:jadwal.php?pesan=update");


?>