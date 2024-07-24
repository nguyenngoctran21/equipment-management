<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_xoa_doc_gia($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `docgia`
			SET 
				`TrangThai` = '1' 
			WHERE `Id` = '$ma'
		";
		if(mysqli_query($conn, $hoi) === TRUE) {
			return true;
		} else {
			error_log("Error updating record: " . mysqli_error($conn));
			return false;
		}
	}
	
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'], $_SESSION['password'])){
			header("Location: ../login.php");
		} else {
			if (tv_xoa_doc_gia($_POST['ma'])) {
				echo "<script type=\"text/javascript\">dongxoa();thanhcong(\"<strong>Đã xóa</strong> thông tin nhân!\");tailai();</script>";
			} else {
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
			}
		}
	} else {
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
	}
	