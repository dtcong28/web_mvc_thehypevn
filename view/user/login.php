<?php
    require "view/layout/header.php";
?>
<body class="text-center">    
<!-- <link href="css/signin.css" rel="stylesheet"> -->
<main class="form-signin">
  <form method="post">
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">The Hype Viet Nam</h1>
    <?php if(!empty($error)):?>
        <div class="alert alert-danger" role="alert"><?= $error?></div>
    <?php endif;?>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email </label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Mật Khẩu</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1" name = "remember" > Ghi nhớ tài khoản 
      </label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Đăng Nhập</button>
  </form>
  <div class="pt-4">
    <a href='/?controller=user&action=register'>Đăng kí tài khoản</a>
  </div>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</main>

  </body>
</html>
