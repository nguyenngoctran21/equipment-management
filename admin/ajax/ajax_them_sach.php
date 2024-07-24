<?php 
	session_start();
	include_once("ajax_config.php");

	function tv_them_sach($mas, $ten, $ls, $tg, $nxb, $nam, $trang, $luong, $gia, $nhap, $anh,$pn) {
		if (empty($mas)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã thiết bị không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên thiết bị không để trống!\")</script>";
			exit();
		}
		if (empty($nam)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> năm không để trống!\")</script>";
			exit();
		}
		if (empty($gia)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> giá không để trống!\")</script>";
			exit();
		}
		if (empty($nhap)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> giá không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			INSERT INTO `sach`(`MaS`, `TenS`, `MaLS`, `MaTG`, `MaNXB`, `NamXB`, `SoTrang`, `HinhAnhS`, `SL`, `Gia`, `NgayNhap`,`MaPN`) 
			VALUES ('$mas', '$ten', '$ls', '$tg', '$nxb', $nam, '$trang', '$anh', '$luong', '$gia', '$nhap', '$pn')
		";
		if (mysqli_query($conn, $hoi) === TRUE) {
			return true;
		} else {
			return false;
		}
	}

	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
			header("Location: ../login.php");
		} else {
			if (tv_them_sach($_POST['mas'], $_POST['ten'], $_POST['ls'], $_POST['tg'], $_POST['nxb'], $_POST['nam'], $_POST['trang'], $_POST['luong'], $_POST['gia'], $_POST['nhap'], $_POST['anh'], $_POST['pn'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã thêm</strong> thiết bị ".$_POST['ten']."!\")</script>";
				exit();
			} else {
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	} else {
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
?>
