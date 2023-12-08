<?php

session_start();

require('../../connections/connection.php');

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

$query = mysqli_query($conn, "SELECT * FROM user");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Icon CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
  <!-- -------- -->

  <!-- CSS Native -->
  <link rel="stylesheet" href="../../assets/dist/css/admin/vld-admin.css" />
  <!-- ---- -->

  <!-- Logo -->
  <link rel="icon" type="png" href="../../assets/images/landing page/logo.png" />
  <!-- ---- -->

  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap" rel="stylesheet" />
  <!-- ---- -->

  <title>Validasi | Nyilih Te-Lo</title>
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

        <a href="asset-admin.php">
          <span class="material-icons-round"> inventory_2 </span>
          <h3>Data Asset</h3>
        </a>

        <a href="request-admin.php" >
          <span class="material-icons-round"> checklist </span>
          <h3>Validasi Peminjaman</h3>
        </a>

        <a href="monitoring-admin.php" class="active">
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
        <h1>Monitoring Peminjaman</h1>
      </div>
      <!-- end of navbar -->

      <!-- === === = Table = === === -->
      <div class="row-1">
        <div class="room-order">
          <div class="header-room">
            <h2>Transaksi Peminjaman</h2>
          </div>
          <table>
            <thead>
              <tr>
                <th>Nama Peminjam</th>
                <th>User ID</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              mysqli_data_seek($query, 0);
              while ($data = mysqli_fetch_assoc($query)) {

                if($data['status'] == 'sudah pinjam'){

                  echo "
                  
                      <tr>
                        <td>$data[username]</td>
                        <td>$data[no_induk]</td>
                        <td>$data[level]</td>
                        <td class=table-button>     
                        <a href=file-monitor-admin.php?id=$data[id_user] class=icon-button>
                            <span class=material-icons-round>
                                description
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
</body>
</html>
