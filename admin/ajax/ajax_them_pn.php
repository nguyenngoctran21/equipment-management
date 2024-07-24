<?php 
session_start();
include_once("ajax_config.php");

function generate_ma_pn() {
    // Create a unique MaPX based on the current date and time in the format DD/MM/YYYY-HH-MM-SS
    return date('dmYHis');
}

function vlu_them_phieuxuat($ngay, $mota, $nv) {
    if (empty($ngay)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> ngày không để trống!\")</script>";
        exit();
    }
    $ma = generate_ma_pn();

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    
    // Assuming `phieuxuat` table has a primary key named `MaPX`, checking for its existence

    $hoi = "INSERT INTO `phieunhap`(`MaPN`, `Ngaynhap`, `MoTa`, `MaNV`) VALUES ('$ma','$ngay','$mota','$nv')";
    
    if(mysqli_query($conn, $hoi) === TRUE)
        return true;
    else
        return false;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (vlu_them_phieuxuat($_POST['ngay'], $_POST['mota'], $_POST['nv'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> phiếu nhập đã được thêm!\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm phiếu nhập!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
