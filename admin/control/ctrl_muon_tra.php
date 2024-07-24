<?php 
	include_once("model/md_muon_tra.php");
	$dulieu = tv_get_muon();
	$dulieu_sach_muon = tv_get_sach_muon();
	$dulieu_doc_gia_muon = tv_get_doc_gia_muon();
	$tra = tv_get_tra();
	$dulieu_phieu_xuat1 = tv_get_phieu_xuat();
	$dulieu_quanhuyen = tv_get_quanhuyen();
	// $dulieu_quanhuyen1 = get_buu_cuc_by_qh_ma($qh_ma);
	include_once("view/vw_muon_tra.php");
 ?>