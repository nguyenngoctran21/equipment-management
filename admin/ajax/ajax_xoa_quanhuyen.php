<?php 
	session_start();
	include_once("ajax_config.php");
	
	function qltv_xoa_quanhuyen($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		
		// Check if the district contains any classes
		if (qltv_kiem_tra_ton_tai("SELECT k.MaK FROM khoa k, quanhuyen q WHERE k.QH_Ma = q.QH_Ma AND q.QH_Ma = '$ma'
")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> không thể xóa quận huyện khi còn chứa bưu cục!\")</script>";
			exit();
		}
		
		$hoi = "DELETE FROM `quanhuyen` WHERE `QH_Ma` = '$ma'";
		
		if(mysqli_query($conn, $hoi) === TRUE)
			return true;
		else
			return false;
	}
	
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
			exit();
		}
		else{
			if (qltv_xoa_quanhuyen($_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> quận huyện ".$_POST['ma']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
				exit();
			}
		}
	}
	else{
		header("Location: ../login.php");
		exit();
	}
 ?>
