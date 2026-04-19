<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";
    $port = 3306;
    mysqli_report(MYSQLI_REPORT_ERROR);
    $connection = mysqli_connect($servername, $username, $password, $database, $port);
    if (!$connection){
        die("Connection failed!" . mysqli_connect_error());
    }
    // echo "Connection was successful.<br>";

?>
