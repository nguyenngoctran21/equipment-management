<?php
session_start();
include_once("ajax_config.php");

// Kiểm tra xem QH_Ma có được gửi qua POST không
if(isset($_POST['QH_Ma'])) {
    $QH_Ma = $_POST['QH_Ma'];
    
    // Truy vấn để lấy MaK và TenK dựa trên QH_Ma
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    
    // Chuẩn bị câu lệnh SQL (nên kiểm tra và xử lý nhập liệu để ngăn chặn tấn công SQL injection)
    $query = "SELECT MaK, TenK FROM khoa WHERE QH_Ma = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $QH_Ma);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Chuẩn bị mảng phản hồi
    $response = array();

    $output = '<option value="">Select Post Office</option>';
    // Lặp qua các hàng và thêm vào mảng phản hồi
    while ($row = $result->fetch_assoc()) {
        // $response[] = $row;
        $output .= "<option value='{$row['MaK']}'>{$row['TenK']}</option>";
    }
    
    echo $output;
    // // Đóng câu lệnh và kết nối
    // $stmt->close();
    // mysqli_close($conn);
    
    // // Trả về phản hồi dưới dạng JSON
    // echo json_encode($response);
    exit();
} else {
    // Nếu không có QH_Ma được cung cấp qua POST, trả về lỗi hoặc xử lý tương ứng
    echo json_encode(array('error' => 'QH_Ma không được cung cấp'));
    exit();
}
?>
