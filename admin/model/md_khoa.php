<?php 
	include_once("config.php");
	function tv_get_khoa(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `khoa`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_get_quanhuyen(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `quanhuyen`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>