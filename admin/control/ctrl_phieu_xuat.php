<?php 
include_once("model/md_phieu_xuat.php");

$dulieu_sach_muon = tv_get_sach_muon();
$dulieu_doc_gia_muon = tv_get_doc_gia_muon();
$tra = tv_get_tra();
$dulieu_quanhuyen = tv_get_quanhuyen();
$dulieu = tv_get_phieu_xuat();
$dulieu1 = tv_get_nhan_vien();
include_once("view/vw_phieu_xuat.php");
?>
