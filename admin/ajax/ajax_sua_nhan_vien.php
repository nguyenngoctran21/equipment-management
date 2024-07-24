<?php 
	session_start();
	include_once("ajax_config.php");

	function vlu_them_lop($ma, $mail, $loai, $hspc, $id, $maold){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã nhân viên không để trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ mail không để trống!\")</script>";
			exit();
		}
		if (empty($hspc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> HSPC không để trống!\")</script>";
			exit();
		}
		settype($hspc, 'float');

		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();

		// Check if the new MaNV already exists except for the current one
		$hoima = "
			SELECT `MaNV` FROM `nhanvien` WHERE `MaNV` = '$ma' AND `MaNV` NOT IN (SELECT `MaNV` FROM `nhanvien` WHERE `MaNV` = '$maold')
		";
		$maex = mysqli_query($conn, $hoima);
		$demma = mysqli_num_rows($maex);
		if ($demma > 0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã đã tồn tại, vui lòng chọn lại mã nhân viên!\")</script>";
			exit();
		}

		$hoi = "
			UPDATE `nhanvien` 
			SET 
				`MaNV`='$ma',
				`Mail`='$mail',
				`HeSoPhuCap`='$hspc',
				`LoaiNV`='$loai'
			WHERE 
				`Id` = '$id'
		";
		if(mysqli_query($conn, $hoi) === TRUE)
			return true;
		else
			return false;
	}

	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
			echo "<script type=\"text/javascript\">trangdangnhap()</script>";
			exit();
		} else {
			if (vlu_them_lop($_POST['ma'], $_POST['mail'], $_POST['loai'], $_POST['hspc'], $_POST['id'], $_POST['maold'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> nhân viên!\")</script>";
				exit();
			} else {
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình lưu!\")</script>";
				exit();
			}
		}
	} else {
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
?>
