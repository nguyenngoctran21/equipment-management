<?php 
session_start();
include_once("ajax_config.php");

function vlu_sua_lop($ngay, $ma, $ghichu) {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Sanitize inputs
    $ngay = mysqli_real_escape_string($conn, $ngay);
    $ma = mysqli_real_escape_string($conn, $ma);
    $ghichu = mysqli_real_escape_string($conn, $ghichu);

    // Check if MaS already exists
    $checkQuery = "SELECT * FROM `nhapsach` WHERE `MaS` = '$ma'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        return "exists";
    }

    // Insert new record
    $insertQuery = "
        INSERT INTO `nhapsach` (`NgayNhap`, `MaS`, `GhiChu`) 
        VALUES ('$ngay', '$ma', '$ghichu')
    ";

    if (mysqli_query($conn, $insertQuery) === TRUE) {
        return true;
    } else {
        return false;
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        $result = vlu_sua_lop($_POST['ngay'], $_POST['ma'], $_POST['ghichu']);
        if ($result === true) {
            echo "<script type=\"text/javascript\">thanhcong(\"<strong>Nhập thiết bị </strong> thành công!\")</script>";
            exit();
        } elseif ($result === "exists") {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Thiết bị đã tồn tại, không được nhập nữa!</strong>\")</script>";
            exit();
        } else {
            echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa nhập</strong> có lỗi trong quá trình nhập!\")</script>";
            exit();
        }
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
