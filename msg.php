<?php
    function print_msg($msg){
        ?>

            <div class="alert alert-success">
                <script>
                    slideOutAlert();
                </script>
                <p class="m-0"><?php echo $msg ;?></p>
            </div>

        <?php
    }
    $m = [
        'sign_up_success' => 'You have sign up successfully',
        'publish_post_success' => 'Post already published',
        'edit_post_success' => 'Post have been edited successfully',
        'check_your_email' => 'Check your email',
        'password_changed' => 'Password has been changed successfully you will be redirected to login page',
        'publish_trans_success' => 'Trasnformation photo published'
    ];

?>