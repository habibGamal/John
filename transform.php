<?php

    class transform {
        use Query;
        private $name;
        
        private $path;

        function set_name($name){
            $this->name = $name;
        }

        function set_path(){
            if(!empty($_FILES['photo']['name'])){
                $target_dir = IMAGES.'trans/';

                $file = $_FILES['photo']['name'];

                $path = pathinfo($file);

                $filename = $path['filename'];
                
                $ext = $path['extension'];

                $temp_name = $_FILES['photo']['tmp_name'];

                $path_filename_ext = $target_dir.$filename.".".$ext;

                $this->path = $target_dir.$file;

                if (!file_exists($path_filename_ext)) {
                    // If the thumpnail not already exists
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }
        }

        public function publish(){
            global $connect , $e , $m;
            // check if any field is empty 
            if( empty($this->name) ){

                print_error($e['empty_name']);

            }elseif( empty($this->path) ){

                print_error($e['empty_path']);

            }else{

                $this->set($connect, "INSERT INTO transform(path ,name) VALUES(?,?)" , [$this->path , $this->name]);
                print_msg($m['publish_trans_success']);
            
            }
            
        }

        public function get_trans(){
            global $connect ;
            return $this->get_all_assosiated($connect , "SELECT * FROM transform");
        }
    }