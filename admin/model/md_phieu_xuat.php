<?php
include_once("config.php");

function tv_get_phieu_xuat(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "
        SELECT px.*, nv.MaNV, nv.TenNV, k.TenK
        FROM `phieuxuat` px
        LEFT JOIN `nhanvien` nv ON px.MaNV = nv.MaNV
        LEFT JOIN `khoa` k ON px.MaK = k.MaK
    ";
    $result = mysqli_query($conn, $query);
    return $result;
}


function tv_get_nhan_vien(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT * FROM `nhanvien`";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tv_get_sach_muon(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT MaS, TenS 
              FROM sach 
              WHERE XoaSach = '0' 
              ORDER BY TenS ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tv_get_doc_gia_muon(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT MaK, TenK 
              FROM khoa 
              ORDER BY TenK ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tv_get_quanhuyen(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT QH_Ma, QH_Ten
              FROM quanhuyen
              ORDER BY QH_Ten,QH_Ma ASC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tv_get_tra(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT DISTINCT ct.Id, ct.MaNV, nv.TenNV, ct.MaK, k.TenK, ct.MaS, s.TenS, ct.NgayTra, ct.SLTra, q.QH_Ma
              FROM cttra ct
              JOIN nhanvien nv ON ct.MaNV = nv.MaNV
              JOIN khoa k ON ct.MaK = k.MaK
              JOIN quanhuyen q ON ct.QH_Ma = q.QH_Ma
              JOIN sach s ON ct.MaS = s.MaS 
              GROUP BY ct.Id, ct.MaNV, nv.TenNV, ct.MaK, k.TenK, ct.MaS, s.TenS, ct.NgayTra, ct.SLTra, q.QH_Ma";
    $result = mysqli_query($conn, $query);
    return $result;
}

?>
