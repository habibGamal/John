<?php 
    $css = ['blogs'=>'css-front_end'];
    $use_angular = true;
    include '../functions.php';

    $js = ['blogs'=>'js-front_end'];

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

   
?>
<section class="blogs" ng-app="posts" ng-controller="post">
    <div class="section-title">
        <div class="container">
            <div class="title">
                <h2>Blogs {{count}}</h2>
            </div>
            <div class="sub-title text-center ">
                <span></span>
                <p>This is some Posts from coach John</p>
                <span></span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="posts row justify-content-around">
            <div ng-repeat="post in posts" class="post col-lg-5 col-12">
                <div class="post-thump">
                    <img src='{{post.thump}}'>
                </div>
                <div class="post-info">
                    <div>
                        <h2 class="post-title" ng-bind="post.title"></h2>
                        <p id="post-paragragh" class="post-paragragh" ng-bind-html-unsafe="post.paragraph"></p>
                    </div>
                    <div>
                        <?php
                            if(isset($_SESSION['admin'])){
                                if( $_SESSION['admin'] == 1){
                                    echo '<div class="post-cont d-inline-block">';
                                    echo '<a href="../Post_editor/editor.php?operation=edit&post_id={{post.id}}" id="edit" class="mr-1"><i class="far fa-edit text-dark"></i></a>';
                                    echo '<a href="delete_post.php?post_id={{post.id}}" onclick="confirm(\'Are you sure delete the post\')" id="delete"><i class="far fa-trash-alt text-dark"></i></a>';
                                    echo '</div>';
                                }
                            }
                        ?>
                        <a href="single_post.php?post_id={{post.id}}" target="_blank"><button class="btn btn-custom">Read</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="d-block mx-auto mt-5">
        <ul class="pagination">
            <button  class="page-item page-link" ng-click="next(lastId)">next</button>
        </ul>
    </nav>
</section>

<?php include TEMPLATE.'footer.php';?>   
