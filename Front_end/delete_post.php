<?php

include '../functions.php';
$post = new post();
$post->delete_post($_GET['post_id']);
header('Location:'.$_SERVER['HTTP_REFERER']);
exit;
?>