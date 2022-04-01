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



    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
?>

        <section class="sign-up">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2 class="display-4">Reset Password</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="sign-form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <input type="email" name="email" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <input type="submit" value="Reset" class="btn btn-custom">
                    </form>
                    <?php 
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $person = new person();
                            if(!empty($_POST['email'])){
                                // If No Empty Fields , Create a Person
                                $person->reset($_POST['email']);
                            }else{
                                print_error($e['empty_fields']);
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
<?php include TEMPLATE.'footer.php';?>