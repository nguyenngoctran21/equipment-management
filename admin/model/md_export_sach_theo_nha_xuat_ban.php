<?php 
	include_once("config.php");
	function tv_get_sach_theo_nha_xuat_ban(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT  khoa.* FROM phieuxuat
								JOIN khoa ON khoa.MaK = phieuxuat.MaK
								JOIN muontra ON muontra.MaPX = phieuxuat.MaPX
								JOIN sach ON sach.MaS = muontra.MaS";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>