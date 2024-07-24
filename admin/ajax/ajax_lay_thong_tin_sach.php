<?php
session_start();
include_once("ajax_config.php");

function lay_thong_tin_sach($maPN) {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "
        SELECT 
            s.MaS, s.TenS, ls.TenLS, tg.TenTG, 
            nxb.TenNXB, s.NamXB, s.SoTrang, s.HinhAnhS, 
            s.SL, s.Gia, s.NgayNhap , s.MaPN
        FROM 
            sach s
        JOIN 
            tacgia tg ON s.MaTG = tg.MaTG
        JOIN 
            loaisach ls ON s.MaLS = ls.MaLS
        JOIN 
            nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
        JOIN 
            phieunhap pn ON s.MaPN = pn.MaPN
        WHERE 
            s.XoaSach = '0' 
            AND s.MaPN = '$maPN'
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
        if (isset($_GET['MaPN'])) {
            $maPN = $_GET['MaPN'];
            $data = lay_thong_tin_sach($maPN);
            echo json_encode($data);
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "Thiếu mã PN"));
            exit();
        }
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Chưa đăng nhập"));
    exit();
}
?>
