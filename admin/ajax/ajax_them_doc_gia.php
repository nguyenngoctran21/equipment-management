<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_lop($ma, $ten, $tdn, $sinh, $lap, $diachi, $lop, $mail){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã tên người dùng không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên người dùng không để trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ không để trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ mail không để trống!\")</script>";
			exit();
		}
		// kiem tra ngay sinh
		$date1=date_create(date('Y-m-d'));
		$date2=date_create($sinh);
		$diff=date_diff($date2,$date1);
		$ktngay=$diff->format("%R%a");
		settype($ktngay, 'int');
		if($ktngay<6570){
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> người dùng phải đủ, trên 18 tuổi!\")</script>";
			exit();
		}
		$mk = md5("123456");
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoitdn = "
				SELECT `TaiKhoanDG` FROM `docgia` WHERE BINARY `TaiKhoanDG` = '$tdn'
		";
		$tdnex = mysqli_query($conn, $hoitdn);
		$demtdn = mysqli_num_rows($tdnex);
		if ($demtdn>0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập đã tồn tại, vui lòng chọn lại tên đăng nhập!\")</script>";
			exit();
		}
		$hoi = "
				INSERT INTO `docgia`(`Id`,`MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, `MaL`,`Mail`) VALUES (null,'$ma','$ten','$sinh','$diachi','$lap','$tdn','$mk','$lop','$mail')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_them_lop($_POST['ma'],$_POST['ten'],$_POST['tdn'],$_POST['sinh'],$_POST['lap'],$_POST['diachi'],$_POST['lop'],$_POST['mail'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> người dùng!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>