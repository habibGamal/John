<?php

    class post {
        use Query;
        private $id;

        private $title;

        private $paragraph;

        private $description;

        private $counter;

        private $date;

        private $thump = '';

        private $comments;

        // set functions
        public function set_title($title){

            $this->title = $title;

        }

        public function set_date($date){

            $this->date = $date;

        }

        public function set_thump($thump){

            $this->thump = $thump;

        }

        public function set_paragraph($paragraph){

            $this->paragraph = $paragraph;

        }

        public function set_description($description){

            $this->description = $description;

        }

        public function set_comment($comment , $post_id , $user_id){
            // code ...
        }

        // action 
        public function publish(){
            global $connect , $e , $m;
            // check if any field is empty 
            if( empty($this->title) ){

                print_error($e['empty_title']);

            }elseif( empty($this->paragraph) ){

                print_error($e['empty_paragraph']);

            }elseif( empty($this->description) ){

                print_error($e['post_description']);

            }elseif( empty($this->date) ){

                print_error($e['empty_date']);

            }else{

                $this->set($connect, "INSERT INTO posts(title , paragraph , thump , description , date) VALUES(?,?,?,?,?)" , [$this->title , $this->paragraph , $this->thump , $this->description , $this->date]);
                print_msg($m['publish_post_success']);
            
            }
            
        }

        public function get_posts($initial = true,$lastId = 0){
            global $connect;
            if($initial){
                return $this->get_all_assosiated($connect , "SELECT * FROM posts LIMIT 10");
            }else{
                return $this->get_all_assosiated($connect , "SELECT * FROM `posts` WHERE post_id > ? LIMIT 10" , [$lastId]);
            }
        }
        
        public function get_single_post($post_id){
            global $connect;
            return $this->get_all_assosiated($connect , "SELECT * FROM posts WHERE post_id = ?" , [$post_id]);
        }

        public function edit_post($post_id){
            global $connect, $e , $m;
            // check if any field is empty 
            if( empty($this->title) ){

                print_error($e['empty_title']);

            }elseif( empty($this->paragraph) ){

                print_error($e['empty_paragraph']);

            }elseif( empty($this->description) ){

                print_error($e['post_description']);

            }elseif( empty($this->date) ){

                print_error($e['empty_date']);

            }else{
                $this->set($connect , "UPDATE posts SET title = ?, paragraph = ?, thump = ?, description = ?, date= ? WHERE post_id = ?" , [$this->title , $this->paragraph , $this->thump , $this->description , $this->date , $post_id]);
                print_msg($m['edit_post_success']);
            }
            
        }

        public function delete_post($post_id){
            global $connect;
            return $this->set($connect , "DELETE FROM posts WHERE post_id = ?" , [$post_id]);
        }
    }

?>