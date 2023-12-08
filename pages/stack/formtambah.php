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

if (isset($_POST['tombol_pinjam'])) {

    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlahBarang'];

    $result = mysqli_query($conn, "SELECT * FROM barang WHERE nama_barang = '$barang'");

    if(mysqli_num_rows($result) > 0){
    echo " 
    <script>
        alert('Barang sudah terdaftar');
        document.location.href = '../admin/asset-admin.php'
    </script>";
    }else{
        mysqli_query($conn, "INSERT INTO barang VALUE ('', '$barang', '$jumlah')");
        header('location: ../admin/asset-admin.php');
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
          <a href="../admin/asset-admin.php">
            <span class="material-symbols-rounded"> chevron_left </span></a
          >
          <h3>Tambah Barang</h3>
        </div>

        <div class="form">
          <form action="" method="post">
            <div class="form-container">
            <div class="mt-3 mb-3">
              <div class="mb-3">
                <label for="barang" class="form-label"
                  >Nama Barang</label
                >
                <input
                  type="text"
                  name="barang"
                  class="form-control"
                  id="barang"
                  placeholder="Masukan Barang..."
                  required
                />
              </div>
            </div>

            <div class="mt-3 mb-3">
              <div class="mb-3">

                <label for="jumlahBarang" class="form-label"
                  >Jumlah Barang</label
                >
                <input
                  type="number"
                  name="jumlahBarang"
                  class="form-control"
                  id="jumlahBarang"
                  placeholder="Masukan Jumlah Barang"
                  required
                />

            </div>

            </div>
           
              <button type="submit" class="button-submit" name="tombol_pinjam">
                Tambah
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
