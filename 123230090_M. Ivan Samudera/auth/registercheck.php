<?php 
   session_start(); 
// menghubungkan dengan koneksi

include '../config/connect.php';
 
// menangkap data yang dikirim dari form
$unr = $_POST['username'];
$pwr = $_POST['password'];


// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($cn,"select * from user where username='$unr'")or die (mysqli_error($cn));
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek < 1){

    mysqli_query($cn, "INSERT INTO `user` (`username`, `password`) VALUES ('$unr', '$pwr')");

	$_SESSION['status']   = "login";
	header("location:login.php?pesan=register");
}else{
	header("location:register.php?pesan=gagal");
} ?>
