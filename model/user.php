<?php
    class user_model 
    {   
        
        public static function register($data)
        {
            $db = Db::getInstance();
            $email = $data['email'];
            //$password = password_hash($data['password'], PASSWORD_DEFAULT); // băm mật khẩu 
            $password = $data['password'];
            $name = $data['name'];
            $gender = $data['gender'];
            $country = $data['country'];
            $sql = " INSERT INTO web.users (user_email,user_pass,name,gender,country,role ) 
            VALUES ('$email','$password','$name','$gender','$country',2) ";
            $db->exec($sql); 


        }
        
    }
?>