<?php
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    
    $matkhau = md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "', '" . $email . "', '" . $diachi . "', '" . $matkhau . "', '" . $dienthoai . "')");
    if ($sql_dangky) {
        echo '<p style="color: green;">Bạn đã đăng ký thành công.</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        $_SESSION['email'] = $email;
        
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        header('Location:index.php?quanly=giohang');
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/dangky.css">
        <script src="js/register.js" ></script>
        <style>
            .slider{
                display: none;
            }
        </style>

    </head>
    <!-- <body>
    <form action="" autocomplete="off" method="POST" name="formRegister" id="loginform" > 
   
    <div class=" container_form">
      <a class="name-form">ĐĂNG KÝ TÀI KHOẢN</a>

      <div class="form">
          <input type="text" class="form__input" id="hovaten" autocomplete="off" placeholder=" " name="hovaten">
          <label for="email" class="form__label">Họ và Tên</label>
          
      </div>
      <span id="hovaten_error">a</span>

      <div class="form">
          <input type="text" class="form__input" id="dienthoai" autocomplete="off" placeholder=" " name="dienthoai">
          <label for="email" class="form__label">Điện Thoại</label>
          
      </div>
      <span id="dienthoai_error">b</span>

      <div class="form">
          <input type="text" class="form__input" id="diachi" autocomplete="off" placeholder=" " name="diachi">
          <label for="email" class="form__label">Địa Chỉ</label>
          
      </div>
      <span id="diachi_error">c</span>

      <div class="form">
          <input type="text" id="email" class="form__input" itemid="username" autocomplete="off" placeholder=" " name="email">
          <label for="email" class="form__label">Tài Khoản Email</label>
          
      </div>
      <span id="username_error">d</span>
      <div class="form">
          <input type="password" class="form__input" id="password" autocomplete="off" placeholder=" " name="matkhau">
          <label for="password" class="form__label">Mật Khẩu</label>
          
      </div>
      <span id="password_error">e</span>


          <input type="submit" name="dangky" id="dangky" value="Đăng ký" class="submit" onclick="return validate();">
          <a href="index.php?quanly=dangnhap" class="dntk">Đăng nhập</a>
        
      </div>


      </div>


    </body> -->


        <form method="post" action="" id="reform" name="reform">
            <div class="container_form">
            <a class="name-form">ĐĂNG KÝ TÀI KHOẢN</a>
            <table cellpadding="10" class="table">
                    <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" id="email" name="email" value=""/>
                        <span id="email_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu: </td>
                    <td>
                        <input type="password" id="matkhau" name="matkhau" value=""/>
                        <span id="matkhau_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Nhập lại mật khẩu: </td>
                    <td>
                        <input type="password" id="repassword" name="repassword" value=""/>
                        <span id="repassword_error"></span>
                    </td>
                </tr>
                <tr>
                    <td>Địa thoại: </td>
                    <td>
                        <input type="text" id="dienthoai" name="dienthoai" value=""/>
                        <span id="dienthoai_error"></span>
                    </td>
                </tr>
                

                <tr>
                    <td>Địa chỉ: </td>
                    <td>
                        <input type="text" id="diachi" name="diachi" value=""/>
                        <span id="diachi_error"></span>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <input type="submit" class="submit" onclick="return validate();" id="dangky" name="dangky" value="Đăng ký"/>
                        <a href="index.php?quanly=dangnhap" class="dntk">Đăng nhập</a>
                    </td>
                </tr>
            </table>
            </div>
            <button id="white-btn">Nền trắng</button>
            <button id="black-btn">Nền đen</button>
        </form>
    </body>
</html>