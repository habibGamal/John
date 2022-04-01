<?php
    function print_error($msg){
        ?>

            <div class="alert alert-danger">
                <p>Error : <?php echo $msg ;?></p>
            </div>

        <?php
    }
    $e = [
        'empty_fields' => 'Invalid input/inputs please enter all data' ,
        'login_user_not_found' => 'Invalid input ( email ) is not correct' ,
        'sign_empty_fields' => 'Please enter all information' ,
        'sign_failed_user_exist' => 'Sorry , you have alrady has an Email please <a class="alert-link" href="../Login/index.php">Login</a>',
        'invalid_inputs_value' => 'Please enter correct values',
        'password_is_short' => 'Please enter 8 or more character in password',
        'password_not_contain_uppercase' => 'Please enter one or more character and at least one capital letter in password',
        'email_not_valid' => 'Invalid email address' ,
        'name_not_valid' => 'Invalid name',
        'sign_up_error' => 'Cannot sign up sorry...',
        'login_error' => 'Cannot login sorry...',
        'login_password_wrong' => 'Your password is incorrect , Please enter the correct password',
        'empty_title' => 'Please enter the post title',
        'empty_paragraph' => 'Please enter the paragraph',
        'empty_thump' => 'Please enter the thumpnail',
        'post_description' => 'Please enter the descritption',
        'empty_date' => 'Please enter the date',
        'reset_failed_user_not_exist' => 'Reset failed user is not exist',
        'empty_name' => 'The name is empty',
        'empty_path' => 'The photo is empty'
    ];

?>