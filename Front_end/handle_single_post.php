<?php 
    include '../functions.php';
    $post = new post();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post_content = $post->get_single_post($_POST['post_id'])[0];
        echo json_encode($post_content);
    }
?>