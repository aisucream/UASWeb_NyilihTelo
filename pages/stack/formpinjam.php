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

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = "SELECT * FROM barang WHERE id_barang = $id";
  $result = mysqli_query($conn, $query);
  $databarang = mysqli_fetch_array($result);
}

if (isset($_POST['tombol_pinjam'])) {

  $barang = $_POST['namaBarang'];
  $user = $_POST['nomorinduk'];
  $pinjam = $_POST['tanggalPinjam'];
  $kembali = $_POST['tanggalKembali'];
  $kebutuhan = $_POST['kebutuhan'];
  $stok = $_POST['jumlahBarang'];

  $q1 = mysqli_query($conn, "SELECT id_user FROM user WHERE no_induk = '$user'");
  $r1 = mysqli_fetch_assoc($q1);

  $q2 = mysqli_query($conn, "SELECT id_barang FROM barang WHERE nama_barang = '$barang'");
  $r2 = mysqli_fetch_assoc($q2);

  $q3 = mysqli_query($conn, "SELECT stok FROM barang WHERE nama_barang = '$barang'");
  $r3 = mysqli_fetch_assoc($q3);

  $q4 = mysqli_query($conn, "SELECT status FROM user WHERE no_induk = '$user'");
  $r4 = mysqli_fetch_assoc($q4);

  if ($r3['stok'] < $stok) {

      echo " 
                    
                        <script>
                                            
                        alert('stok untuk barang yang diinginkan kurang');
                        document.location.href = '../transaksi.php'

                        </script>
                    
                    ";

    } else {
      mysqli_query($conn, "INSERT INTO pjbarang VALUE ('','$pinjam', '$kembali', '$stok','$kebutuhan','diproses', '$r1[id_user]', '$r2[id_barang]' )");
      header('location: ../transaksi.php');
    }
  
}                          

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Icon CSS -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <!-- -------- -->

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- ---- -->

    <!-- CSS Native -->
    <link rel="stylesheet" href="../../assets/dist/css/form.css">
    <!-- ---- -->

    <!-- Logo -->
    <link rel="icon" type="png" href="assets/images/landing page/logo.png" />
    <!-- ---- -->

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,700;1,600&display=swap"
      rel="stylesheet"
    />
    <!-- ---- -->

    <title>Login | Nyilih Te-Lo</title>
  </head>

  <body>
    <div class="global-container">
      <div class="card formulir">
        <div class="body">
          <a href="../asset.php">
            <span class="material-symbols-rounded"> chevron_left </span></a
          >
          <h3>Form Peminjaman</h3>
        </div>

        <div class="form">
          <form action="" method="post">
            <div class="form-container">
               <div class="mt-3 mb-3">
              <div class="mb-3">
                <label for="namaPeminjam" class="form-label"
                  >Nama Peminjam</label
                >
                <input
                  type="text"
                  name="namaPeminjam"
                  class="form-control"
                  id="namaPeminjam"
                  value="<?= $data['username'] ?>"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="programstudi" class="form-label"
                  >Program Studi</label
                >
                <input
                  type="text"
                  name="programstudi"
                  class="form-control"
                  id="programstudi"
                  value="<?= $data['prodi'] ?>"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="nomorinduk" class="form-label">Nomor Induk</label>
                <input
                  type="text"
                  name="nomorinduk"
                  class="form-control"
                  id="nomorinduk"
                  value="<?= $data['no_induk'] ?>"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="namaBarang" class="form-label">Nama Barang</label>
                <input
                  type="text"
                  name="namaBarang"
                  class="form-control"
                  id="namaBarang"
                  value="<?= $databarang['nama_barang'] ?>"
                  readonly
                />
              </div>
            </div>

            <div class="mt-3 mb-3">
              <div class="mb-3 drop">
                <label for="kebutuhan" class="form-label">Kebutuhan</label>
                <select name="kebutuhan" id="kebutuhan" required>
                  <option value="ormawa">Organisasi</option>
                  <option value="riset">Riset</option>
                  <option value="kepanitiaan">Kepanitiaan</option>
                </select>
              </div>

              <div class="mb-3 mt-3">
                <label for="tanggalPinjam" class="form-label"
                  >Tanggal Pinjam</label
                >
                <input
                  type="date"
                  name="tanggalPinjam"
                  class="form-control"
                  id="tanggalPinjam"
                  required
                />
              </div>

              <div class="mb-3 mt-3">
                <label for="tanggalKembali" class="form-label"
                  >Tanggal Kembali</label
                >
                <input
                  type="date"
                  name="tanggalKembali"
                  class="form-control"
                  id="tanggalKembali"
                  required
                />
              </div>

              <div class="mb-3 mt-3">
                <label for="jumlahBarang" class="form-label"
                  >Jumlah Barang</label
                >
                <input
                  type="number"
                  name="jumlahBarang"
                  class="form-control"
                  id="jumlahBarang"
                  required
                />
              </div>
            </div>
            </div>
           
              <button type="submit" class="button-submit" name="tombol_pinjam">
                Pinjam Barang
              </button>
          </form>
        </div>
      </div>
    </div>

    <!-- JS Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <!-- ----------- -->
  </body>
</html>
