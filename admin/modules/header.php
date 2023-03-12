<div id="top">
    <div class="top-content">
        <div class="top-left">
            <h2>Chào : <?php if (isset($_SESSION['dangnhap'])) {
                            echo $_SESSION['dangnhap'];
                        } ?></h2>
        </div>
        <div class="logout">
            <?php
            if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
                unset($_SESSION['dangnhap']);
                header('Location: login.php');
            }
            ?>
            <a href="index.php?">Trang chủ</a>
            <a href="index.php?dangxuat=1">Đăng xuất</a>
        </div>
    </div>
</div>