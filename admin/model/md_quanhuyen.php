<?php 
	include_once("config.php");
	function tv_get_quanhuyen(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `quanhuyen`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>