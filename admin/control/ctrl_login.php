<?php
include_once("../model/md_login.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (tv_login($_POST['username'], $_POST['password'])) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: ..");
    } else {
        // Nếu đăng nhập không thành công, chuyển hướng về trang đăng nhập và hiển thị thông báo "Sai mật khẩu"
        header("Location: ../login.php?error=wrong_password");
    }
} else {
    header("Location: ../login.php");
}
?>
