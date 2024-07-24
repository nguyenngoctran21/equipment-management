<?php 
session_start();
include_once("ajax_config.php");

function tv_xoa_nhan_vien($id){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Sử dụng câu lệnh chuẩn bị để ngăn chặn SQL Injection
    $stmt = $conn->prepare("DELETE FROM `nhanvien` WHERE `Id` = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
        exit();
    } else {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            if (tv_xoa_nhan_vien($_POST['id'])) {
                echo "<script type=\"text/javascript\">dongxoa();thanhcong(\"<strong>Đã xóa</strong> thông tin nhân viên!\");tailai();</script>";
                exit();
            } else {
                echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
                exit();
            }
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> ID không hợp lệ!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
