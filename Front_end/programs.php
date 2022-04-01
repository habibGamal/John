<?php 
    $css = ['programs'=>'css-front_end'];

    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    $programs_data = file_get_contents('programs.json');
    $json_data = json_decode($programs_data,true);
    
?>
        <section class="training-programs">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2>Training Programs</h2>
                    </div>
                    <div class="sub-title text-center ">
                        <span></span>
                        <p>Here a collection of available training programs</p>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row flex-wrap justify-content-evenly ">
                    <?php
                        foreach( $json_data as $p ){
                            $name = $p['name'];
                            $imgName = strtolower(str_replace(' ','',$name));
                            $link = strtolower(str_replace(' ','-',$name));
                            ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="program">
                                        <h4 class=""><?php echo $name;?></h4>
                                        <div class="photo">
                                            <img src="<?php echo IMAGES;?>programs/<?php echo $imgName;?>.webp">
                                        </div>
                                        <div class="pragraph"> 
                                            <a href="https://www.muscleandstrength.com/exercises/<?php echo $link;?>.html" target="_blank"><button class="btn btn-light">Click to go</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
<?php include TEMPLATE.'footer.php';?>
