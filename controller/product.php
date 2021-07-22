<?php
class product
{
    function show()
    {
        $products = product_model::list();
        require_once("view/product/show.php");
    }
    function add()
    {
        // Kiểm tra có post dữ liệu lên không
        if(!empty($_POST)){
            // Lấy dữ liệu đưa vào mảng cần lưu

            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
            $image = $_FILES['fileUpload']['name'];
            $allowUpload = true;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $maxFileSize = 800000;
            $allowTypes = array('jpg','png','jpeg','gif');

            $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
            if($check== true)
            {
                //echo "Đây là file ảnh";
                $allowUpload = true;
            }
            else{
                //echo "Đây không phải file ảnh";
                $allowUpload = false;
            }
            if(file_exists($target_file))
            {
                //echo "Tên file đã tồn tại trên server, không đc ghi đè <br>";
                $allowUpLoad = false;
            }
            if(!in_array($imageFileType,$allowTypes))
            {
                echo "Chỉ đc upload các định dạng JPG,PNG,JPEG,GIF <br>";
                $allowUpLoad = false;
            }

            if($allowUpload)
            {
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$target_file))
                {
                    $data = [
                        "name" => isset($_POST['name']) ? $_POST['name'] : '',
                        "price" => isset($_POST["price"]) ? $_POST["price"] : " " ,
                        "description" => isset($_POST["description"]) ? $_POST["description"] : " ",
                        "image" => $image
                    ];
                    $products=product_model::save($data);
                    header('location: /?controller=product&action=list');
                }
                else
                {
                    echo"Có lỗi xảy ra";
                }
            }
            else{
                echo"Không upload được file";
            }
        }else{
            require_once("view/product/add.php");
        }
    }
    function list()
    {   
        $key_word = isset($_POST['key_word']) ? $_POST['key_word'] : false;
        if(isset($key_word)){
            $products = product_model::list($key_word);
        }else{
            $products = product_model::list();
        }
        //var_dump($products);
        require_once("view/product/list.php");
    }

    function delete()
    {
        $id = $_GET['id'];
        $products = product_model::delete($id);
        header('location: /?controller=product&action=list');
    }

    function edit()
    {
        $id = $_GET['id'];
        $product = product_model::find_product_by_id($id);
        if(!empty($_POST))
        {
            $id = $_GET['id'];
        
            if($_FILES['fileUpload']['name'] == ''){
                $image = $product['image'];
            }
            else{
                $image = $_FILES['fileUpload']['name'];
                $image_tmp = $_FILES['fileUpload']['tmp_name'];
                move_uploaded_file($image_tmp, 'img/'.$image);
            }
            $data = [
                "product_id" => $id,
                "name" => isset($_POST['name']) ? $_POST['name'] : '',
                "price" => isset($_POST["price"]) ? $_POST["price"] : " " ,
                "description" => isset($_POST["description"]) ? $_POST["description"] : " ",
                "image" => $image
            ];
            product_model::edit($data);
            
            header('location: /?controller=product&action=list');
        }else{
            require_once("view/product/edit.php");
        }

    }

}

?>