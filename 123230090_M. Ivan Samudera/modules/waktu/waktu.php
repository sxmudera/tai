<?php

session_start();
   if(empty($_SESSION['username']))
{
    header("location:../../index.php?pesan=belum_login");
}


include '../../config/connect.php';

$query = mysqli_query($cn, "SELECT id_waktu, waktu_mulai, waktu_selesai FROM waktu");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style.css">    
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                    <span class="navbar-text text-light">Praktikum IF | 123230090</span>
                <li class="nav-item">
                    <a class="nav-link" href="../../home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../lab/lab.php">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Waktu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../jadwal/jadwal.php">Jadwal</a>
                </li>
            </ul>
            <ul class="navbar-nav"> 
                <li class="nav-item">
                    <a class="nav-link" href="../../auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid isilab">
        <div class="row vh-100 p-0">
            <div class="col d-flex justify-content-center">
                <div class="col col-sm-8 tabelab">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                    // Menampilkan data dalam tabel
                        while ($data = mysqli_fetch_assoc($query)) {
                            echo "<tr>"; 
                            echo "<td>$no</td>";
                            echo "<td>{$data['waktu_mulai']}-{$data['waktu_selesai']}</td>";
                            echo "<td> 
                                    <a href='hapuswaktu.php?id_waktu={$data['id_waktu']}'>
                                        <button class='btn btn-outline-danger btn-sm'>
                                            <span class='material-symbols-outlined'></span>
                                            Delete
                                        </button>
                                    </a>  
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col text-center tabelab2">
                <h1 class="text-center text-light">Input Waktu Praktikum</h1>
                <hr>
                <p class="text-light mt-2">Masukkan Waktu Pelaksanaan Praktikum</p>
                <div class="mt-5 d-flex justify-content-center">
                    <form method="POST" action="inputwaktu.php">
                        <div class="input d-flex">
                            <div class="me-5">
                                <label for="waktumulai" class="form-label text-light">Mulai</label>
                                <input type="time" name="wmulai" class="form-control bg-dark text-light w-100 inputwaktu text-center" placeholder="Input Nama Lab">
                            </div>

                            <div class="">
                                <label for="waktumulai" class="form-label text-light">Selesai</label>
                                <input type="time" name="wselesai" class="form-control bg-dark text-light w-100 inputwaktu text-center" placeholder="Input Nama Lab">
                            </div>
                        </div>
                        <button class="btn btn-outline-light mt-5 w-100">Submit</button>
                        <?php 
                        if(isset($_GET['pesan'])) {
                            if($_GET['pesan'] == 'input') {
                                echo "<p class='text-success text-center mt-4'>Waktu berhasil ditambahkan!</p>";
                            }elseif($_GET['pesan'] == 'hapus') {
                                echo "<p class='text-danger text-center mt-4'>Waktu berhasil dihapus!</p>";                
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>