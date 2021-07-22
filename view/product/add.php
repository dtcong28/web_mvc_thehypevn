<?php require "view/layout/headerAdmin.php"?>
    <h1 class="h2">Thêm mới</h1>
    <div class="row">
      <form method = "post" action="" enctype ="multipart/form-data"> 
        <div class="col-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Giá sản phẩm</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Giá">
          </div>
          <div class="form-group">
            <label for="exampleInputdescription">Miêu tả</label>
            <input type="text" name="description" class="form-control" id="exampleInputdescription" placeholder="Miêu tả">
          </div>
          <div class="form-group mt-3 mb-3">
            <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
            <input type="file" name="fileUpload" class="form-control-file" id="exampleFormControlFile1">
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
      </form>
    </div>
<?php require "view/layout/footerAdmin.php"?>
