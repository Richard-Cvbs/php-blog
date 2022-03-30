<?php
    //Constants
    define ('DB_HOST', 'localhost');
    define ('DB_USER', 'main_user');
    define ('DB_PASS', '123456');
    define ('DB_NAME', 'php_dev');
    //Connect
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check Connection
    if($conn -> connect_error){
        echo 'Conection failed' . $conn -> connect_error;
    }