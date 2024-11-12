<?php

session_start();
   if(empty($_SESSION['username']))
{
    header("location:../../index.php?pesan=belum_login");
}


include '../../config/connect.php';

$query = mysqli_query($cn, "SELECT jadwal.id_jadwal, jadwal.mk, jadwal.jurusan, lab.lab, lab.id_lab, waktu.id_waktu, waktu.waktu_mulai, waktu.waktu_selesai FROM jadwal 
                            INNER JOIN lab ON jadwal.id_lab = lab.id_lab    
                            INNER JOIN waktu ON jadwal.id_waktu = waktu.id_waktu");

$querylab = mysqli_query($cn, "SELECT id_lab, lab FROM lab");

$querywaktu = mysqli_query($cn, "SELECT id_waktu, waktu_mulai, waktu_selesai FROM waktu");

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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="navbar-text text-light">Praktikum IF | 123230090</p>
                </li>
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
                <div class="col col-sm-8 ">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>MK Praktikum</th>
                            <th>Jurusan</th>
                            <th>Lab</th>
                            <th>Waktu</th>
                            <th colspan = "2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                // Menampilkan data dalam tabel
                            while ($data = mysqli_fetch_assoc($query)) {
                                echo "<tr>"; 
                                echo "<td>$no</td>";$no++;
                                echo "<td>{$data['mk']}</td>";
                                echo "<td>{$data['jurusan']}</td>";
                                echo "<td>{$data['lab']}</td>";
                                echo "<td>{$data['waktu_mulai']}-{$data['waktu_selesai']}</td>";    
                                echo "<td> 
                                        <div class='d-inline-flex'>
                                            <a href='editjadwal.php?id_jadwal={$data['id_jadwal']}&mk={$data['mk']}&id_lab={$data['id_lab']}&id_waktu={$data['id_waktu']}'>
                                                <button class='btn btn-outline-light'>
                                                    Edit
                                                </button>
                                            </a>
                                            <a href='hapusjadwal.php?id_jadwal={$data['id_jadwal']}'>
                                                <button class='btn btn-outline-danger ms-2'>
                                                    Delete
                                                </button>
                                            </a>  
                                        </div>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col text-center tabelab2">
                <h1 class="text-center text-light">Input Jadwal Praktikum</h1>
                <hr>
                <p class="text-light mt-2">Buat jadwal praktikum sesuai dengan yang diinginkan</p>
                <div class="form mt-5 d-flex justify-content-center">
                    <form method="POST" action="inputjadwal.php">
                        <div class="d-inline-flex mb-4">
                            <label for="namamk"></label>
                            <input type="text" name="namamk" class="inputmk form-control bg-dark text-light me-4" placeholder="Input Nama MK">
    
                            <input class="form-check-input" type="radio" name="jurusan" id="flexRadioDefault1" value="IF">
                            <label class="form-check-label text-light ms-2" for="flexRadioDefault1">
                                IF
                            </label>
    
    
                            <input class="form-check-input ms-3" type="radio" name="jurusan" id="flexRadioDefault1" value="SI" required>
                            <label class="form-check-label text-light ms-2" for="flexRadioDefault1">
                                SI
                            </label>
                        </div>

                        <select class="form-select mb-4 bg-dark text-light w-100" name="lab" required>
                        <?php
                        // Menampilkan data dalam tabel
                        while ($lab = mysqli_fetch_assoc($querylab)) {
                        echo "<option value='{$lab['id_lab']}'>{$lab['lab']}</option>";
                        }
                        ?>
                        </select>
                        
                        <select class="form-select mb-4 bg-dark text-light w-100" name="waktu" required>
                        <?php
                        // Menampilkan data dalam tabel
                        while ($waktu = mysqli_fetch_assoc($querywaktu)) {
                        echo "<option value='{$waktu['id_waktu']}'>{$waktu['waktu_mulai']}-{$waktu['waktu_selesai']}</option>";
                        }
                        ?>
                        </select>
                        <div class="d-inline-flex w-100">
                            <button class="btn btn-outline-light mt-3 w-50 me-5">Register</button>
                            <button type="reset" value="reset" class="btn btn-outline-light mt-3 w-50">Reset</button>
                        </div>
                            <?php 
                            if(isset($_GET['pesan'])) {
                                if($_GET['pesan'] == 'input') {
                                    echo "<p class='text-success text-center mt-4'>Jadwal berhasil ditambahkan!</p>";
                                }elseif($_GET['pesan'] == 'hapus') {
                                    echo "<p class='text-danger text-center mt-4'>Jadwal berhasil dihapus!</p>";                
                                }elseif($_GET['pesan'] == 'update'){
                                    echo "<p class='text-success text-center mt-4'>Jadwal berhasil diupdate!</p>"; 
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