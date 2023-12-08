<?php
require('../connections/connection.php');
$id = $_GET['id'];

function update($parameter){
    global $conn;
    mysqli_query($conn, "UPDATE ruangan SET status = 'Tersedia' WHERE id_ruangan = $parameter ");
}

if(update($id) > 0){

    echo "
    
    <script>
                                            
    alert('asset gagal diupdate!');
    document.location.href = '../pages/admin/asset-ruangan-admin.php'

    </script>
    
    ";

}else{


    echo "
    
    <script>
                                            
    alert('asset berhasil diupdate!');
    document.location.href = '../pages/admin/asset-ruangan-admin.php'

    </script>
    
    ";

}

?>