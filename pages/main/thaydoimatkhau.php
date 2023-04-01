<?php
if (isset($_POST['doimatkhau'])) {
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT * FROM dangky WHERE email = '" . $taikhoan . "' AND matkhau = '" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli,"UPDATE dangky SET matkhau='".$matkhau_moi."'");
        echo '<p style="color: green;">Mật khẩu đã được thay đổi.</p>';
    } else {
        // echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
        echo '<p style="color: red;">Tài khoản hoặc Mật khẩu cũ không đúng, vui lòng nhập lại.</p>';
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" href="css/thaydoimatkhau.css">
        
    </head>
    <body>
    <form action="" autocomplete="off" method="POST">
    <div class="container_form">
    <a class="name-form">ĐỔI MẬT KHẨU</a>
      <div class="form">
          <input type="text" id="email" class="form__input" autocomplete="off" placeholder=" ">
          <label for="email" class="form__label">Tài Khoản</label>
      </div>
      <div class="form">
          <input type="password" id="password" class="form__input" autocomplete="off" placeholder=" ">
          <label for="password" class="form__label">Mật Khẩu Cũ</label>
      </div>

      <div class="form">
          <input type="password" id="forestpassword" class="form__input" autocomplete="off" placeholder=" ">
          <label for="forestpassword" class="form__label">Mật Khẩu Mới</label>
      </div>

          <input type="submit" name="quenmatkhau" value="Đổi mật khẩu" class="submit">
          
        
      </div>


      </div>


    </body>

</html>