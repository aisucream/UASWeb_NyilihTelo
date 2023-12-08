<?php 
session_start();

require('../../connections/connection.php');

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

$q = mysqli_query($conn, "SELECT * FROM ruangan");
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
    <link rel="stylesheet" href="../../assets/dist/css/admin/ast-admin.css" />
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
           <a href="dashboard-admin.php">
            <span class="material-icons-round"> space_dashboard </span>
            <h3>Dashboard</h3>
          </a>

          <a href="asset-admin.php" class="active">
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
          <h1>Data Asset</h1>
        </div>
        <!-- end of navbar -->
        <div class="row-1">
          <div class="button">
            <a href="asset-admin.php">Barang</a>
            <a href="asset-ruangan-admin.php">Ruangan</a>
          </div>
        </div>

        <!-- === === = Table = === === -->
        <div class="row-1">
          <div class="room-order">
            <div class="header-room">
              <h2>Asset Ruangan</h2>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Ruangan</th>
                  <th>Status</th>
                  <th>Jenis Ruangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              mysqli_data_seek($q, 0);
                while($tampil=mysqli_fetch_array($q)){

                  if($tampil["status"]=="Tersedia"){
                    echo "
                      <tr>
                        <td>$tampil[ruangan]</td>
                        <td class=succes-color>$tampil[status]</td>
                        <td>$tampil[jenis_ruangan]</td>
                        <td class=table-button>     
                        <a href=../../controllers/update.php?id=$tampil[id_ruangan] class=icon-button>
                            <span class=material-icons-round>
                                do_not_disturb_on
                            </span>
                        </a>          
                        </td>
                      </tr>
                    ";
                  }else{
                    echo "
                      <tr>
                        <td>$tampil[ruangan]</td>
                        <td class=third-color>$tampil[status]</td>
                        <td>$tampil[jenis_ruangan]</td>
                        <td class=table-button>     
                        <a href=../../controllers/update2.php?id=$tampil[id_ruangan] class=icon-button>
                            <span class=material-icons-round>
                                check_circle
                            </span>
                        </a>                 
                        </td>
                      </tr>
                    ";
                  }
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
