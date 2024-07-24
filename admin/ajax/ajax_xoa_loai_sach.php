<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_ls($loai){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				DELETE FROM `loaisach` WHERE `MaLS` = '$loai'
		";
		// Kiểm tra xem có tồn tại trong bảng Thiết bị hay chưa, nếu chưa tồn tại thì không thể xóa
		$kiemtra = "Select count(MaLS) as so from sach where MaLS = '$loai'";
		$kiemtra_ec = mysqli_query($conn, $kiemtra);
		$dem_kiemtra = mysqli_num_rows($kiemtra_ec);
		if ($dem_kiemtra > 0){
			$mang_kiemtra = mysqli_fetch_array($kiemtra_ec);
			if($mang_kiemtra[0] > 0){
				echo "Bạn không thể xóa loại Thiết bị này\nLoại Thiết bị này đang có $mang_kiemtra[0] thiết bị trong kho!";
				exit();
			}
		}
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
			if (qltv_xoa_ls($_POST['loai'])) {
				echo "Loại Thiết bị đã được xóa!";
			}
			else{
				echo "Có lỗi trong quá trình xóa!";
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>