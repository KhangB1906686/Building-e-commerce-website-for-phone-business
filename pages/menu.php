<?php
ob_start();
$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<div class="menu">
    <div class="menu-content">
        <div class="topbar"></div>
        <nav class="container">
            <div class="logo-main">
                <div href="#" id="logo">
                    <!-- <img src="../images/logo.png" alt=""> -->
                </div>
            </div>


            <ul class="list-menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php">Sản phẩm</a>
                    <ul class="sub-menu">
                        <?php
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>

                            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>

                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <li><a href="index.php?quanly=lichsudonhang">Lịch sử đơn hàng</a></li>
                <?php
                }
                ?>

                <li><a href="index.php?quanly=tintuc">Tin tức</a>
                    <ul class="sub-menu">
                        <li><a href="">Menu 2.1</a></li>
                        <li><a href="">Menu 2.2</a>
                            <ul class="sub-menu">
                                <li><a href="">Menu 2.2.1</a></li>
                                <li><a href="">Menu 2.2.2</a></li>
                                <li><a href="">Menu 2.2.3</a>
                                    <ul class="sub-menu">
                                        <li><a href="">Menu 2.2.2.1</a></li>
                                        <li><a href="">Menu 2.2.2.2</a></li>
                                        <li><a href="">Menu 2.2.2.3</a></li>
                                        <li><a href="">Menu 2.2.2.4</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Menu 2.2.4</a></li>
                            </ul>
                        </li>
                        <li><a href="">Menu 2.3</a></li>
                        <li><a href="">Menu 2.4</a></li>
                    </ul>
                </li>
                <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
            </ul>
            <div class="others">
                <div class="others-border">
                    <li>
                        <i class="btn-search fas fa-search"></i>
                        <form class="nav-form-search" name="nav-form-search" action="index.php?quanly=timkiem" method="POST">
                            <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa" class="input">
                            <input type="submit" name="timkiem" value="Tìm kiếm" class="trigger_search">
                        </form>
                    </li>
                </div>
                <div class="others-border">
                    <div class="others-user account-box">
                        <span class="user-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <ul>
                            <?php
                            if (isset($_SESSION['dangky'])) {
                            ?>
                                <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                                <!-- <li><a href="index.php?quanly=thaydoimatkhau">Quên mật khẩu</a></li> -->
                            <?php
                            } else {
                            ?>
                                <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
                                <li><a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="others-border">
                    <div class="others-user cart-mini">
                        <a href="index.php?quanly=giohang">
                            <span class="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="cart-text">Giỏ hàng</span> &nbsp;(<span class="hd-cart-count">0</span>)
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <div class="slider">
        <div class="slider-container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <div class="slider-content-left-top-container">
                        <div class="slider-content-left-top">
                            <a href=""><img src="../images/Vivo-Y15s-(2021)-1020x570.jpg" alt=""></a>
                            <a href=""><img src="../images/-iphone-11-thietke.jpg" alt=""></a>
                            <a href=""><img src="../images/vi-vn-iphone-14-pro--(7).jpg" alt=""></a>
                            <a href=""><img src="../images/Artboard3-1020x570.jpg" alt=""></a>
                            <a href=""><img src="../images/oppo-reno8-pro---7--1020x570.jpg" alt=""></a>
                        </div>
                        <div class="slider-content-left-top-btn">
                            <i class="fas fa-chevron-left"></i>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div class="slider-content-left-bottom">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .visible-form-search {
        visibility: visible !important;
    }

    .nav-form-search--active {
        display: flex !important;
    }

    .nav-form-search {
        position: absolute;
        top: 50%;
        right: 100%;
        height: 40px;
        display: flex;
        /* align-items: center; */
        transform: translateY(-50%);
        padding: 5px;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 3px;
        display: none;
        animation: animationForm ease 0.5s;
    }

    @keyframes animationForm {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 50%;
            opacity: 1;
        }
    }
</style>

<script>
    btnSearch = document.querySelector('.btn-search');
    formSearch = document.forms['nav-form-search']
    console.log(formSearch.tukhoa);
    var isClick = true;
    btnSearch.addEventListener('click', function(e) {
        if (isClick) {
            formSearch.classList.add('nav-form-search--active')
            formSearch.tukhoa.classList.add('visible-form-search')
            formSearch.timkiem.classList.add('visible-form-search')
            isClick = false;
        } else {
            formSearch.classList.remove('nav-form-search--active')
            formSearch.tukhoa.classList.remove('visible-form-search')
            formSearch.timkiem.classList.remove('visible-form-search')
            isClick = true
        }
    });
</script>