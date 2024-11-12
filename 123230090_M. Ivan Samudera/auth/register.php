<?php
session_start();
if(isset($_SESSION['username'])) {
    header("location:../home.php");
    exit();
}
?>


<html>
<head>
	<title>Membuat Login Dengan PHP dan MySQLi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                    <span class="navbar-text text-light">Praktikum IF | 123230090</span>
            </ul>
        </div>
    </nav>

    <div class="tengah container-fluid">
        <h1 class="text-center text-light">Register Page</h1>
        <hr>

        <form method="POST" action="registercheck.php">
            <div class="d-flex justify-content-center mt-5">
                <label for="username"></label>
                <input type="text" name="username" class="form-control bg-dark text-light w-25" placeholder="Masukkan username">
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                <input type="password" name="password" class="form-control bg-dark w-25" placeholder="Masukkan password">
            </div>

            <div class="d-flex justify-content-center">
                <a href="logincheck.php" value="LOGIN"><button class="tombol-login btn btn-outline-light">Register</button></a>
            </div>

            <div class="text-center text-light mt-4">
                <p>Sudah punya akun?<a href="login.php" class="text-center text-light"> Login di sini.</a></p>
            </div>
			
        </form>
    </div>
	<!-- cek pesan notifikasi -->
	<?php 
		if(isset($_GET['pesan']))
		{
			if($_GET['pesan'] == "gagal")
			{
			echo "<p class='text-danger text-center mt-4'>Register gagal! Username sudah digunakan</p>";
			}
         }
   ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html
