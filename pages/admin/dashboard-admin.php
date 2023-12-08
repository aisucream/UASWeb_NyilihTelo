<?php

session_start();

require('../../connections/connection.php');

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

if(isset($_SESSION["login"])){
  $user = $_SESSION['user'];
  $q = mysqli_query($conn, "SELECT * FROM user WHERE no_induk = $user");
  $data = mysqli_fetch_array($q);
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
    <link rel="stylesheet" href="../../assets/dist/css/dashboard/dashboard.css" />
    <!-- ---- -->

    <!-- Logo -->
    <link rel="icon" type="png" href="../../assets/images/landing page/logo.png" />
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
            <img src="../../assets/images/landing page/logo.png" alt="logo" />
            <h2>NYILIH <span>TE-LO</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-round"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="dashboard-admin.php" class="active">
            <span class="material-icons-round"> space_dashboard </span>
            <h3>Dashboard</h3>
          </a>

          <a href="asset-admin.php">
            <span class="material-icons-round"> inventory_2 </span>
            <h3>Data Asset</h3>
          </a>

          <a href="request-admin.php">
            <span class="material-icons-round"> checklist </span>
            <h3>Validasi Peminjaman</h3>
          </a>

          <a href="monitoring-admin.php">
            <span class="material-icons-round"> display_settings </span>
            <h3>Monitoring Peminjaman</h3>
          </a>

          <a href="../../controllers/logout.php">
            <span class="material-icons-round"> logout </span>
            <h3>Log-out</h3>
          </a>
        </div>
      </aside>
      <!-- === Sidebar End === -->
      <!-- === Main Section === -->
      <main>
        <div class="navbar">
          <h1>Dashboard</h1>
        </div>
        <!-- end of navbar -->

        <div class="row-1">
          <div class="hero">
            <div class="illustration">
              <img
                src="../../assets/images/admin/admin-illusi.png"
                alt="illustration-1"
              />
            </div>
            <div class="label">
              <h2>Hai, <?php echo $data['username'] ?></h2>
              <p class="text-muted">Bagaimana Hari ini?</p>
            </div>
          </div>
          <!-- end of hero -->

          <div class="information">
            <h2>Detail Login</h2>
            <div class="info-container">
              <div class="username">
                <h4>username</h4>
                <p><?php echo $data['no_induk'] ?></p>
              </div>
              <div class="status">
                <h4>Status</h4>
                <p>ADMIN</p>
              </div>
            </div>
          </div>
          <!-- end of information -->
        </div>
        <!-- end of row-1 -->

        <div class="row-1">
          <div class="card">
            <img
              src="../../assets/images/admin/card1.png"
              alt="box available"
              class="available-img"
            />

            <div class="label-card">
              <div class="header-card">
                <?php 
                $q2 = mysqli_query($conn,"SELECT * FROM user WHERE status = 'sudah pinjam' AND level = 'mahasiswa'");
                $dat = mysqli_num_rows($q2);

                echo "<h1>$dat</h1>"

                ?>
                <p>User sedang meminjam barang</p>
              </div>
              <div class="button-card">
                <a href="monitoring-admin.php"><button class="btn-crd">selengkapnya</button></a>
              </div>
            </div>
          </div>

          <div class="card">
            <img
              src="../../assets/images/admin/card2.png"
              alt="box loan"
              class="loan-img"
            />
            <div class="label-card">
              <div class="header-card">
                <?php

                $q3 = mysqli_query($conn,"SELECT * FROM user WHERE status = 'menunggu validasi' AND level = 'mahasiswa'");
                $dat2 = mysqli_num_rows($q3);

                echo "<h1>$dat2</h1>"
                

                ?>
                <p>User masih belum divalidasi</p>
              </div>
              <div class="button-card">
                <a href="request-admin.php"><button class="btn-crd">selengkapnya</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- end of row-2 -->

        <div class="row-1">
          <div class="card">
            <img
              src="../../assets/images/dashboard/Tersedia.png"
              alt="box available"
              class="available-img"
            />

            <div class="label-card">
              <div class="header-card">
                <?php 
                $q2 = mysqli_query($conn,'SELECT * FROM barang');
                while($r = mysqli_fetch_assoc($q2)){
                  $stok[] = $r['stok'];
                }

                $total_stok = array_sum($stok);
                echo "<h1>$total_stok</h1>"
                
                ?>
                <p>Asset masih tersedia</p>
              </div>
              <div class="button-card">
                <a href="asset-admin.php"><button class="btn-crd">selengkapnya</button></a>
              </div>
            </div>
          </div>

          <div class="card">
            <img
              src="../../assets/images/dashboard/ruangsn-ill.png"
              alt="box loan"
              class="loan-img"
            />
            <div class="label-card">
              <div class="header-card">
                <?php
                $q3 = mysqli_query($conn, 'SELECT * FROM ruangan');
                $banyakruangan = mysqli_num_rows($q3);

                echo "<h1>$banyakruangan</h1>"
                
                
                ?>
                <p>Ruangan Tersedia</p>
              </div>
              <div class="button-card">
                <a href="asset-admin.php"><button class="btn-crd">selengkapnya</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- end of row-2 -->

        <footer>
          <p>Copyright nyilih te-lo ©2023</p>
          <p>Version BETA 0.1</p>
        </footer>
      </main>
    </div>
  </body>
</html>