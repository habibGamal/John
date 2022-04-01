<?php 
    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( isset( $_SESSION['name'] ) || isset( $_SESSION['email'] ) ){
        header('Location:../Dashboard/index.php');
        exit;
    }
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $email = $_GET['email'];
        $number = $_GET['number'];
        $person_reset = new person();
        $check = $person_reset->check_reset($email,$number);
        if($check['process'] == true){
            // change password
            $_SESSION['reset'] = ["state"=>"on","email"=>$email];
            header('Location:change.php');
            exit;
        }else{
            header('Location:../Front_end/index.php');
            exit;
        }
    }

    
?>


        
<?php include TEMPLATE.'footer.php';?>