<?php

session_start();

$nik = $_SESSION['nik'];
$db = new PDO("mysql:host=localhost;dbname=ppm","root","");
$query = $db->query("SELECT * FROM `pengaduan` WHERE nik=$nik");
$data = $query->fetchAll();

if(!isset($_SESSION['username'])){
    header("location:flogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home asyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
   
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto  px-sm-2 px-0 " style="background-color:#3A4F7A;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4 d-none d-sm-inline">MASYARAKAT</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" style="padding-left: 20%;" id="menu">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link align-middle px-0">
                        <ion-icon name="home" class="fs-2 text-light" style="padding-left: 25px;"></ion-icon> <br><span class="ms-1 d-none d-sm-inline text-light"style="padding-left: 15px;">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="fpengaduan.php" class="nav-link align-middle px-0">
                        <ion-icon name="create" class="fs-2 text-light" style="padding-left: 25px;"></ion-icon><br> <span class="ms-1 d-none d-sm-inline text-light">Isi Laporan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link align-middle px-0" class="nav-link text-dark" href="logout.php"onclick="return confirm('anda yakin ingin keluar')">
                        <ion-icon name="log-out" class="fs-2 text-light" style="padding-left: 25px;"></ion-icon><br><span class="ms-1 d-none d-sm-inline text-light"style="padding-left: 10px;">Logout</span>
                        </a>
                    </li>
                    
                </ul>
                <hr>
                
            </div>
        </div>
        <div class="col mt-3">
            <div class="container mt-4" style="margin-left:0px;">
                <div class="">
                    <h1><ion-icon name="analytics"></ion-icon>&nbsp;Data Laporan</h1>
                </div>
    <table class="table table-striped table-responsive table-light table-hover mt-4 text-center">
  <thead class="table-primary">
    <tr>
    <th scope="col">No</th>
      <th scope="col" style="width:10%;">Tanggal</th>
      <th scope="col">Nik</th>
      <th scope="col" style="width:30%;">Isi Laporan</th>
      <th scope="col">Foto</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
        <?php
        $no=1;
     foreach ($data as $data) : ?>
  <tbody>
    <tr>
    <td><?php echo $no;$no++;?></td>
    <td><?php echo $data['tgl_pengaduan']; ?></td>
    <td><?php echo $data['nik']; ?></td>
    <td style="text-align:justify;"><?php echo $data['isi_laporan']; ?></td>
    <td><img src="img/<?php echo $data['foto']; ?>" width="100px" height="100px" style="border-radius: 10px;"/></td>
    <td><?php echo $data['status']; ?></td>
    <td>
    <a href="fupdate.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="btn btn-success mb-3 rounded"><ion-icon name="create" class="fs-5"></ion-icon></a>&nbsp;
    <a href="delete.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="btn btn-danger mb-3 rounded"><ion-icon name="trash-bin" class="fs-5"></ion-icon></a>
    </td>
    <td>
    <a href="detail.php?id_pengaduan=<?= $data['id_pengaduan']; ?>" class="btn btn-danger mb-3 rounded"><ion-icon name="information-circle-outline" class="fs-5"></ion-icon></a>
    </td>
    </tr>
  </tbody>
  <?php endforeach ?>
</table>
  </tbody>
</table>
</div>
        </div>
    </div>
</div>
</body>
</html>