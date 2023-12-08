<?php 
session_start();

require('../../connections/connection.php');

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $q = mysqli_query($conn, "SELECT 
                  barang.nama_barang, pjbarang.tgl_pinjam, pjbarang.tgl_kembali, pjbarang.banyak_barang, pjbarang.kebutuhan, pjbarang.status
                  FROM pjbarang JOIN barang ON pjbarang.id_barang = barang.id_barang WHERE id_user = $id");

  $q2 = mysqli_query($conn, "SELECT 
                  ruangan.ruangan, pjruang.tgl_pinjam, pjruang.tgl_kembali, pjruang.kebutuhan, pjruang.partisipan, pjruang.status
                  FROM pjruang JOIN ruangan ON pjruang.id_ruang = ruangan.id_ruangan WHERE id_user = $id ");

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Icon CSS -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
      rel="stylesheet"
    />
    <!-- -------- -->

    <!-- CSS Native -->
    <link rel="stylesheet" href="../../assets/dist/css/admin/file-v-admin.css" />
    <!-- ---- -->

    <!-- Logo -->
    <link rel="icon" type="png" href="../assets/images/landing page/logo.png" />
    <!-- ---- -->

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap"
      rel="stylesheet"
    />
    <!-- ---- -->

    <title>Admin | Nyilih Te-Lo</title>
  </head>
  <body>
    <div class="container">
      <main>
        <!-- === === = Table = === === -->
        <div class="row-1">
          <div class="room-order">
            <div class="header-room">
              <a href="request-admin.php">
              <span class="material-icons-round"> chevron_left </span>Kembali</a >
              <h2>Validasi Peminjaman</h2>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                </tr>
              </thead>
              <tbody>
              <?php
                mysqli_data_seek($q, 0);
                while($data=mysqli_fetch_assoc($q)){
                  echo "
                    <tr>
                      <td>$data[nama_barang]</td>
                      <td>$data[banyak_barang]</td>
                      <td>$data[tgl_pinjam]</td>
                      <td>$data[tgl_kembali]</td>
                    </tr>
                    ";   
                }
                ?>
              </tbody>
            </table>
            
          </div>
        </div>

         <!-- === === = Table = === === -->
        <div class="row-1">
          <div class="room-order">
            <table>
              <thead>
                <tr>
                  <th>Ruangan</th>
                  <th>Partisipan</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                </tr>
              </thead>
              <tbody>
              <?php
                mysqli_data_seek($q, 0);
                while($data2=mysqli_fetch_assoc($q2)){
                  echo "
                    <tr>
                      <td>$data2[ruangan]</td>
                      <td>$data2[partisipan]</td>
                      <td>$data2[tgl_pinjam]</td>
                      <td>$data2[tgl_kembali]</td>
                    </tr>
                    ";   
                }
                ?>
              </tbody>
            </table>
            
          </div>
        </div>

        <div class="row-1 acc">
          <?php
          if (isset($_GET['id'])) {
          $id = $_GET['id'];
            echo "<a href=../../controllers/acc.php?id=$id class=siap > ACC </a>";
          }
          ?>

        </div>
      </main>
    </div>

    <script src="../assets/src/Jquery/jquery.js"></script>
  </body>
</html>
