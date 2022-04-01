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


<section class="add-transform">
    <div class="container">
        <div class="section-title">
            <div class="container">
                <div class="title">
                    <h2>Add transformation photo</h2>
                </div>
            </div>
        </div>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-custom d-block mx-auto">Submit</button>
        </form>
    </div>
</section>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $trans = new transform();
        $trans->set_path();
        $trans->set_name($_POST['name']);
        $trans->publish();
    }

?>

<?php include TEMPLATE . 'footer.php';?>