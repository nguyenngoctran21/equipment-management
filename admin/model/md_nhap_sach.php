<?php 
	include_once("config.php");
	function tv_get_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT MaS, TenS, TenLS, SoTrang, SL, HinhAnhS FROM `sach` s, `loaisach` ls WHERE s.`MaLS` = ls.`MaLS`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_lich_su_nhap_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `nhapsach`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	
 ?>