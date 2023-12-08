<?php
require("../connections/connection.php");
$id = $_GET['id'];

function hapus($parameter){
    global $conn;
    mysqli_query($conn, "DELETE FROM pjbarang WHERE id_pinjamB = $parameter");
}


if(hapus($id) > 0){

    echo "
    
    <script>
                                            
    alert('asset gagal dihapus!');
    document.location.href = '../pages/riwayat.php'

    </script>
    
    ";

}else{


    echo "
    
    <script>
                                            
    alert('asset berhasil dihapus!');
    document.location.href = '../pages/riwayat.php'

    </script>
    
    ";

}
?>