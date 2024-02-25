<?php 
//Halaman pengelolaan pengembalian Buku Perustakaaan
require "../../config/config.php";
$dataPeminjam = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, member.kelas, member.jurusan, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id")
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../style.css">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Kelola pengembalian buku || admin</title>
  </head>
  <body style="background: url(../../assets/bg07.jpg) center / cover fixed;">
    
    <nav class="navbar fixed-top" >
      <div class="container-fluid" style=" background: black;">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logo2.png" alt="logo" width="100px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardPetugas.php" style=" color: white;">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <div class="mt-5">
    <label style="color:white;">List of pengembalian</label>
      <div class="table-responsive mt-3">
    <table class="table table-striped table-hover">
     <thead class="text-center">
      <tr>
        <th class="bg-success text-light">Id Pengembalian</th>
        <th class="bg-success text-light">Id Buku</th>
        <th class="bg-success text-light">Judul Buku</th>
        <th class="bg-success text-light">Kategori</th>
        <th class="bg-success text-light">Nisn</th>
        <th class="bg-success text-light">Nama Siswa</th>
        <th class="bg-success text-light">Kelas</th>
        <th class="bg-success text-light">Jurusan</th>
        <th class="bg-success text-light">Nama Admin</th>
        <th class="bg-success text-light">Tanggal Pengembalian</th>
        <th class="bg-success text-light">Keterlambatan</th>
        <th class="bg-success text-light">Delete</th>
      </tr>
    </thead>
        <?php foreach ($dataPeminjam as $item) : ?>
      <tr>
        <td><?= $item["id_pengembalian"]; ?></td>
        <td><?= $item["id_buku"]; ?></td>
        <td><?= $item["judul"]; ?></td>
        <td><?= $item["kategori"]; ?></td>
        <td><?= $item["nisn"]; ?></td>
        <td><?= $item["nama"]; ?></td>
        <td><?= $item["kelas"]; ?></td>
        <td><?= $item["jurusan"]; ?></td>
        <td><?= $item["nama_admin"]; ?></td>
        <td><?= $item["buku_kembali"]; ?></td>
        <td><?= $item["keterlambatan"]; ?></td>
        <td>
          <div class="action">
           <a href="deletePengembalian.php?id=<?= $item["id_pengembalian"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?');"><label for="">Hapus</label></a>
           </div>
          </td>
      </tr>
        <?php endforeach; ?>
    </table>
  </div>
 </div>
</div>
    
  <footer class="fixed-bottom shadow-lg bg-subtle p-3" style="color:white;">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Ahmad Fuadi</span> © 2024</p>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>