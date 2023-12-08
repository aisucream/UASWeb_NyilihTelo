<?php

session_start();

require('../connections/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    function update($parameter)
    {
        
        global $conn;
        $update_pinjam_barang_query = "UPDATE pjbarang SET status='selesai' WHERE id_user=$parameter";
        $update_pinjam_ruangan_query = "UPDATE pjruang SET status='selesai' WHERE id_user=$parameter";

        mysqli_query($conn, $update_pinjam_barang_query);
        mysqli_query($conn, $update_pinjam_ruangan_query);

    }
    if (update($id) > 0) {

        echo "
    
    <script>
                                            
    alert('asset gagal diupdate!');
    document.location.href = '../pages/admin/asset-ruangan-admin.php'

    </script>
    
    ";

    } else {


        echo "
    
    <script>
                                            
    alert('asset berhasil diupdate!');
    document.location.href = '../pages/admin/asset-ruangan-admin.php'

    </script>
    
    ";

    }
}





?>