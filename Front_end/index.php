<?php 

    include '../functions.php';
    
    include TEMPLATE.'header.php';

    $nav_color = 0;
?>
       
       <header>
            <div class="slider">
                <div class="background active " id="background-1">
                    <img src="<?php echo IMAGES;?>slider/bg_1.JPG">
                    <div class="overlay"></div>
                </div>
                <div class="background " id="background-2">
                    <img src="<?php echo IMAGES;?>slider/bg_2.JPG">
                    <div class="overlay"></div>
                </div>
                <div class="background " id="background-3">
                    <img src="<?php echo IMAGES;?>slider/bg_3.JPG">
                    <div class="overlay"></div>
                </div>
            </div>
            <?php include TEMPLATE.'nav.php'; ?>
            <section class="text-area">
                <div class="container">
                    <div class="flex">
                        <div class="head-text">
                            <div class="text text-white">
                                <h1>Hello In Chang Maker World</h1>
                                <p class="sub-text">Here you can change your body <br>and <span class="bg-yellow">Achieve To Your Dream</span></p>
                            </div>
                            <div class="text text-white">
                                <h2 class="bg-yellow">With us</h2>
                                <p class="sub-text">Healthy Life Mean Good Food <br>& Continous Training</p>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="<?php echo IMAGES;?>health.vs.junk.jpg">
                        </div>
                    </div>
                </div>
            </section>
            <section class="cta-btn">
                <span></span>
                <a href="#"><button class="btn-custom"> Join Now</button></a>
            </section>
        </header>
        <!--Programs-->
        <section class="programs">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2>Programs</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid margin-top">
                <div class="row justify-content-around">
                    <div class="col-12 col-lg-5 program">
                        <div class="program-photo">
                            <img src="<?php echo IMAGES;?>food.jpg">
                        </div>
                        <div class="program-p">
                            <p class="fenna-casual">See some articles on health , food , training etc...</p>
                        </div>
                        <a href="./blogs.php" target="_blank"><button class="btn btn-custom">Read more</button></a>
                    </div>
                    <div class="col-12 col-lg-5 program">
                        <div class="program-photo">
                            <img src="<?php echo IMAGES;?>workout.jpg">
                        </div>
                        <div class="program-p">
                            <p class="fenna-casual">See some training programs ...</p>
                        </div>
                        <a href="./programs.php" target="_blank"><button class="btn btn-custom">Read more</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!--Plans-->
        <section class="plans">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2 >Plans</h2>
                    </div>
                    <div class="sub-title text-center ">
                        <span></span>
                        <p>Become a part of us</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="container margin-top">
                <div class="row justify-content-around">
                    <div class="plan">
                        <div class="ball pro"></div>
                        <div class="photo">
                            <img src="<?php echo IMAGES;?>course.jpg">
                        </div>
                        <div class="info">
                            <span>600 EG / One Month</span>
                            <button class="btn btn-custom">More Info</button>
                        </div>
                    </div>
                    <div class="plan">
                        <div class="ball red"></div>
                        <div class="photo">
                            <img src="<?php echo IMAGES;?>course.jpg">
                        </div>
                        <div class="info">
                            <span>1500 EG / 3 Month</span>
                            <button class="btn btn-custom">More Info</button>
                        </div>
                    </div>
                    <div class="plan">
                        <div class="ball lite-pro"></div>
                        <div class="photo">
                            <img src="<?php echo IMAGES;?>course.jpg">
                        </div>
                        <div class="info">
                            <span>2600 EG / 6 Month</span>
                            <button class="btn btn-custom">More Info</button>
                        </div>
                    </div>
                </div>
        </section>
        <!--contact-->
        <section class="contact">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2>Contact us</h2>
                    </div>
                    <div class="sub-title text-center ">
                        <span></span>
                        <p>We always with you</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="container contact-content">
                <div class="row justify-content-around align-items-center ">
                    <div id="info-details" class="info-details anchor-black col-12 col-lg-6">
                        <ul>
                            <li><i class="fas fs fa-phone-alt"></i><span> +20 122 539 0914 </span></li>
                            <li><i class="far fs fa-envelope"></i><span class="text-break"> coach.john.info@gmail.com </span></li>
                            <li class="youtube-color"><i class="fab fs fa-youtube"></i><a id="youtube" target="blank" href="https://www.youtube.com/channel/UC6nXI7vqp6Qb8hb08-N8SUg/videos">Coach John on youtube</a></li>
                            <li class="facebook-color"><i class="fab fs fa-facebook"></i><a id="facebook" target="blank" href="https://www.facebook.com/JohnFitEg/">Coach John on facebook</a></li>
                            <li class="insta-color"><i class="fab fs fa-instagram"></i><a id="instagram" target="blank" href="https://www.instagram.com">Coach John on instagram</a></li>
                        </ul>
                    </div>
                    <div class="contact-photo text-center col-12 col-lg-6">
                        <img src="<?php echo IMAGES;?>contact_photo.jpeg">
                    </div>
                </div>
            </div>
        </section>
<?php
    include TEMPLATE.'footer.php';
?>