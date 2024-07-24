<?php 
	session_start();
	include_once("ajax_config.php");

	function thanh_ly_thiet_bi($ngay, $ma, $ghichu) {
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();

		// Check if the equipment is currently on loan
		$check_loan = "SELECT COUNT(*) AS count FROM `muontra` WHERE `MaS` = '$ma' AND `TrangThai` = 0";
		$result = mysqli_query($conn, $check_loan);
		$row = mysqli_fetch_assoc($result);

		if ($row['count'] > 0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thể thanh lý</strong> thiết bị đang được xuất kho!\")</script>";
			exit();
		}

		// Insert a new record into the xuatsach table
		$hoi = "INSERT INTO `xuatsach`(`NgayXuat`, `MaS`, `GhiChu`) VALUES ('$ngay','$ma','$ghichu')";

		if (mysqli_query($conn, $hoi) === TRUE) {
			// Delete the equipment from the sach table based on MaS
			$delete_thiet_bi = "DELETE FROM `sach` WHERE `MaS` = '$ma'";

			if (mysqli_query($conn, $delete_thiet_bi) === TRUE) {
				return true;
			} else {
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa thiết bị!\")</script>";
				exit();
			}
		} else {
			return false;
		}
	}

	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
			header("Location: ../login.php");
		} else {
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ngay']) && isset($_POST['ma']) && isset($_POST['ghichu'])) {
				$ngay = $_POST['ngay'];
				$ma = $_POST['ma'];
				$ghichu = $_POST['ghichu'];

				if (thanh_ly_thiet_bi($ngay, $ma, $ghichu)) {
					echo "<script type=\"text/javascript\">thanhcong(\"<strong>Thanh lý thiết bị</strong> thành công!\")</script>";
					exit();
				} else {
					echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thanh lý</strong> có lỗi trong quá trình thanh lý thiết bị!\")</script>";
					exit();
				}
			}
		}
	} else {
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
?>
