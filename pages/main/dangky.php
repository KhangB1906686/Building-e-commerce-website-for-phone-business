<?php
ob_start();
// Kiểm tra xem nút dangky có tồn tại hay ko 
if (isset($_POST['dangky'])) {
	// Lấy dữ liệu input 
	$tenkhachhang = $_POST['hovaten'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];

	$matkhau = md5($_POST['matkhau']);
	$diachi = $_POST['diachi'];
	$sql_dangky = mysqli_query($mysqli, "INSERT INTO dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
	if ($sql_dangky) {
		$message = "Bạn đã đăng ký thành công!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		// $_SESSION['dangky'] = $tenkhachhang;
		// $_SESSION['email'] = $email;

		$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
		ob_end_flush();
		header('Location:index.php?quanly=dangnhap');
	}
}

?>
<style>
	::after {
		box-sizing: border-box;
	}

	body {
		background: #282828;
	}

	.top-main {
		display: none;
	}

	#main {
		border: none;
	}

	.slider {
		display: none;
	}

	.sidebar {
		display: none;
	}

	.main-content {
		width: 100%;
	}
</style>
<div class="clear"></div>
<div class="breadcrumb-wrapper clearfix">
	<div class="wrapper clearfix">
		<div class="breadcrumb-box fl">
			<ul class="breadcrumb">
				<li>
					<a href="/">Trang chủ</a>
				</li>
				<li>
					<a href="#  " rel="category tag">Đăng ký</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="content-box">
	<h1 class="box-title tp_title">Đăng ký tài khoản miễn phí</h1>
	<p class="intro-user"></p>
	<form id="formAcount" action="" method="POST">
		<div class="form-group">
			<input type="text" id="email" class="form-input" placeholder="Họ và tên" name="hovaten">
			<!-- <label for="email" class="form__label">Họ và Tên</label> -->
		</div>
		<div class="form-group">
			<input type="email" id="email" class="form-input" placeholder="Email" name="email">
			<!-- <label for="email" class="form__label"></label> -->
		</div>
		<div class="form-group">
			<input type="text" id="email" class="form-input" placeholder="Số điện thoại" name="dienthoai">
			<!-- <label for="email" class="form__label">Điện Thoại</label> -->
		</div>
		<div class="form-group">
			<input type="text" id="email" class="form-input" placeholder="Địa chỉ" name="diachi">
			<!-- <label for="email" class="form__label">Địa Chỉ</label> -->
		</div>
		<div class="form-group">
			<input type="password" id="email" class="form-input" placeholder="Mật khẩu" name="matkhau">
			<!-- <label for="email" class="form__label"></label> -->
		</div>
		<div class="form-group">
			<label class="checkbox-user">
				<input type="checkbox" name="checkValids">
				<div id="checkbox-content">Đồng ý điều khoản tài khoản &amp; chính sách</div>
			</label>
		</div>
		<div class="form-group">
			<button type="submit" name="dangky" id="btnRegister" class="btn-register">
				Đăng ký </button>
		</div>
	</form>
	<div class="clr"></div>
</div>
<!-- <style type="text/css">
	* {
		font-size: 17px;
		margin: 0;
		padding: 0;
	}

	.container_form {
		position: relative;
		height: 500px;

	}

	.name-form {
		font-size: 30px;
		font-weight: bold;
		position: relative;
		left: 275px;
		top: 10px;
		color: black;

	}

	.form {
		position: relative;
		width: 300px;
		height: 30px;
		padding: 30px;
	}

	.form__input {
		position: absolute;
		width: 100%;
		height: 70%;
		left: 280px;
		border: 2.4px solid #333;
		border-radius: 5px;
		font-size: 10px;
		background: none;
		font-size: 18px;
		outline: none;

	}

	.form__input:focus {
		border-color: rgb(0, 21, 255);

	}

	.form__label {
		position: relative;
		left: 260px;
		top: 10px;
		padding: 0;
		transition: 0.3s cubic-bezier(.79, 0, .16, .99);
		background-color: #f4f4f4;
	}

	.form__input:focus~.form__label,
	.form__input:not(:placeholder-shown).form__input:not(:focus)~.form__label {
		top: -15px;
		font-size: 18px;
		left: 255px;
		padding: 0 10px;
		color: rgb(0, 21, 255);
		font-weight: bold;
	}


	.submit {
		position: relative;
		top: 40px;
		font-size: 15px;
		font-weight: bold;
		width: 120px;
		height: 30px;
		border-radius: 5px;
		left: 280px;
		cursor: pointer;
		color: black;
		border: 2px solid #333;
	}

	.submit:hover {
		color: blue;
		transition: 1s;
		font-size: 18px;
		font-weight: bold;
	}

	.dntk {
		position: relative;
		left: 370px;
		top: 40px;
		color: blue;
		text-decoration: none;
	}
</style>
<form action="" autocomplete="off" method="POST">
	<div class=" container_form">
		<a class="name-form">ĐĂNG KÝ TÀI KHOẢN</a>

		<div class="form">
			<input type="text" id="email" class="form__input" autocomplete="off" placeholder=" " name="hovaten">
			<label for="email" class="form__label">Họ và Tên</label>
		</div>

		<div class="form">
			<input type="text" id="email" class="form__input" autocomplete="off" placeholder=" " name="dienthoai">
			<label for="email" class="form__label">Điện Thoại</label>
		</div>


		<div class="form">
			<input type="text" id="email" class="form__input" autocomplete="off" placeholder=" " name="diachi">
			<label for="email" class="form__label">Địa Chỉ</label>
		</div>


		<div class="form">
			<input type="text" id="email" class="form__input" autocomplete="off" placeholder=" " name="email">
			<label for="email" class="form__label">Tài Khoản</label>
		</div>
		<div class="form">
			<input type="password" id="email" class="form__input" autocomplete="off" placeholder=" " name="matkhau">
			<label for="email" class="form__label">Mật Khẩu</label>
		</div>


		<input type="submit" name="dangky" value="Đăng ký" class="submit">
		<a href="index.php?quanly=dangnhap" class="dntk">Đăng nhập</a>

	</div>
</form> -->