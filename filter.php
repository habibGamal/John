<?php
    // Filter Return Pattern [Operation , Data]
    // Operation can be true / false
    // Data can be Error / Filtered data
    trait filter{

        public function filter_string($string){

            return filter_var($string , FILTER_SANITIZE_STRING);

        }
        
        public function filter_email($email){
            global $e;

            if( filter_var($email , FILTER_VALIDATE_EMAIL) == false ){

                return ['O' => false , 'D' => $e['email_not_valid'] ]; 

            }else{

                return ['O' => true , 'D' => filter_var($email , FILTER_VALIDATE_EMAIL) ];  

            }
        }

        public function filter_name($name){
            global $e;

            $c_name = preg_replace('/[^a-z1-9_ ]/i' , 'E' , $name);

            if($c_name === $name){

                return ['O' => true , 'D' =>  $this->filter_string($c_name)]; 

            }else{

                return ['O' => false , 'D' =>  $e['name_not_valid'] ] ; 
                
            }
        }
        // note that filter_password hash password and valid it
        public function filter_password($password){
            global $e;

            if( strlen($password) < 8 ){

                return ['O' => false , 'D' => $e['password_is_short'] ];

            }elseif( !preg_match('/[A-Z]/' , $password) ){

                return ['O' => false , 'D' => $e['password_not_contain_uppercase'] ];

            }else{

                return ['O' => true , 'D' => $this->filter_string($password) ];

            }
        }
        
    }
?>