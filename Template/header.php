<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            if(isset($keywords)){
                echo '<meta name="keywords" content="' . $keywords .'">';
            }
        ?>
        <title>Coach John</title>
        <link rel="stylesheet" href="<?php echo CSS;?>Normalize.css">
        <link rel="stylesheet" href="<?php echo CSS;?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo CSS;?>all.min.css">
        <?php
            if(isset($use_quill) && $use_quill){
                echo '<link rel="stylesheet" href='.CSS.'quill.css>';
            } 
        ?>
        <link rel="stylesheet" href="<?php echo CSS;?>style.css">
        <?php 
            if(isset($css)){
                foreach($css as $file=>$dir){
                    echo ' <link rel="stylesheet" href="'. $dir .'/'.  $file.'.css"> ';
                }
            }
        ?>
    </head>
    <body>
        