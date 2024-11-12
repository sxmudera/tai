<?php

session_start();
   if(empty($_SESSION['username']))
{
    header("location:../../index.php?pesan=belum_login");
}

include '../../config/connect.php';


$id = $_GET['id_jadwal'];
$idlab = $_GET['id_lab'];
$idwaktu = $_GET['id_waktu'];
$mk = $_GET['mk'];

$data = mysqli_query($cn, "SELECT * FROM jadwal WHERE id_jadwal = $id");

$namalab = mysqli_query($cn, "SELECT * FROM lab WHERE id_lab = $idlab");
$tes = mysqli_fetch_assoc($namalab);

$querylab = mysqli_query($cn, "SELECT id_lab, lab FROM lab");

$inputwaktu = mysqli_query($cn, "SELECT * FROM waktu WHERE id_waktu = $idwaktu");
$tes2 = mysqli_fetch_assoc($inputwaktu);

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

    <div class="container text-center tabeljadwal">
                <h1 class="text-center text-light">Input Jadwal Praktikum</h1>
                <hr>
                <p class="text-light mt-2">Buat jadwal praktikum sesuai dengan yang diinginkan</p>
                <div class="form mt-5 d-flex justify-content-center">
                    <form method="POST" action="updatejadwal.php">
                        <div class="d-inline-flex mb-4">
                            <label for="namaLab"></label>
                            <input type="text" name="pilmk" class="inputmk form-control bg-dark text-light me-4" value="<?php echo $mk; ?>">
    
                            <input class="form-check-input" type="radio" name="jurusan" id="flexRadioDefault1" value="IF">
                            <label class="form-check-label text-light ms-2" for="flexRadioDefault1">
                                IF
                            </label>
    
    
                            <input class="form-check-input ms-3" type="radio" name="jurusan" id="flexRadioDefault1" value="SI" required>
                            <label class="form-check-label text-light ms-2" for="flexRadioDefault1">
                                SI
                            </label>
                        </div>

                        <select class="form-select mb-4 bg-dark text-light w-100" name="pilab" required>
                        <option value = '<?php echo $tes['id_lab'];?>' selected><?php echo $tes['lab'];?></option>" 
                        <?php
                        // Menampilkan data dalam tabel
                        while ($lab = mysqli_fetch_assoc($querylab)) {
                        echo "<option value='{$lab['id_lab']}'>{$lab['lab']}</option>";
                        }
                        ?>
                        </select>
                        
                        <select class="form-select mb-4 bg-dark text-light w-100" name="waktu" required>
                        <option value = '<?php echo $tes2['id_waktu'];?>' selected><?php echo $tes2['waktu_mulai'].'-'.$tes2['waktu_selesai'];?></option>" 
                        <?php
                        // Menampilkan data dalam tabel
                        while ($waktu = mysqli_fetch_assoc($querywaktu)) {
                        echo "<option value='{$waktu['id_waktu']}'>{$waktu['waktu_mulai']}-{$waktu['waktu_selesai']}</option>";
                        }
                        ?>
                        </select>
                        
                        <input type="hidden" name="idjadwal" value="<?php echo $id?>">

                        <div class="d-inline-flex w-100">
                            <button class="btn btn-outline-light mt-3 w-50 me-5">Register</button>
                            <button type="reset" value="reset" class="btn btn-outline-light mt-3 w-50">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>