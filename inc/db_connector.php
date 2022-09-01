<?php
    
    $db_host = 'localhost';
    $db_user = 'gb';
    $db_pass = 'pass';
    $db_name = 'globe_bank';
    $db_port = '';
    $db_db_socket = '';

    $sql = new mysqli();
    $connection = $sql->connect($db_host, $db_user, $db_pass, $db_name, $db_port, $db_socket);
    //$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


    $sql->close();
?>