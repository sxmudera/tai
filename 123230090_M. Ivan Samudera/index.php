<?php

session_start();

if(isset($_SESSION['username'])) {
    header("location:home.php");
    exit();
}


		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <span class="navbar-text text-light">Praktikum IF | 123230090</span>
            </ul>
        </div>
    </nav>

    <div class="tengah container-fluid mt-5">
        <h1 class="text-center text-light">Selamat Datang</h1>
        <div class="d-flex justify-content-center">
            <a href="auth/login.php"><button class="tombol btn btn-outline-light">Login</button></a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="auth/register.php"><button class="tombol btn btn-outline-light mt-5">Register</button></a>
        </div>
    </div>

    <?php
    if(isset($_GET['pesan']))
    {
        if($_GET['pesan'] == "logout")
        {
        echo "<p class='text-danger text-center mt-4'>Anda telah berhasil logout!</p>";
        }else if($_GET['pesan'] == "belum_login"){
            echo "<p class='text-danger text-center mt-4'>Silahkan login terlebih dahulu!</p>";
        }
    }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>