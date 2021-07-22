<?php
    require "view/layout/header.php";
?>
<body >    
<main>
    <div class="container">
    <h1 class='text-center'>The Hype Viet Nam</h1>
    <hr>

    <div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <header class="card-header">
        <a href="/?controller=user&action=login" class="float-right btn btn-outline-primary mt-1">Đăng Nhập</a>
        <h4 class="card-title mt-2">Đăng Kí</h4>
    </header>
    <article class="card-body">
    <form method='post'>
        <div class="form-row">
            <div class="col form-group">
                <label>Họ và tên </label>   
                <input type="text" name='name' class="form-control" placeholder="">
            </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
        <div class="form-group">
            <label>Email </label>
            <input type="email" name='email' class="form-control" placeholder="">
            <small class="form-text text-muted">Chúng tôi sẽ không chia sẻ email với bất kì ai</small>
        </div> <!-- form-group end.// -->
        <div class="form-group">
                <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="Nam">
            <span class="form-check-label"> Nam </span>
            </label>
            <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="Nữ">
            <span class="form-check-label"> Nữ</span>
            </label>
        </div> <!-- form-group end.// -->
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Thành Phố</label>
            <input type="text" name="city" class="form-control">
            </div> <!-- form-group end.// -->
            <div class="form-group col-md-6">
            <label>Đất Nước</label>
            <select id="inputState" name="country" class="form-control">
                <option> Choose...</option>
                <option selected="">Viet Nam</option>
                <option>Russia</option>
                <option >United States</option>
                <option>India</option>
                <option>Afganistan</option>
            </select>
            </div> <!-- form-group end.// -->
        </div> <!-- form-row.// -->
        <div class="form-group">
            <label>Tạo Mật Khẩu</label>
            <input class="form-control" name = 'password' type="password">
            <?php
                if(isset($errorPassword))
                {
                    echo $errorPassword;
                }
            ?>
        </div> <!-- form-group end.// -->  
        <div class="form-group">
            <button type="submit" name='submit' class="btn btn-primary btn-block"> Đăng Kí  </button>
        </div> <!-- form-group// -->   
                                    
    </form>
    </article> <!-- card-body end .// -->
    <div class="border-top card-body text-center">Bạn đã có tài khoản chưa? <a href="/?controller=user&action=login">Đăng Nhập</a></div>
    </div> <!-- card.// -->
    </div> <!-- col.//-->

    </div> <!-- row.//-->


    </div> 
</main>
</body>
