<?php
    //Constants
    /* define ('DB_HOST', 'localhost');
    define ('DB_USER', 'main_user');
    define ('DB_PASS', '123456');
    define ('DB_NAME', 'php_dev'); */

    define ('DB_HOST', 'db4free.net');
    define ('DB_USER', 'richard_mgmt');
    define ('DB_PASS', 'kpUN3zabb9U2BwH');
    define ('DB_NAME', 'personal_data');
    define ('DB_PORT', '3306');
    //Connect
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,DB_PORT);

    //Check Connection
    if($conn -> connect_error){
        echo 'Conection failed' . $conn -> connect_error;
    }