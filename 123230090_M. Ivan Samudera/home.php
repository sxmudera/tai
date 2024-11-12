<?php
session_start();

   if(empty($_SESSION['username']))
{
    header("location:index.php?pesan=belum_login");
    exit();
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="navbar-text text-light">Praktikum IF | 123230090</p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modules/lab/lab.php">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modules/waktu/waktu.php">Waktu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modules/jadwal/jadwal.php">Jadwal</a>
                </li>
            </ul>
            <ul class="navbar-nav"> 
                <li class="nav-item">
                    <a class="nav-link" href="auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="tengah container-fluid mt-5">
        <h1 class="text-center text-light">Selamat Datang</h1>
        <h3 class="text-center text-light">di Praktikum Informatika</h3>
        <div class="d-flex justify-content-center grid gap-3 row-gap-3">
            <a href="modules/lab/lab.php"><button class="tombol-2 btn btn-outline-light">Lab</button></a>
            <a href="modules/waktu/waktu.php"><button class="tombol-2 btn btn-outline-light ml-5">Waktu Praktikum</button></a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="modules/jadwal/jadwal.php"><button class="tombol btn btn-outline-light mt-5">Jadwal Praktikum</button></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>