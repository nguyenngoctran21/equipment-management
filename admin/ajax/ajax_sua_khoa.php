<?php 
session_start();
include_once("ajax_config.php");

function vlu_sua_ls($ma, $ten, $diachi, $sdt, $maqh, $maold){
    if (empty($ma)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã bưu cục không để trống!\")</script>";
        exit();
    }
    if (empty($ten)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên bưu cục không để trống!\")</script>";
        exit();
    }
    if (empty($diachi)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ bưu cục không để trống!\")</script>";
        exit();
    }
    if (empty($sdt)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số điện thoại bưu cục không để trống!\")</script>";
        exit();
    }

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Check if the new MaK already exists, except the old MaK
    $hoimakhoa = "SELECT `MaK` FROM `khoa` WHERE `MaK` = ? AND `MaK` != ?";
    $stmt = $conn->prepare($hoimakhoa);
    $stmt->bind_param("ss", $ma, $maold);
    $stmt->execute();
    $stmt->store_result();
    $demmakhoa = $stmt->num_rows;
    $stmt->close();

    if ($demmakhoa > 0) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã bưu cục <b>$ma</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
        exit();
    }

    // Update the record
    $hoi = "
        UPDATE `khoa` 
        SET 
            `MaK` = ?, 
            `TenK` = ?, 
            `DiaChiK` = ?, 
            `SDT` = ?, 
            `QH_Ma` = ? 
        WHERE 
            `MaK` = ?
    ";
    $stmt = $conn->prepare($hoi);
    $stmt->bind_param("ssssss", $ma, $ten, $diachi, $sdt, $maqh, $maold);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (vlu_sua_ls($_POST['ma'], $_POST['ten'], $_POST['diachi'], $_POST['sdt'], $_POST['maqh'], $_POST['maold'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> bưu cục {$_POST['ma']} đã được cập nhật!\")</script>";
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật!\")</script>";
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
