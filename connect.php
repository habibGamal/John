<?php

    // $dsn = 'mysql:host=localhost;dbname=john';
    // $username = 'root';
    // $password = '';
    $db = parse_url(getenv("DATABASE_URL"));
    try {
        // $connect = new PDO($dsn , $username ,$password);
        // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect = new PDO("pgsql:" . sprintf(
            "host=%s;port=%s;user=%s;password=%s;dbname=%s",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExeception $e){
        echo 'Connection Error here' . $e->getMessage();
    }

?>