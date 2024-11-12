<?php
session_start();

   if(empty($_SESSION['username']))
{
    header("location:../../index.php?pesan=belum_login");
}

include '../../config/connect.php';

$query = mysqli_query($cn, "SELECT id_lab, lab FROM lab");

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
                    <a class="nav-link" href="#">Lab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../waktu/waktu.php">Waktu</a>
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
                                <th>Lab</th>
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
                            echo "<td>{$data['lab']}</td>";
                            echo "<td> 
                                    <a href='hapuslab.php?id_lab={$data['id_lab']}'>
                                        <button class='btn btn-outline-danger btn-sm'>
                                            <span class='material-symbols-outlined'></span>Delete
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
                <h1 class="text-center text-light">Input Lab</h1>
                <hr>
                <p class="text-light mt-2">Masukkan Ruangan Lab yang Tersedia</p>
                <div class="form mt-5 d-flex justify-content-center">
                    <form method="POST" action="inputlab.php">
                        <label for="namaLab"></label>
                        <input type="text" name="namaLab" class="inputlab form-control bg-dark text-light w-25 " placeholder="Input Nama Lab">
                        <button class="btn btn-outline-light mt-5 w-100">Register</button>
                        <?php 
                        if(isset($_GET['pesan'])) {
                            if($_GET['pesan'] == 'input') {
                                echo "<p class='text-success text-center mt-4'>Lab berhasil ditambahkan!</p>";
                            }elseif($_GET['pesan'] == 'hapus') {
                                echo "<p class='text-danger text-center mt-4'>Lab berhasil dihapus!</p>";                
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