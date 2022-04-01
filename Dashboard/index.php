<?php
    
    include '../functions.php';

    if( isset( $_SESSION['name'] ) && isset( $_SESSION['email'] ) ){
        header('Location:user_dashboard.php');
        exit;
    }else{
        header('Location:../Login/index.php');
        exit;
    }
?>