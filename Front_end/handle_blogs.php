<?php
    
    include '../functions.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = new post;
        if(isset($_POST['init']) && $_POST['init'] == true){
            $posts = $post->get_posts(true);
            echo json_encode($posts);
        }elseif(isset($_POST['next']) && $_POST['next'] == true){
            $posts = $post->get_posts(false,$_POST['lastId']);
            echo json_encode($posts);
        }
    }