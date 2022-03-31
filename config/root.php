<?php
    //Constants
    /* define ('DB_HOST', 'localhost');
    define ('DB_USER', 'main_user');
    define ('DB_PASS', '123456');
    define ('DB_NAME', 'php_dev'); */

    define ('DB_HOST', $_ENV['DB_HOST']);
    define ('DB_USER', $_ENV['DB_USER']);
    define ('DB_PASS', $_ENV['DB_PASS']);
    define ('DB_NAME', $_ENV['DB_NAME']);
    define ('DB_PORT', $_ENV['DB_PORT']);
    //Connect
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,DB_PORT);

    //Check Connection
    if($conn -> connect_error){
        echo 'Conection failed' . $conn -> connect_error;
    }