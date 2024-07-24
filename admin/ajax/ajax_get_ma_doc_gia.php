<?php
session_start();
include_once("../ajax_config.php");

// Xử lý lấy thông tin chi tiết về Ma_doc_gia dựa trên MaK được gửi qua POST
if(isset($_POST['MaK'])) {
    $MaK = $_POST['MaK'];
    
    // Thực hiện các xử lý để lấy thông tin chi tiết về Ma_doc_gia
    $thong_tin_ma_doc_gia = tv_get_thong_tin_ma_doc_gia($MaK); // Điều chỉnh hàm này tùy vào cấu trúc dữ liệu
    
    // Đây là một ví dụ cơ bản, bạn cần điều chỉnh để phù hợp với dữ liệu của bạn
    echo '<p>Thông tin Ma_doc_gia: ' . $thong_tin_ma_doc_gia . '</p>';
    exit();
} else {
    // Xử lý khi không có MaK được cung cấp qua POST
    echo '<p>Không có thông tin được tìm thấy.</p>';
    exit();
}
?>
