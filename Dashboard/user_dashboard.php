<?php
    $css = ['style'=>'css-dashboard']; // to include css file that in css-dashboard 

    include '../functions.php';
    
    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( ! isset( $_SESSION['name'] ) || ! isset( $_SESSION['email'] ) ){
        header('Location:../Login/index.php');
        exit;
    }
    if( $_SESSION['admin'] == 1){
        header('Location:../Admin/index.php');
        exit;
    }
    

?>

<section class="calc">
    <div class="container-fluid">
        <div class="boundry">
            <div class="boundry-title">
                <h4>Calculator</h4>
            </div>
            <div class="text-center">
                <p class="mr-3">This is a calculator to do simple healthy food plan</p>
                <a href="calculator.php" ><button class="btn btn-custom">Go</button></a>
            </div>
        </div>
    </div>
</section>
<section class="courses">
    <div class="container-fluid">
        <div class="boundry">
            <div class="boundry-title">
                <h4>My courses (soon)</h4>
            </div>
            <div class="row justify-content-center">
                <div class="course col-lg-3 col-md-5 col-sm-12 col-12">
                    <div class="cyrcle"></div>
                    <div class="course-photo">
                        <img src="<?php echo IMAGES;?>course.jpg">
                    </div>
                    <div class="course-title">
                        <h5>A - Plan</h5>
                    </div>
                    <div class="progress-btn">
                        <a href="#"><button class="btn btn-custom">Progress</button></a>
                    </div>
                </div>
                <div class="add-course course col-lg-3 col-md-5 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                    <a href="#">
                        <div class="plus-cyrcle">
                            <i class="fas fa-plus"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include TEMPLATE . 'footer.php'?>