<p>Thông tin vận chuyển</p>
<div class="container-cart">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=shipping">Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=payInfo">Thanh toán</a><span> </div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
    </div>
    <div class="tbl-shipping">
        <h4>Thông tin vận chuyển</h4>
        <?php
        if (isset($_POST['addShipping'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_addShipping = mysqli_query($mysqli, "INSERT INTO shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
            if ($sql_addShipping) {
                echo '<script>alert("Thêm vận chuyển thành công")</script>';
            }
        } elseif (isset($_POST['updateShipping'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_updateShipping = mysqli_query($mysqli, "UPDATE shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
            if ($sql_updateShipping) {
                echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
            }
        }
        ?>
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
            <div class="row-form">
                <form action="" autocomplete="off" method="POST">
                    <div class="form-group">
                        <label for="email">Họ và tên</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="...">
                    </div>
                    <div class="form-group">
                        <label for="email">Ghi chú</label>
                        <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...">
                    </div>
                    <?php
                    if ($name == '' && $phone == '') {
                    ?>
                        <button type="submit" name="addShipping" class="btn btn-add">Thêm vận chuyển</button>
                    <?php
                    } elseif ($name != '' && $phone != '') {
                    ?>
                        <button type="submit" name="updateShipping" class="btn btn-update">Cập nhật vận chuyển</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
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

                    <div style="clear: both;">
                        <?php
                        if (isset($_SESSION['dangky'])) {
                        ?>
                            <p><a href="index.php?quanly=payInfo">Thanh toán</a></p>
                        <?php
                        } else {
                        ?>
                            <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                        <?php
                        }
                        ?>

                    </div>
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