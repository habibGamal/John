<?php
    session_start();
    //ini_set("display_errors","0");
    const TEMPLATE = '../Template/';
    const CSS = '../Template/css/';
    const JS = '../Template/js/';
    const IMAGES = '../Template/images/';
    const VIDEO = '../Template/video/';
    define( 'FRONT_END' , '../Front_end/');
    define( 'DIR' , dirname(__FILE__) );
    $nav_color = 1;
    include 'error.php';
    include 'msg.php';
    include 'connect.php';
    include 'query.php';
    include 'filter.php';
    include 'person.php';
    include 'post.php';
    include 'transform.php';

?>