<?php require "view/layout/headerAdmin.php"?>
    <h1 class="h2">Danh sách sản phẩm</h1>
    <form method="POST">
      <input name = "key_word" type="text" value="<?= !empty($key_word) ? $key_word : ''?>">
      <button type="submit" name="submit" class="btn btn-primary">Tìm Kiếm</button>
      
    </form>
    <div class="row">
    <a class="btn btn-lg btn-success" href="/?controller=product&action=add">Thêm mới</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên </th>
              <th>Giá</th>
              <th>Mô tả</th>
              <th>Ảnh</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>

          <?php
            $i = 1;
            foreach($products as $row) 
            { ?>
              <tbody>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td>
                    <img style="width: 50px;" src="/img/<?php echo $row['image']; ?>"> 
                  </td>
                  <td>
                    <a href ="/?controller=product&action=edit&id=<?php echo $row['product_id']; ?>">Sửa</a>
                  </td>                                                  <!--mang theo kieu key=>value-->
                  <td>
                    <a onclick="return Del('<?php echo $row['name']; ?>')" href ="/?controller=product&action=delete&id=<?php echo $row['product_id']; ?>">Xóa</a>
                  </td>
                  <?php $i++;?>
                </tr>
              </tbody>
            <?php }?>

        </table>
        </div>
    </div>
    <script>
      function Del(name){
          return confirm("Bạn có muốn chắc chắn muốn xóa sản phẩm: " + name + " ?");
      }
    </script>
<?php require "view/layout/footerAdmin.php"?>