<?php
    trait Query {

        static public function get($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            $query->execute($args);

            if($query->rowCount() == 0){

                $result = false; // not found any thing

            }else{

                $result = true;  // user is exist

            }

            return ['process' => $result , 'data' => $data = $query->fetch()] ;
        }

        static public function get_all($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

            return $query->fetchAll();
        }

        static public function get_all_assosiated($connection ,$stmt , $args = array()){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        static public function set($connection ,$stmt , $args = []){

            $query = $connection->prepare($stmt);
            
            $query->execute($args);

        }

        
    }
?>