<?php

use PHPMailer\PHPMailer\PHPMailer;

class person{
    use filter , query;

    
    public $id;

    public $name;

    public $email;

    public $password;

    public function check_in_DB($email){
        global $connect;

        return query::get($connect , "SELECT * FROM users WHERE email = ?" , [$email])['process'];

    }
    // Sign up
    public function sign_up(){
        global $connect , $e;

        if($this->check_in_DB($this->email) == true){

            print_error($e['sign_failed_user_exist']);

        }else{
            
            $this->password = hash("sha256",$this->password);
            $this->set($connect, "INSERT INTO users(name , email , password) VALUES(?,?,?)" , [$this->name , $this->email , $this->password]);
            header('Location:../Login/index.php');
        }
    }

    public function filtering_and_sign_up($name , $email , $password){
        global $e;

        $name = $this->filter_name($name);

        $email = $this->filter_email($email);

        $password = $this->filter_password($password);

        if( $name['O'] ){

            $this->name = $name['D'];

        }else{

            print_error($name['D']);

        }
        
        if( $email['O'] ){

            $this->email = $email['D'];

        }else{

            print_error($email['D']);

        }
        
        if( $password['O'] ){

            $this->password = $password['D'];

        }else{

            print_error($password['D']);

        }

        if( $name['O'] && $email['O'] && $password['O'] ){

            $this->sign_up();
            
        }else{
            print_error($e['sign_up_error']);

        }
    }
    // Login 
    public function login(){
        global $connect , $e;
        // Check if user in DB or not
        if($this->check_in_DB($this->email) == true){
            // Query to get the user
            
            $this->password = hash("sha256",$this->password);
            $user = $this->get($connect , "SELECT * FROM users WHERE email = ? AND BINARY password = ?" , [$this->email , $this->password] );
            // Check user password
            if ($user['process'] == true){
                // Store user info in session
                $_SESSION['name'] = $user['data']['name'];

                $_SESSION['email'] = $user['data']['email'];

                $_SESSION['admin'] = $user['data']['admin'];
                // Check if this is admin or not
                if($user['data']['admin'] == 0){
                    
                    header('Location:../Dashboard/index.php');

                }else{

                    header('Location:../Admin/index.php');

                }
            
                exit;

            }else{

                print_error($e['login_password_wrong']);

            }

        }else{

            print_error($e['login_user_not_found']);
        
        }
    } 

    public function filtering_and_login( $email , $password){
        global $e;

        $email = $this->filter_email($email);

        $this->password = $this->filter_string($password);
        
        if( $email['O'] ){

            $this->email = $email['D'];

        }else{

            print_error($email['D']);

        }

        if( $email['O'] ){

            $this->login();

        }else{

            print_error($e['login_error']);


        }
    }

    // reset password
    public function check_reset($email,$number){
        global $connect , $e , $m;
        $check = $this->get($connect , "SELECT * FROM reset WHERE email = ? AND number = ?" , [$email,$number] );
        return $check;
    }

    public function reset($email){
        global $connect , $e , $m;

        $email = $this->filter_email($email);        
        if( $email['O'] ){

            $this->email = $email['D'];

            if($this->check_in_DB($this->email) == true){

                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'habibgamal03@gmail.com';                     //SMTP username
                $mail->Password   = 'gh090807';                               //SMTP password
                $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('habibmisi3@gmail.com', 'Mailer');
                
                $mail->addAddress($this->email);               // Send to
                $mail->addReplyTo('no-reply@gmail.com', 'No reply');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                /*
                    -- link generator
                */
                $random = rand(10000000,99999999);
                $link = 'http://localhost/John_last_version/Reset/reset.php?email=' . $this->email . '&number=' . $random;

                $check = $this->get($connect , "SELECT * FROM reset WHERE email = ?" , [$this->email] );

                if($check['process'] == true){

                    $this->set($connect , "UPDATE reset SET number = ? WHERE email = ?" , [$random,$this->email]);
                
                }else{

                    $this->set($connect, "INSERT INTO reset(email , number) VALUES(?,?)" , [$this->email , $random]);
                
                }
                $mail->Body    = 'Click <a href="' . $link . '">here</a> to reset password';
                $mail->AltBody = 'Sorry Something wrong has happen';

                $mail->send();
                print_msg($m['check_your_email']);

            }else{
                print_error($e['reset_failed_user_not_exist']);
            }

        }else{

            print_error($email['D']);

        }
    }



    public function change_password($email,$password){
        global $connect , $e , $m;
        $password = $this->filter_password($password);
        
        if( $password['O'] ){  
            $hashed_password = hash("sha256",$password['D']);
            $this->set($connect , "UPDATE users SET password = ? WHERE email = ?" , [$hashed_password,$email]);
            print_msg($m['password_changed']);
            if(isset($_SESSION['reset']['state'])){
                $_SESSION['reset']['state'] = 'off';
                //  --- remove the email,number record
                $this->set($connect , "DELETE FROM reset WHERE email = ?" , [$email]);
                //  --- redirect to login page after 5s
                header("Refresh:2; url=../login/index.php");
            }
        }else{

            print_error($password['D']);

        }
        
    }
    
}
