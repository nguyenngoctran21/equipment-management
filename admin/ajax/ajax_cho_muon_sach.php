<?php
session_start();
include_once("ajax_config.php");

function vlu_them_khoa($s, $dg,  $nv, $px, $qh_ma)
{
    if (empty($s)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xuất</strong> mã - tên thiết bị không được để trống!\")</script>";
        exit();
    }


 

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    $check_device = "SELECT `MaS` FROM `sach` WHERE `MaS` = '$s'";
    $result_check_device = mysqli_query($conn, $check_device);
    if (mysqli_num_rows($result_check_device) == 0) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xuất</strong> mã thiết bị sai!\")</script>";
        exit();
    }

    $check_borrow = "SELECT `TrangThai` FROM `muontra` WHERE `MaS` = '$s' AND `TrangThai` = 0";
    $result_check_borrow = mysqli_query($conn, $check_borrow);
    if (mysqli_num_rows($result_check_borrow) > 0) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xuất</strong> thiết bị đã được xuất!\")</script>";
        exit();
    }

    $hoi = "
        INSERT INTO `muontra`(`MaNV`, `MaK`, `MaS`, `MaPX`, `QH_Ma`) 
        VALUES ('$nv','$dg','$s','$px','$qh_ma')
    ";

    if (mysqli_query($conn, $hoi) === TRUE)
        return true;
    else
        return false;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (vlu_them_khoa($_POST['s'], $_POST['dg'], $_POST['nv'], $_POST['px'], $_POST['qh_ma'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xuất</strong> thiết bị!\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xuất</strong> có lỗi trong quá trình xuất !\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
