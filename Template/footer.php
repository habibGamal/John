    
    <?php 
        if(isset($use_quill) && $use_quill){
            echo '<script src='.JS.'quill.js></script>';
        } 
        if(isset($use_angular) && $use_angular){
            echo '<script src='.JS.'angular.js></script>';
        }
    ?>
    <script src="<?php echo JS;?>jQuery.js"></script>
    <script src="<?php echo JS;?>bootstrap.min.js"></script>
    <script src="<?php echo JS;?>all.min.js"></script>
    <script src="<?php echo JS;?>selectorApi.js"></script>
    <script src="<?php echo JS;?>AJAX.js"></script>
    <script src="<?php echo JS;?>main.js"></script>
    <?php 
            if(isset($js)){
                foreach($js as $file=>$dir){
                    echo ' <script src='.$dir .'/'.$file.'.js></script> ';
                }
            }
            if(isset($js_module)){
                foreach($js_module as $file=>$dir){
                    echo ' <script type="module" src='.$dir .'/'.$file.'.js></script> ';
                }
            }
    ?>
    <footer class="text-center text-dark">
            <p>All copy rights owned to coach John &copy; 2020 .</p>
    </footer>
    </body>
</html>