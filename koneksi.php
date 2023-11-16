<?php
    $conn = mysqli_connect("localhost", "root", "","thrift_store");

    if(!$conn){
        die("Website Gagal Terhubung Ke Database" . mysqli_connect_error());
    }
?>