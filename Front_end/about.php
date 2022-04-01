<?php 
    $css = ['about'=>'css-front_end'];

    include '../functions.php';

    include TEMPLATE.'header.php';
    
    $nav_color = 1;
    include TEMPLATE.'nav.php';
?>
    <section class="about">
        <div class="section-title">
            <div class="container">
                <div class="title">
                    <h2>About me</h2>
                </div>
                <div class="sub-title text-center ">
                    <span></span>
                    <p>Hi , I am coach John</p>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="container about-content">
            <div class="row certificates justify-content-evenly">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <img class="img-thumbnail" src="<?php echo IMAGES ?>certificates/ISSA-Certified-Nutritionist-Certification-1.png" />
                    <h5 class="text-center p-1"><span class="yellow-color">ISSA</span> Nutritionist</h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <img class="img-thumbnail" src="<?php echo IMAGES ?>certificates/ISSA-Certified-Personal-Trainer-Certification-1.png" />
                    <h5 class="text-center p-1"><span class="yellow-color">ISSA</span> Personal-Trainer</h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <img class="img-thumbnail" src="<?php echo IMAGES ?>certificates/precision-nutrition-john-bakhit-level-1-coaching-certification-cec-certification-1.png" />
                    <h5 class="text-center p-1"><span class="yellow-color">Precision</span> Nutrition</h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <img class="img-thumbnail" src="<?php echo IMAGES ?>certificates/precision-nutrition-john-bakhit-level-1-coaching-certification-certification-1.png" />
                    <h5 class="text-center p-1"><span class="yellow-color">Precision</span> Nutrition</h5>
                </div>
            </div>
            <div class="my-3">
                <video autoplay muted loop class="mx-auto d-block">
                    <source src="<?php echo VIDEO?>Intro.mp4" type="video/mp4">
                </video>
            </div>
            <div class="d-flex media-links justify-content-evenly">
                <div class="youtube">
                    <a href="https://www.youtube.com/channel/UC6nXI7vqp6Qb8hb08-N8SUg?view_as=subscriber" target="_blank"><i class="fab fs fa-youtube"></i></a>
                </div>
                <div class="facebook">
                    <a href="https://www.facebook.com/JohnFitEg/" target="_blank"><i class="fab fs fa-facebook"></i></a>
                </div>
                <div class="insta">
                    <a href="https://www.instagram.com/john.fit.eg/?fbclid=IwAR0YREffbiD2bJo-G28KBRbvUpMq360vqYeR4umlQueMXXXZsD7BoL9T4MM" target="_blank"><i class="fab fs fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php include TEMPLATE.'footer.php';?>
