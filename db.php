<?php
    class Db{
        private static $instance = NULL;
        //private static $instance = NULL;

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                try {
                    $servername = "localhost";
                    $username = "root";
                    $password = ""; 
                    $dbname = "web";
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "Connected successfully";
                    self::$instance = $conn;
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
            return self::$instance;
        }
    }
?>