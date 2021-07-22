<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Signin Template · Bootstrap v5.0</title>
                                                            
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <?php if(isset($_GET["action"]) && $_GET["action"] == 'login'):?>
    <link href="/css/signin.css" rel="stylesheet">
    <?php endif;?>
    <link href="/css/carousel.css" rel="stylesheet"> 
    <?php
        ob_start();
        session_start();
        $cookie_name = 'siteAuth';
        $cookie_time = (3600 * 24 * 30); // 30 days

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        {
            header("location: http://online-shop.local:8080?controller=product&action=show ");
            exit;
        }
        else{
          if(isset($cookie_name)){
 
            if(isset($_COOKIE[$cookie_name])){
 
                parse_str($_COOKIE[$cookie_name], $output);
                //var_dump($_COOKIE[$cookie_name]);
                $usr = $output['usr'];
                $hash = $output['hash'];

                $db = Db::getInstance(); 
                $sql = "SELECT * from web.users where user_email ='$usr' and user_pass= '$hash'";
                $stmt = $db->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $results = $stmt->fetchAll();
                //$sql2= "select * from user where username='$usr' and password='$hash'";
                //$result2=mysql_query($sql2,$dbconect);
 
                if($results){
                  header('location: http://online-shop.local:8080?controller=product&action=show');
                  exit;
                }
 
            }
          }
        }
    ?>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
  </head>