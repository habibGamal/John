<div class="<?php if($nav_color == 1){echo 'nav-custom';}?>">
    <nav>
        <div class="container">
            <div class="nav-content">
                <div class="logo">
                    <img src="<?php echo IMAGES;?>logo.png">
                </div>
                <div class="items">
                    <ul>
                        <li><a href="<?php echo FRONT_END;?>index.php">Home</a></li>
                        <li><a href="<?php echo FRONT_END;?>about.php">About</a></li>
                        <li><a href="<?php echo FRONT_END;?>programs.php">Programs</a></li>
                        <li><a href="<?php echo FRONT_END;?>transformation_gallery.php">Transformation Gallery</a></li>
                        <li><a href="<?php echo FRONT_END;?>blogs.php">Blogs</a></li>
                        <?php
                            if( isset( $_SESSION['name'] ) && isset( $_SESSION['email'] ) ){
                                echo ' <li><a href="../Dashboard/index.php">Dashboard</a></li>';
                                echo ' <li><a href="../Dashboard/logout.php">logout</a></li>';

                            }else{
                                echo ' <li><a href="../Login/index.php">Login</a></li>';
                                echo ' <li><a href="../Sign Up/index.php">Sign Up</a></li>';
                            }
                        ?>
                    </ul>
                <div class="nav-bars">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</nav>
</div>