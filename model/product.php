<?php
    class product_model{

        public static function save($data)
        {
            $db = Db::getInstance();
            $name = $data['name'];
            $image = $data['image'];
            $price = $data['price'];
            $description = $data['description'];

            $sql = " INSERT INTO web.product (name,image,price,description ) 
            VALUES ('$name','$image','$price','$description') ";
            $db->exec($sql); 
        }

        public static function list($keyword = false)
        {
            $db = Db::getInstance(); 
            if($keyword !== false) {
                $keyword = "%$keyword%";
                $sql = " SELECT * FROM web.product WHERE name like '$keyword' OR description like '$keyword'"; 
            }else{
                $sql = " SELECT * FROM web.product"; 
            }
            /*
            $results = $db->query($sql);
            $results->setFetchMode(PDO::FETCH_ASSOC);
            foreach($results as $result){
                echo $result['name'];
            }
            exit();
            return $result;
            */
            $stmt = $db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $results = $stmt->fetchAll();
        
            return $results;
        }

        public static function delete($id)
        {
            $db = Db::getInstance();
            $sql = "DELETE FROM web.product WHERE product_id = $id";
            $db->exec($sql); 
        }

        public static function find_product_by_id($id)
        {
            $db = Db::getInstance();
            $sql = "SELECT * FROM web.product WHERE product_id = $id";
            $stmt = $db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $results = $stmt->fetchAll();
        
            return $results[0];
        }

        public static function edit($data)
        {
            $db = Db::getInstance();
            $id = $data["product_id"];
            $name = $data["name"];
            $image = $data["image"];
            $price = $data["price"];
            $description = $data["description"];

            $sql = 
            "UPDATE web.product SET name = '$name',image = '$image',price = $price,
            description = '$description' 
            where product_id = $id";
            $db->exec($sql); 
        }
    
    }


?>