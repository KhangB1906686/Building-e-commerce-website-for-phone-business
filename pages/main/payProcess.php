<?php
session_start();
include('../../admin/config/config.php');
require('../../mail/sendmail.php');

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$cart_payment = $_POST['payment'];
//get id_shipping
$id_dangky = $_SESSION['id_khachhang'];
$sql_getShipping = mysqli_query($mysqli, "SELECT * FROM shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
$row_getShipping = mysqli_fetch_array($sql_getShipping);
$id_shipping = $row_getShipping['id_shipping'];
// insert cart
$insert_cart = "INSERT INTO cart(id_khachhang,code_cart,cart_status,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $cart_payment . "','" . $id_shipping . "')";
$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) {
    // add cart details
    foreach ($_SESSION['giohang'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($mysqli, $insert_order_details);
    }
    $tieude = "Đặt hàng website didongcantho.net thành công!";
    $noidung =  "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : " . $code_order . "</p>";
    $noidung =  "<h4>Đơn hàng đặt bao gồm :</h4>";

    foreach ($_SESSION['giohang'] as $key => $val) {
        $noidung .= "<ul style='border: 1px solid blue; margin: 10px;'>
          <li>" . $val['tensanpham'] . "</li>
          <li>" . $val['masp'] . "</li>
          <li>" . number_format($val['giasp'], 0, ',', '.') . "đ</li>
          <li>" . $val['soluong'] . "</li>
          </ul> ";
    }
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
}
unset($_SESSION['giohang']);
header('Location:../../index.php?quanly=camon');
?>