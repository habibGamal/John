<?php
    $js = ['singlePost'=>'js-front_end'];
    $use_angular = true;
    $use_quill = true;
    include '../functions.php';


    //$keywords = $post_content['description'];
    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

?>

<section class="single-post" ng-app="single-post" ng-controller="single-post-controller">
    <input hidden type="text" name="post_id" value="<?php echo isset($_GET['post_id']) ? $_GET['post_id']:false?>">
    <div class="single-post-content">
        <div class="container">
            <div class="thump text-center pt-5">
                <img src="{{post.thump}}">
            </div>
            <div class="title text-center pt-5 pb-1">
                <h3 class="Badiefont-Dima">{{post.title}}</h3>
            </div>
            <div id="paragraph" class="paragraph ql-editor">
                
            </div>
            <div class="date">
                <span class="badge badge-primary">{{post.date}}</span>
            </div>
        </div>
    </div>
</section>

<?php include TEMPLATE.'footer.php';?>  