<p>Giỏ hàng
    <?php
    if (isset($_SESSION['dangky'])) {
        echo 'xin chào: ' . '<span style="color:red">' . $_SESSION['dangky'] . '</span>';
    }
    ?>
</p>
<?php
if (isset($_SESSION['giohang'])) {
    // echo '<pre>';
    // print_r($_SESSION['cart']);
    // echo '<pre>';
}
?>
<div class="container-cart">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=shipping">Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=payInfo">Thanh toán</a><span> </div>
        <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
    </div>
</div>

<table style="width: 100%; text-align: center; border-collapse: collapse ;" border="1">
    <tr>
        <th>Id</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
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
                    <a href="pages/main/add?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus fa-style"></i></a>
                    <?php echo $cart_item['soluong']; ?>
                    <a href="pages/main/addcart.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus fa-style"></i></a>
                </td>
                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' VNĐ'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ';; ?></td>
                <td><a href="pages/main/addcart.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="8">
                <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ';; ?></p> <br />
                <p style="float: right;"><a href="pages/main/addcart.php?xoatatca=1">Xóa tất cả</a></p>
                <div style="clear: both;">
                    <?php
                    if (isset($_SESSION['dangky'])) {
                    ?>
                        <p><a href="index.php?quanly=shipping">Hình thức vận chuyển</a></p>
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