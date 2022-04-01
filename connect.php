<?php

    $dsn = 'mysql:host=localhost;dbname=john';
    $username = 'root';
    $password = '';

    try {
        $connect = new PDO($dsn , $username ,$password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExeception $e){
        echo 'Connection Error here' . $e->getMessage();
    }

?>