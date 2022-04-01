<?php 
    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( isset( $_SESSION['name'] ) || isset( $_SESSION['email'] ) ){
        header('Location:../Dashboard/index.php');
        exit;
    }
    if($_SESSION['reset']['state'] == 'on'){
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input disabled="disabled" type="email" value="<?php echo $_SESSION['reset']['email'];?>" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                            </div>
                            <input type="password" name="password" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <input type="submit" value="Reset" class="btn btn-custom">
                    </form>
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $person = new person();
                            if(!empty($_POST['password'])){
                                // If No Empty Fields , Create a Person
                                $person->change_password($_SESSION['reset']['email'],$_POST['password']);
                            }else{
                                print_error($e['empty_fields']);
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }else{
        header('Location:../Front_end/index.php');
        exit;
    }
?>
