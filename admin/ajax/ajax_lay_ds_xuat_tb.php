<?php
session_start();
include_once("ajax_config.php");

function tv_get_muon($maPX) {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "
        SELECT 
            m.Id, 
            nv.Id as 'IdNV', 
            m.MaNV, 
            nv.TenNV, 
            m.MaS, 
            s.TenS, 
            m.TrangThai, 
            m.SLMuon, 
            m.GiaHan, 
            m.SLThucTe, 
            px.MaPX
        FROM 
            muontra m
        JOIN 
            nhanvien nv ON m.MaNV = nv.MaNV
        JOIN 
            sach s ON m.MaS = s.MaS 
        JOIN 
            phieuxuat px ON m.MaPX = px.MaPX
        WHERE 
            px.MaPX = '$maPX'
        ORDER BY 
            m.Id DESC
    ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode(array("status" => "error", "message" => "Query error: " . mysqli_error($conn)));
        return;
    }
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);
    return $data;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        echo json_encode(array("status" => "error", "message" => "Chưa đăng nhập"));
        exit();
    } else {
        if (isset($_GET['MaPX'])) {
            $maPX = $_GET['MaPX'];
            $data = tv_get_muon($maPX);
            echo json_encode($data);
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "Thiếu mã PX"));
            exit();
        }
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Chưa đăng nhập"));
    exit();
}
?>
