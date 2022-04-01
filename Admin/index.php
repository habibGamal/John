<?php
    $css = ['style'=>'css-admin']; // to include css file that in css-dashboard 

    include '../functions.php';
    
    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( ! isset( $_SESSION['name'] ) || ! isset( $_SESSION['email'] ) ){
        header('Location:../Login/index.php');
        exit;
    }
    if( $_SESSION['admin'] != 1){
        header('Location:../Dashboard/index.php');
        exit;
    }
    
?>


<section class="controle-posts">
    <div class="container">
    </div>
    <div class="container">
         <div class="section-title">
            <div class="container">
                <div class="title">
                <h2>Admin dashboard</h2>
                </div>
            </div>
        </div>
        <div class="boundry">
            <div class="boundry-title">
                <h4>Create a new post</h4>
            </div>
            <div class="text-center">
                <a href="../Post_editor/editor.php?operation=new"><button class="btn btn-custom">Add a post</button></a>
            </div>
        </div>
        <div class="boundry">
            <div class="boundry-title">
                <h4>Edit or Delet a post</h4>
            </div>
            <div class="text-center">
                <a href="../Front_end/blogs.php"><button class="btn btn-custom">See posts <i class="fas fa-external-link-alt"></i></button></a>
            </div>
        </div>
        <div class="boundry">
            <div class="boundry-title">
                <h4>Transform photo</h4>
            </div>
            <div class="text-center">
                <a href="../Transform/index.php"><button class="btn btn-custom">Add photo</button></a>
            </div>
        </div>
    </div>
</section>
<?php include TEMPLATE . 'footer.php';?>