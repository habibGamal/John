<?php 
    $css = ["trans"=>"css-front_end"];
    include '../functions.php';

    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';
    $trans = new transform();
    $gallery = $trans->get_trans();
?>
        <section class="trans">
            <div class="section-title">
                <div class="container">
                    <div class="title">
                        <h2>Transformation Gallery</h2>
                    </div>
                    <div class="sub-title text-center ">
                        <span></span>
                        <p>This is a collection of transformations</p>
                        <span></span>
                    </div>
                </div>
            </div>
                
            <div class="container margin-top">
                <div class="row justify-content-around">
                    <?php
                        foreach($gallery as $transform){
                            ?>
                            <div class="trans-photo">
                                <img src="<?php echo $transform['path'];?>">
                                <p>Name : <?php echo $transform['name']?></p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
<?php include TEMPLATE.'footer.php';?>