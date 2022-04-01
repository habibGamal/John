<?php 

    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( isset( $_SESSION['name'] ) || isset( $_SESSION['email'] ) ){
        header('Location:../Dashboard/index.php');
        exit;
    }

?>
        <section class="sign-up">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2 class="display-4">Sign up</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="sign-form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                            </div>
                            <input type="text" name="name" class="form-control" aria-describedby="basic-addon1">
                        </div>
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
                        <input type="submit" value="Sign Up" class="btn btn-custom">
                    </form>
                    <?php 
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $person = new person();
                            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) ){
                                // If No Empty Fields , Create a Person
                                $person->filtering_and_sign_up($_POST['name'] ,$_POST['email'] ,$_POST['password']);
                                //header('Location:../Login/index.php');
                            }else{
                                print_error($e['empty_fields']);
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
<?php include TEMPLATE.'footer.php';?>