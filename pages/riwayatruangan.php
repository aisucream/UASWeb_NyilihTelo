<?php
session_start();

require('../connections/connection.php');

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$q = mysqli_query($conn, "SELECT 
                  ruangan.ruangan, pjruang.tgl_pinjam, pjruang.tgl_kembali, pjruang.kebutuhan, pjruang.partisipan, pjruang.status
                  FROM pjruang JOIN ruangan ON pjruang.id_ruang = ruangan.id_ruangan ");
$data = mysqli_fetch_array($q);
 
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
  <link rel="stylesheet" href="../assets/dist/css/dashboard/riwayat.css" />
  <!-- ---- -->

  <!-- Logo -->
  <link rel="icon" type="png" href="../assets/images/landing page/logo.png" />
  <!-- ---- -->

  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap"
    rel="stylesheet" />
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

        <a href="asset.php">
          <span class="material-icons-round"> inventory_2 </span>
          <h3>Data Asset</h3>
        </a>

        <a href="transaksi.php" >
          <span class="material-icons-round"> format_list_bulleted </span>
          <h3>Transaksi</h3>
        </a>

        <a href="riwayat.php" class="active">
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
        <h1>Riwayat Transaksi Peminjaman Ruangan</h1>
      </div>
      <!-- end of navbar -->

      <!-- === === = Table = === === -->
      <div class="row-1">
        <div class="room-order">
          <div class="header-room">
            <a href="riwayat.php">Transaksi Barang</a>
            <a href="riwayatruangan.php">Transaksi Ruangan</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>Nama ruang</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Kebutuhan</th>
                <th>Jumlah Partisipan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              mysqli_data_seek($q, 0);
              while ($data1 = mysqli_fetch_assoc($q)) {
                if ($data1['status'] === 'selesai') {
                  echo "
                      <tr>
                        <td>$data1[ruangan]</td>
                        <td>$data1[tgl_pinjam]</td>
                        <td>$data1[tgl_kembali]</td>
                        <td>$data1[kebutuhan]</td>
                        <td>$data1[partisipan]</td>
                        <td>
                        <button>
                            <span class=material-icons-round>
                                delete
                            </span>
                        </button>
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