
<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "registrationdb";
    // $connect = "";

    $connect = mysqli_connect($db_server, $db_user, $db_password, $db_name );

    if(!$connect){
        echo "Please check the connection";
    }


?>