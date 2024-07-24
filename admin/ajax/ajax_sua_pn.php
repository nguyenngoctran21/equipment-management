<?php 
session_start();
include_once("ajax_config.php");

function vlu_sua_phieunhap($ngay, $mota, $maold) {
    if (empty($ngay)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> ngày phiếu xuất không để trống!\")</script>";
        exit();
    }

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Update the record
    $hoi = "UPDATE `phieunhap` 
            SET 
                `Ngaynhap`='$ngay',
                `MoTa`='$mota'
            WHERE 
                `MaPN` = '$maold'";

    if (mysqli_query($conn, $hoi) === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (vlu_sua_phieunhap($_POST['ngay'], $_POST['mota'], $_POST['maold'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> phiếu xuất ".$_POST['maold']." đã được cập nhật!\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật phiếu xuất!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
