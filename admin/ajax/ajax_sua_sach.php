<?php 
session_start();
include_once("ajax_config.php");

function tv_sua_sach($mas, $ten, $ls, $tg, $nxb, $nam, $trang, $luong, $nhap, $gia, $maold, $pn) {
    if (empty($ten)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên sách không để trống!\")</script>";
        exit();
    }
    if (empty($nam)) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> năm xuất bản không để trống!\")</script>";
        exit();
    }

    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Check if the new MaS already exists and is different from the old one
    $query = "SELECT `MaS` FROM `sach` WHERE `MaS` = ? AND `MaS` <> ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $mas, $maold);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã sách <b>" . $mas . "</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
        exit();
    }
    $stmt->close();

    // Update the book details
    $query = "
        UPDATE `sach` 
        SET 
            `MaPN` = ?,
            `MaS` = ?,
            `TenS` = ?,
            `MaLS` = ?,
            `MaTG` = ?,
            `MaNXB` = ?,
            `NamXB` = ?,
            `SoTrang` = ?,
            `SL` = ?,
            `Gia` = ?,
            `NgayNhap` = ?
        WHERE 
            `MaS` = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssssssss', $pn, $mas, $ten, $ls, $tg, $nxb, $nam, $trang, $luong, $nhap, $gia, $maold);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        if (tv_sua_sach($_POST['mas'], $_POST['ten'], $_POST['ls'], $_POST['tg'], $_POST['nxb'], $_POST['nam'], $_POST['trang'], $_POST['luong'], $_POST['gia'], $_POST['nhap'], $_POST['maold'], $_POST['pn'])) {
            echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã cập nhật</strong> sách " . htmlspecialchars($_POST['ten']) . "!\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cập nhật</strong> có lỗi trong quá trình cập nhật!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
