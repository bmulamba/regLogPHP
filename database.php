<?php

    $host_server = "localhost";
    $host_name = "root";
    $host_password = "";
    $hostdb_name = "registrationdb";

    $conn = mysqli_connect($host_server, $host_name, $host_password, $hostdb_name );

    if($conn){
        echo "You are connected";
    } else {
        echo "You can't connect";
    }
?>