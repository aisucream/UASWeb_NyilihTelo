<?php
    

$koneksi = mysqli_connect('localhost', 'root', '', 'uji_coba');

if(mysqli_connect_errno()){
    echo "Failed to connect to mysql : " . mysqli_connect_error();
    exit();
}

if(isset($_POST['button']) == true){

    $user = $_POST['data1'];
    $barang = $_POST['data2'];
    $pinjam = $_POST['data3'];
    $kembali = $_POST['data4'];
    $stok = $_POST['data5'];

    $q1 = mysqli_query($koneksi, "SELECT id_user FROM user WHERE nama = '$user'");
    $r1 = mysqli_fetch_assoc($q1);

    $q2 = mysqli_query($koneksi, "SELECT id_barang FROM barang WHERE nama = '$barang'");
    $r2 = mysqli_fetch_assoc($q2);

    $q3 = mysqli_query($koneksi, "SELECT stok FROM barang WHERE nama = '$barang'");
    $r3 = mysqli_fetch_assoc($q3);

    if($r3['stok'] < $stok){
        echo "Error";
    }else{
        mysqli_query($koneksi, "INSERT INTO transaksi VALUE ('', '$pinjam', '$kembali', '$stok', '$r1[id_user]', '$r2[id_barang]' )");
        echo "Berhasil";
    }

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        
        <label for="data1">Nama User</label>
        <input type="text" name='data1' id="data1" value="obaja">
        <br>
        <label for="data2">Nama Barang</label>
        <input type="text" name="data2" id="data2" value="Kamera">
        <br>
        <label for="data3">Tanggal Pinjam</label>
        <input type="date" name="data3" id="data3">
        <br>
        <label for="data4">Tanggal Kembali</label>
        <input type="date" name="data4" id="data4">
        <br>
        <label for="data5">Banyak Barang</label>
        <input type="number" name="data5" id="data5">
        <br>
        <button type="submit" name="button">button</button>
    </form>
</body>
</html>