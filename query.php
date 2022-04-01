<?php
    trait Query {

        public function get($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            $query->execute($args);

            if($query->rowCount() == 0){

                $result = false; // not found any thing

            }else{

                $result = true;  // user is exist

            }

            return ['process' => $result , 'data' => $data = $query->fetch()] ;
        }

        public function get_all($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

            return $query->fetchAll();
        }

        public function get_all_assosiated($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function set($connection ,$stmt , $args = []){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

        }

        
    }
?>