<?php
// Kiểm tra xem nút dangnhap có tồn tại hay ko 
if (isset($_POST['dangnhap'])) {
	// Lấy dữ liệu input 
	$email = $_POST['email'];
	$matkhau = md5($_POST['password']);
	$sql = "SELECT * FROM dangky WHERE email = '" . $email . "' AND matkhau = '" . $matkhau . "' LIMIT 1";
	$row = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($row);
	if ($count > 0) {
		$row_data = mysqli_fetch_array($row);
		$_SESSION['dangky'] = $row_data['tenkhachhang'];
		$_SESSION['email'] = $row_data['email'];
		$_SESSION['id_dangky'] = $row_data['tenkhachhang'];
		header("Location: index.php?quanly=giohang");
	} else {
		echo '<p style="color: red;">Email hoặc Mật khẩu sai, vui lòng nhập lại.</p>';
		// echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
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
<!-- <style>
	* {
		font-size: 17px;
		margin: 0;
		padding: 0;
	}



	.container_form {
		position: relative;
		height: 400px;

	}

	.name-form {
		font-size: 30px;
		font-weight: bold;
		position: relative;
		left: 330px;
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

	.qmk {
		position: relative;
		left: 330px;
		top: 40px;
		color: blue;
		text-decoration: none;
	}
</style> -->
<div class="content-box">
	<h1 class="box-title tp_title">Đăng nhập khách hàng</h1>
	<form action="" autocomplete="off" method="POST" id="formAcount">
		<div class="form-group">
			<input type="text" size="50" name="email" class="form-input" placeholder="Email...">
		</div>
		<div class="form-group">
			<input type="password" size="50" name="password" class="form-input" placeholder="Mật khẩu...">
		</div>
		<div class="form-group">
			<button type="submit" name="dangnhap" value="Đăng nhập" class="btn-login">Đăng nhập </button>
		</div>
	</form>
</div>