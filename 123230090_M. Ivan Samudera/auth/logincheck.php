<?php 
   session_start(); 
// menghubungkan dengan koneksi

include '../config/connect.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($cn,"select * from user where username='$username' and password='$password'")or die (mysqli_error($cn));
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status']   = "login";
	header("location:../home.php");
}else{
	header("location:login.php?pesan=gagal");
} ?>
