<?php 
session_start();
include_once("ajax_config.php");

function generate_ma_px() {
    // Create a unique MaPX based on the current date and time in the format DD/MM/YYYY-HH-MM-SS
    return date('dmYHis');
}

function vlu_them_phieuxuat($ngay, $mota, $nv,$dg) {
    if (empty($ngay)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> ngày không để trống!\")</script>";
        exit();
    }
    $ma = generate_ma_px();

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    
    // Assuming `phieuxuat` table has a primary key named `MaPX`, checking for its existence
    if (qltv_kiem_tra_ton_tai("SELECT `MaPX` FROM `phieuxuat` WHERE BINARY `MaPX` = '$ma'")) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã phiếu xuất <b>".$ma."</b> đã tồn tại, vui lòng thử lại!\")</script>";
        exit();
    }

    $hoi = "INSERT INTO `phieuxuat`(`MaPX`, `Ngayxuat`, `MoTa`, `MaNV`, `MaK`) VALUES ('$ma','$ngay','$mota','$nv','$dg')";
    
    if(mysqli_query($conn, $hoi) === TRUE)
        return true;
    else
        return false;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (vlu_them_phieuxuat($_POST['ngay'], $_POST['mota'], $_POST['nv'], $_POST['dg'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> phiếu xuất đã được thêm!\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm phiếu xuất!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
