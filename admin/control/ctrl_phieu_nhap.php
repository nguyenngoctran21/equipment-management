<?php 
	include_once("model/md_phieu_nhap.php");
	// include_once("model/md_sach.php");
	include_once("model/md_loai_sach.php");
	include_once("model/md_tac_gia.php");
	include_once("model/md_nha_xuat_ban.php");
	$dulieu = tv_get_phieu_nhap();
	$dulieu12 = tv_get_sach();
	$dulieu1 = tv_get_nhan_vien();
	$dulieu_ls = tv_get_loai_sach();
	$dulieu_ls_s = tv_get_loai_sach();
	$dulieu_tg = tv_get_tac_gia();
	$dulieu_tg_s = tv_get_tac_gia();
	$dulieu_nxb = tv_get_nha_xuat_ban();
	$dulieu_nxb_s = tv_get_nha_xuat_ban();
	// $maPN= tv_get_sach_theo_phieu_nhap();
	include_once("view/vw_phieu_nhap.php");


 ?>