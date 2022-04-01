<?php
    $css = ['style'=>'css-post_editor'];
    $js = ['config'=>'js-post_editor'];
    $use_angular = true;
    $use_quill = true;
    include '../functions.php';
    
    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';
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

?>
<section id="create-post" class="create-post">
    <div class="container">
        <div class="section-title">
            <div class="container">
                <div class="title">
                <i class="fas fa-pen-square"></i>
                <h2>Create a post</h2>
                </div>
            </div>
        </div>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                // if operation is not set or it isn't edit then set it as new
                $_GET['operation'] = isset($_GET['operation']) ? $_GET['operation']:'new';
            }
        ?>
        <form ng-app="editor" ng-controller="editor-controller" id="post-form" enctype="multipart/form-data">
            <input hidden="hidden" type="text" name="op" value="<?php echo  $_GET['operation']?>">
            <input hidden="hidden" type="text" name="post_id" value="<?php echo  $_GET['post_id']?>">
            <input hidden="hidden" type="text" name="post_thump_old" value={{post_thump_old}}>
            <!--Take the TITLE of the post-->
            <div class="group">
                <lable>Post Name</lable>
                <input id="post_title" name="post_title" type="text" ng-model="post_title" value={{post_title}} >
            </div>
            <!--Take the DATE of the post-->
            <div class="group">
                <lable>Post Date</lable>
                <input id="post_date" name="post_date" type="date" ng-model="post_date" value={{post_date}}>
            </div>
            <!--Take the PARAGRAPH of the post-->
            <!--This for the editor-->
            <div id="editor"></div>
            <!--Take the THUMPNAIL of the post-->
            <div class="group">
                <lable id="file-lable">Post thumpnail</lable>
                <input type="file" id="post_thump" name="post_thump" accept="image/*">
            </div>
            <!--Take the DESCRIPTION of the post-->
            <div class="group">
                <lable>Post Description</lable>
                <input id="post_description" name="post_description" type="text" ng-model="post_description" value={{post_description}}>
            </div>
            <p id="error"></p>
            <button id="submit" class="btn-custom" type="button">Submit</button>
            
        </form>
    </div>    
</section>

<?php include TEMPLATE . 'footer.php';?>