<?php

$conn = mysqli_connect('localhost', 'root', '', 'nyilih');

if(mysqli_connect_errno()){
    echo "Failed to connect to mysql : " . mysqli_connect_error();
    exit();
}

?>