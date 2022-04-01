<?php

    include '../functions.php';

    if( isset( $_SESSION['name'] ) && isset( $_SESSION['email'] ) ){
        session_unset();
        session_destroy();
        header('Location:../Login/index.php');
        exit;    

    }else{
        header('Location:../Login/index.php');
        exit;
    }

?>