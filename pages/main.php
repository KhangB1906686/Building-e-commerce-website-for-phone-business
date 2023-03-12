<div class="wrapper">
    <div class="top-main"></div>
    <div class="grid">
        <div id="main" class="main-container row sm-gutter">
            <?php
            include("sidebar/sidebar.php");
            ?>
            <div class="main-content col l-10 m-12 c-12">
                <?php
                if (isset($_GET['quanly'])) {
                    $tam = $_GET['quanly'];
                } else {
                    $tam = '';
                }
                if ($tam == 'danhmucsanpham') {
                    include("main/danhmuc.php");
                } elseif ($tam == 'giohang') {
                    include("main/cart.php");
                } elseif ($tam == 'danhmucbaiviet') {
                    include("main/danhmucbaiviet.php");
                } elseif ($tam == 'baiviet') {
                    include("main/baiviet.php");
                } elseif ($tam == 'tintuc') {
                    include("main/tintuc.php");
                } elseif ($tam == 'lienhe') {
                    include("main/lienhe.php");
                } elseif ($tam == 'sanpham') {
                    include("main/sanpham.php");
                } elseif ($tam == 'dangky') {
                    include("main/dangky.php");
                } elseif ($tam == 'thanhtoan') {
                    include("main/thanhtoan.php");
                } elseif ($tam == 'dangnhap') {
                    include("main/dangnhap.php");
                } elseif ($tam == 'timkiem') {
                    include("main/timkiem.php");
                } elseif ($tam == 'camon') {
                    include("main/camon.php");
                } elseif ($tam == 'thaydoimatkhau') {
                    include("main/thaydoimatkhau.php");
                } elseif ($tam == 'shipping') {
                    include("main/shipping.php");
                } elseif ($tam == 'payInfo') {
                    include("main/payInfo.php");
                } elseif ($tam == 'donhangdadat') {
                    include("main/orderPlaced.php");
                } elseif ($tam == 'lichsudonhang') {
                    include("main/orderHistory.php");
                } elseif ($tam == 'xemdonhang') {
                    include("main/xemdonhang.php");
                } else {
                    include("main/index.php");
                }
                ?>
            </div>
        </div>
    </div>

</div>