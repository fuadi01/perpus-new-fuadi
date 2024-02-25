<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";
$akunMember = $_SESSION["member"]["nisn"];
$dataPengembalian = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id
WHERE pengembalian.nisn = $akunMember");

if(isset($_POST["search"]) ) {
  $dataPengembalian = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../style.css">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>History Peminjaman Buku || Member</title>
     <link rel="icon" href="../../assets/logoh.png" type="image/png">
</head>
  </head>
  <body style="background: url(../../assets/bg07.jpg) center / cover fixed; ">
    <nav class="navbar fixed-top ">
      <div class="container-fluid" style="background-color: black;">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo2.png" alt="logo" width="100px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardMember.php" style="color: white;">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <div class="mt-5 alert alert-primary" role="alert">History Peminjaman Buku Anda<span class="fw-bold text-capitalize"></span></div>
    <!--search engine 
     <form action="" method="post">
       <div class="searchEngine">
         <input type="text" name="keyword" id="keyword" placeholder="cari judul atau id buku...">
         <button type="submit" name="search">Search</button>
       </div>
      </form> -->
      
    <div class="table-responsive mt-3">
    <table class="table table-striped table-hover">
      <thead class="text-center">
      <tr>
        <th class="bg-success text-light">Id Buku</th>
        <th class="bg-success text-light">Judul Buku</th>
        <th class="bg-success text-light">Kategori</th>
        <th class="bg-success text-light">Nisn</th>
        <th class="bg-success text-light">Nama</th>
        <th class="bg-success text-light">Nama Admin</th>
      

    
      </tr>
      </thead>
        <?php foreach ($dataPengembalian as $item) : ?>
      <tr>
        <td><?= $item["id_buku"]; ?></td>
        <td><?= $item["judul"]; ?></td>
        <td><?= $item["kategori"]; ?></td>
        <td><?= $item["nisn"]; ?></td>
        <td><?= $item["nama"]; ?></td>
        <td><?= $item["nama_admin"]; ?></td>

      </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <footer class="fixed-bottom shadow-lg bg-subtle p-3" style="color:white;">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Ahmad Fuadi</span> © 2024</p>
      </div>
    </footer>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>