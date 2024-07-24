<?php 
include_once("config.php");

function tv_get_phieu_nhap(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "
        SELECT pn.*, nv.MaNV, nv.TenNV
        FROM `phieunhap` pn
        LEFT JOIN `nhanvien` nv ON pn.MaNV = nv.MaNV
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
function tv_get_sach_theo_phieu_nhap(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `phieunhap`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
    function tv_get_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT s.MaS, s.TenS, ls.MaLS, ls.TenLS, tg.MaTG, tg.TenTG, nxb.MaNXB, nxb.TenNXB, s.NamXB, s.SoTrang, s.HinhAnhS, s.SL, s.Gia, s.NgayNhap, pn.MaPN
				  FROM sach s
				  JOIN tacgia tg ON s.MaTG = tg.MaTG
				  JOIN loaisach ls ON s.MaLS = ls.MaLS
				  JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
				  JOIN phieunhap pn ON s.MaPN = pn.MaPN
				  WHERE s.XoaSach = '0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
?>
