<?php
session_start();
include_once("ajax_config.php");

function xoa_thiet_bi($maS) {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    // Sử dụng chuẩn bị truy vấn để tránh SQL Injection
    $stmt = $conn->prepare("DELETE FROM muontra WHERE MaS = ?");
    $stmt->bind_param("s", $maS);

    if ($stmt->execute()) {
        $stmt->close();
        mysqli_close($conn);
        return true;
    } else {
        $stmt->close();
        mysqli_close($conn);
        return false;
    }
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        echo json_encode(array("status" => "error", "message" => "Chưa đăng nhập"));
        exit();
    } else {
        if (isset($_POST['MaS'])) {
            $maS = $_POST['MaS'];
            if (xoa_thiet_bi($maS)) {
                echo json_encode(array("status" => "success", "message" => "Xóa thiết bị thành công"));
                exit();
            } else {
                echo json_encode(array("status" => "error", "message" => "Lỗi khi xóa thiết bị"));
                exit();
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Thiếu mã thiết bị"));
            exit();
        }
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Chưa đăng nhập"));
    exit();
}
?>
