<?php require "view/layout/headerAdmin.php"?>
    <h1 class="h2">Sửa sản phẩm</h1>
    <div class="row">
      <form method = "post" action="" enctype ="multipart/form-data"> 
        <div class="col-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>                           
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required value="<?php echo $product['name']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Giá sản phẩm</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" required value="<?php echo $product['price']; ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputdescription">Miêu tả</label>
            <input type="text" name="description" class="form-control" id="exampleInputdescription" required value="<?php echo $product['description']; ?>">
          </div>
          <div class="form-group mt-3 mb-3">
            <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
            <img style="width: 100px;" src="img/<?php echo $product['image']; ?>"> 
            <input type="file" name="fileUpload" class="form-control-file" id="exampleFormControlFile1">
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
      </form>
    </div>
<?php require "view/layout/footerAdmin.php"?>
