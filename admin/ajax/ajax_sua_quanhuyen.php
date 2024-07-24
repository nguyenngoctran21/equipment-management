<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_ls($ma, $ten, $maold){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã quanhuyen không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên quanhuyen không để trống!\")</script>";
			exit();
		}
		
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoimaquanhuyen = "
				SELECT `QH_Ma` FROM `quanhuyen` WHERE (BINARY `QH_Ma` = '$ma') and QH_Ma NOT IN (SELECT QH_Ma FROM quanhuyen WHERE QH_Ma = '$maold')
		";
		$tenquanhuyen = mysqli_query($conn, $hoimaquanhuyen);
		$demmaquanhuyen = mysqli_num_rows($tenquanhuyen);
		if ($demmaquanhuyen>0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã quanhuyen <b>".$ma."</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
			exit();
		}
		$hoi = "
        UPDATE `quanhuyen` 
        SET 
            `QH_Ma`='$ma',
            `QH_Ten`='$ten'
        WHERE 
            `QH_Ma` = '$maold'
        
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_sua_ls($_POST['ma'],$_POST['ten'],$_POST['maold'])){
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> quận huyện ".$_POST['ma']." đã được cập nhật!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>