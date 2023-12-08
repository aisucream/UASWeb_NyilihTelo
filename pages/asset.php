<?php 
session_start();

require('../connections/connection.php');

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

$q = mysqli_query($conn, "SELECT * FROM barang");
$data = mysqli_fetch_array($q)

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
    <link rel="stylesheet" href="../assets/dist/css/dashboard/asset.css" />
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

    <title>Dashboard | Nyilih Te-Lo</title>
  </head>
  <body>
    <div class="container">
      <!-- === Sidebar Section === -->
      <aside>
        <div class="top">
          <div class="logo">
            <img src="../assets/images/landing page/logo.png" alt="logo" />
            <h2>NYILIH <span>TE-LO</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-round"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="index.php">
            <span class="material-icons-round"> space_dashboard </span>
            <h3>Dashboard</h3>
          </a>

          <a href="asset.php" class="active">
            <span class="material-icons-round"> inventory_2 </span>
            <h3>Data Asset</h3>
          </a>

          <a href="transaksi.php">
            <span class="material-icons-round"> format_list_bulleted </span>
            <h3>Transaksi</h3>
          </a>

          <a href="riwayat.php">
            <span class="material-icons-round"> history </span>
            <h3>Riwayat Transaksi</h3>
          </a>
          
          <a href="../controllers/logout.php">
            <span class="material-icons-round"> logout </span>
            <h3>Log-out</h3>
          </a>
        </div>
      </aside>
      <!-- === Sidebar End === -->
      <!-- === Main Section === -->
      <main>
        <div class="navbar">
          <h1>Data Asset</h1>
        </div>
        <!-- end of navbar -->
        <div class="row-1">
          <div class="button">
            <a href="asset.php">Barang</a>
            <a href="assetRuang.php">Ruangan</a>
          </div>

        </div>

        <!-- === === = Table = === === -->
        <div class="row-1">
          <div class="room-order">
            <div class="header-room">
              <h2>Asset Barang</h2>
              <a href="https://docs.google.com/document/d/1CaZLknv1WBzGx6liGha3THWhYqWJ6hGB/edit?usp=sharing&ouid=104689029548192254028&rtpof=true&sd=true">
              <span class="material-icons-round">download</span>  
              <span>Download Berkas</span>
              </a>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Jumlah Barag</th>
                  <th>Pinjam</th>
                </tr>
              </thead>
              <tbody>
              <?php
                mysqli_data_seek($q, 0);
                while($data=mysqli_fetch_assoc($q)){
                  echo "
                    <tr>
                      <td>$data[nama_barang]</td>
                      <td>$data[stok]</td>
                      <td>
                        <form action=./stack/formpinjam.php method=post class=button-pinjam>
                          <input type=hidden name=id value=$data[id_barang]>
                          <input type=submit class=btn-submit name=pinjam value=Pinjam>
                        </form>
                      </td>
                    </tr>
                    ";   
                }
                ?>
              </tbody>
            </table>
            
          </div>
        </div>
      </main>
    </div>

    <script src="../assets/src/Jquery/jquery.js"></script>
  </body>
</html>
