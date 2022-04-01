<?php 

    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( isset( $_SESSION['name'] ) || isset( $_SESSION['email'] ) ){
        header('Location:../Dashboard/index.php');
        exit;
    }

?>
        <section class="login">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2 class="display-4">Login</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="login-form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                            </div>
                            <input type="email" name="email" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                            </div>
                            <input type="password" name="password" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <input type="submit" value="Login" class="btn btn-custom">
                    </form>
                    <div class="m-5">
                        <a class="text-center text-dark" href="../Reset/index.php">Reset password</a>
                    </div>
                    <?php 
                        if( isset( $_SESSION['name'] ) && isset( $_SESSION['email'] ) ){
                            header('Location:../Dashboard/index.php');
                            exit;
                        }else{
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $person = new person();
                                if(!empty($_POST['email']) && !empty($_POST['password']) ){
                                    // If No Empty Fields , Create a Person
                                    $person->filtering_and_login($_POST['email'] ,$_POST['password']);
                                }else{
                                    print_error($e['empty_fields']);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
<?php include TEMPLATE.'footer.php';?>