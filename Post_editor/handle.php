<?php
    /*
        --This page to handle info of the post.
        --There are two ways :-
            - first handle with ajax request (if no thumpnail attached)
            - second handle with directly requset to the server (if thumpnail is attached)
            (note: ajax request will run first in all states)
    
    */
    include '../functions.php';
    /* 
        -- check if that user is signed in or not
    */
    if( ! isset( $_SESSION['name'] ) || ! isset( $_SESSION['email'] ) ){
        
        header('Location:../Login/index.php');

        exit;

    }
    /* 
        -- check if that user is an admin or not
    */
    if( ! ($_SESSION['admin'] == 1) ){
       
        header('Location:../Login/index.php');
        
        exit;
        
    }

    $post = new post();
    function edit_state($post_obj,$id){
        echo json_encode($post_obj->get_single_post($id) );
    }
    // if it is a new post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['get_old_data']) && $_POST['get_old_data'] == true){
            edit_state($post,$_POST['post_id']);
        }
        if(isset($_POST['execute']) && $_POST['execute'] == true){
            // var_dump($_POST);
            // var_dump($_FILES);
            $post->set_title($_POST['post_title']);

            $post->set_date($_POST['post_date']);

            $post->set_paragraph($_POST['post_paragraph']);

            $post->set_description($_POST['post_description']);

            // Save the thumpnail
            if(!empty($_FILES['post_thump']['name'])){
                $target_dir = IMAGES.'posts/';

                $file = $_FILES['post_thump']['name'];

                $path = pathinfo($file);

                $filename = $path['filename'];
                
                $ext = $path['extension'];

                $temp_name = $_FILES['post_thump']['tmp_name'];

                $path_filename_ext = $target_dir.$filename.".".$ext;

                $post->set_thump($target_dir.$file);

                if (!file_exists($path_filename_ext)) {
                    // If the thumpnail not already exists
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }else{
                // set a default photo
                if( $_POST['op']=='new' ){
                    // just if you add a new post not edit exist one
                    $post->set_thump(IMAGES.'posts/food.jpg');
                }elseif( $_POST['op']=='edit' ){
                    // if you in edit mode set the default the old img
                    $post->set_thump($_POST['post_thump_old']);
                }
            }
            if( $_POST['op']=='new' ){
                // if this is a new post
                $post->publish();
            }elseif( $_POST['op']=='edit' ){
                // if you edit in the post
                $post->edit_post($_POST['post_id']);
            }
        }
    }
    
/*
    if($_SERVER['REQUEST_METHOD']){
        // Set post data
        $post->set_title($_POST['post_title']);

        $post->set_date($_POST['post_date']);

        $post->set_paragraph($_POST['post_paragraph']);

        $post->set_description($_POST['post_description']);

        // Save the thumpnail
        if(!empty($_FILES['post_thump']['name'])){
            $target_dir = IMAGES.'posts/';

            $file = $_FILES['post_thump']['name'];

            $path = pathinfo($file);

            $filename = $path['filename'];
            
            $ext = $path['extension'];

            $temp_name = $_FILES['post_thump']['tmp_name'];

            $path_filename_ext = $target_dir.$filename.".".$ext;

            $post->set_thump($target_dir.$file);

            if (!file_exists($path_filename_ext)) {
                // If the thumpnail not already exists
                move_uploaded_file($temp_name,$path_filename_ext);
            }
        }else{
            $post->set_thump(IMAGES.'posts/food.jpg');
        }
        
        $post->publish();
    } 
*/
?>