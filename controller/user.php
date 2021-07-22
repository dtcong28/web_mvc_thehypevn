<?php
class user {
    function login() {
        $cookie_name = 'siteAuth';
        $cookie_time = (3600 * 24 * 30); // 30 days 
        if(!empty($_POST)){
            if (isset($_POST["submit"]))
            {
                $conn = Db::getInstance();
                $email = $_POST["email"];
                $password = $_POST["password"];
                
                // lam sach thong tin
                $email = strip_tags($email);
                $email = addslashes($email);
                
                $password = strip_tags($password);
                $password = addslashes($password);
                //$password = password_hash($password, PASSWORD_DEFAULT); //  băm mk

                $a_check=(isset($_POST['remember'])) ? $_POST['remember']: "";
                //$a_check=((isset($_POST['remember'])!=0)?1:"");


                if (!$email || !$password)
                {
                    echo "username hoac password khong duoc de trong";
                    exit();
                }

                
                $stmt = $conn->prepare("SELECT * FROM web.users WHERE user_email = '$email' ");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $resultSet = $stmt->fetchAll();
              

                if(empty($resultSet) ) 
                {
                    $error = "Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại !"; 
                    require_once("view/user/login.php");
                    //header("LOCATION: /?controller=user&action=login");
                    exit();
                }
                $row = $resultSet[0];
                if($password != $row['user_pass']){
                    $error = "Mật khẩu không đúng vui lòng nhập lại";
                    require_once("view/user/login.php");
                    //header("LOCATION: /?controller=user&action=login");
                    exit();
                }
                else{
                    // Luu ten dang nhap 
                    $_SESSION["loggedin"] = true;
                    $_SESSION['username'] = $email;
                    $_SESSION['password'] = $password;
                    if($a_check==1){
 
                        setcookie ($cookie_name, 'usr='.$email.'&hash='.$password, time() + $cookie_time);
     
                    }
    
                    if($row['role'] == 1)
                    {
                        header('location: http://online-shop.local:8080?controller=admin&action=manage' );
                        exit();
                
                    }
                    else
                    {
                        header('location: http://online-shop.local:8080?controller=product&action=show' );
                        exit();
                        
                    }

                }


                /*
                foreach($resultSet as $row)
                {
                    // var_dump($resultSet['user_pass']);
                    // exit();
                    if($password != $row['user_pass'])
                    {
                        $error = "Mật khẩu không đúng vui lòng nhập lại";
                        require_once("view/user/login.php");
                        // header("LOCATION: /?controller=user&action=login");
                        break;
                    }
                } 
                */


                
                /*
                foreach($resultSet as $row)
                {
                    if($row['role'] == 1)
                    //if(!password_verify($password, $row['user_pass']))
                    {

                        header('location: http://online-shop.local:8080?controller=admin&action=manage' );
                        break;
                    }
                    else
                    {
                        header('location: http://online-shop.local:8080?controller=product&action=show' );
                        break;
                    }
                }
                */
                

            }
        }else{
            require_once("view/user/login.php");
        
        }
        
    }
    function logout() {
        session_start();
        // Unset all of the session variable
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        header('location: http://online-shop.local:8080/' );
        exit();

    }
    
    function register()
    {
        if(isset($_POST['submit'])){

            $conn = Db::getInstance();
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $city = isset($_POST["city"]) ? $_POST["city"] : "";
            $country = isset($_POST["country"]) ? $_POST["country"] : "";
            // var_dump(strlen($password));
            // exit();

            if(strlen($password) < 10)
            {
                $errorPassword = "Mật khẩu phải có ít nhất 10 kí tự";
                include 'E:/PTTKHDT/Project/web/view/user/register.php'; // 'view/register.php';
                //header('location: /?controller=user&action=register');
            }
            else if (1 !== preg_match('~[0-9]~', $password))
            {
                $errorPassword = "Mật khẩu phải chứa chữ số";
                include 'E:/PTTKHDT/Project/web/view/user/register.php'; // 'view/register.php';
            }
            else if( ! preg_match('/[A-Z]/', $password) )
            {
                $errorPassword = "Mật khẩu phải chứa chữ hoa";
                include 'E:/PTTKHDT/Project/web/view/user/register.php';
            }
            else
            {
                $data = [
                    "email" => $email,
                    "password" => $password,
                    "name" => $name,
                    "gender" => $gender,
                    "country" => $country
                ];
                // bo sung
                user_model::register($data);
                header('location: /?controller=user&action=login');
            }
        
        }
        else
        {
            require_once("view/user/register.php");

        }
        

    }

}
?>