<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$dsn = 'mysql:host='+$cleardb_url["host"]+';dbname='+$cleardb_db;
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];

try {
    $connect = new PDO($dsn , $username ,$password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeception $e) {
    echo 'Connection Error here' . $e->getMessage();
}