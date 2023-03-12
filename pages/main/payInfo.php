<p>Hình thức thanh toán</p>
<div class="container-cart">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step done"> <span><a href="index.php?quanly=shipping">Vận chuyển</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=payInfo">Thanh toán</a><span> </div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
    </div>
    <form action="pages/main/payProcess.php" method="POST">
        <div class="tbl-content">
            <?php
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_getShipping = mysqli_query($mysqli, "SELECT * FROM shipping WHERE id_dangky='$id_dangky' LIMIT 1");
            $count = mysqli_num_rows($sql_getShipping);
            if ($count > 0) {
                $row_getShipping = mysqli_fetch_array($sql_getShipping);
                $name = $row_getShipping['name'];
                $phone = $row_getShipping['phone'];
                $address = $row_getShipping['address'];
                $note = $row_getShipping['note'];
            } else {

                $name = '';
                $phone = '';
                $address = '';
                $note = '';
            }
            ?>

            <div class="info-shipping-cart">
                <h4>Thông tin vận chuyển và giỏ hàng</h4>
                <ul>
                    <li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
                    <li>Số điện thoại : <b><?php echo $phone ?></b></li>
                    <li>Địa chỉ : <b><?php echo $address ?></b></li>
                    <li>Ghi chú : <b><?php echo $note ?></b></li>
                </ul>
                <h5>Giỏ hàng của bạn</h5>
                <!-- CART -->
                <table style="width: 100%; text-align: center; border-collapse: collapse ;" border="1">
                    <tr>
                        <th>Id</th>
                        <th>Mã sp</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    if (isset($_SESSION['giohang'])) {
                        $i = 0;
                        $tongtien = 0;
                        foreach ($_SESSION['giohang'] as $cart_item) {
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                            $tongtien += $thanhtien;
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $cart_item['masp']; ?></td>
                                <td><?php echo $cart_item['tensanpham']; ?></td>
                                <td><img src="admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
                                <td>
                                    <a href="pages/main/addcart.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus fa-style"></i></a>
                                    <?php echo $cart_item['soluong']; ?>
                                    <a href="pages/main/addcart.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus fa-style"></i></a>
                                </td>
                                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' VNĐ'; ?></td>
                                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ';; ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="8">
                                <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ';; ?></p> <br />

                                <div style="clear: both;"></div>

                            </td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td colspan="8">
                                <p>Hiện tại giỏ hàng trống</p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <style type="text/css">
                .col-md-4.hinhthucthanhtoan .form-check {
                    margin: 11px;
                }
            </style>

            <div class="col-md-4 hinhthucthanhtoan">
                <h4>Phương thức thanh toán</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="cash" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tiền mặt
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="moneyTransfer">
                    <label class="form-check-label" for="exampleRadios2">
                        Chuyển khoản
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="momo">
                    <img src="../../images/momo.png" height="32" width="32">
                    <label class="form-check-label" for="exampleRadios3">
                        MOMO
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
                    <img src="../../images/vnpay.png" height="20" width="64">
                    <label class="form-check-label" for="exampleRadios4">
                        Vnpay
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="zalopay">
                    <img src="../../images/ZaloPay.png" height="32" width="32">
                    <label class="form-check-label" for="exampleRadios5">
                        ZaloPay
                    </label>
                </div>
                <input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-pay">

    </form>
    <p></p>
    <input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">

    <div id="paypal-button"></div>

    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/xulythanhtoanmomo.php">
        <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
        <input type="submit" name="momo" value="Thanh toán MOMO QRcode" class="btn btn-danger">

    </form>

    <p></p>

    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/xulythanhtoanmomo_atm.php">
        <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
        <input type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">

    </form>
    <p></p>
    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="pages/main/onepay.php">
        <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
        <input type="submit" name="momo" value="Thanh toán ONEPAY" class="btn btn-danger">

    </form>
</div>

<style>
    .sidebar {
        display: none;
    }

    .slider-container {
        display: none;
    }

    .main-content {
        width: 100%;
    }
    table a {
        text-decoration: none;
        color: #0000EE;
    }
    table a:hover {
        text-decoration: underline;
    }
</style>