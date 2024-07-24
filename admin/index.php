<?php include_once("control/ctrl_login_check.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>VIETNAMPOST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?php echo $qltv['HOST']; ?>/" />
  <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap-select.min.css">
  <link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>

  <div class="container" id="id-head">
    <img class="hinh-head" src="../images/anhnen.png" style="width: 100%; height: auto;">
  </div>

  <nav class="navbar navbar-default">
    <ul class="nav navbar-nav">

      <li id="muc-trang-chu"><a href="">Trang chủ</a></li>
      
        <!-- <li class="dropdown" id="muc-sach">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thiết Bị <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?p=sach">Thiết Bị</a></li>
              <li><a href="?p=sach"> Danh Sách Thiết Bị Nhập</a></li>
              <li><a href="?p=muon-tra">Xuất Thiết Bị</a></li>
            </ul>
          </li> -->
        <li class="dropdown" id="them-phieu">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Phiếu Nhập - Xuất <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!-- <li><a href="?p=sach">Thiết Bị</a></li> -->
            <li><a href="?p=phieunhap">Tạo Phiếu Nhập</a></li>
            <li><a href="?p=phieuxuat">Tạo Phiếu Xuất</a></li>
          </ul>
        </li>
       
        <li class="dropdown" id="chi-tiet-tb">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chi Tiết Thiết Bị <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?p=loaisach">Loại Thiết Bị</a></li>
            <li><a href="?p=tacgia">Nhà Sản Xuất</a></li>
            <li><a href="?p=nhaxuatban">Xuất Xứ</a></li>
          </ul>
        </li>
        <li><a href="?p=xuatsach">Thanh Lý Thiết Bị</a></li>
        <li class="dropdown" id="khoa-lop">
          <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bưu Cục - Phòng Ban<span class="caret"></span></a> -->
          <ul class="dropdown-menu">
            <li><a href="?p=khoa">Bưu Cục</a></li>
            <!-- <li><a href="?p=lop">Phòng Ban</a></li> -->

          </ul>
        </li>
        <!-- <li class="dropdown" id="muon-tra">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Xuất thiết bị <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?p=muon-tra">Xuất Thiết bị</a></li> -->
        <!-- <li><a href="?p=muonquahan">Thiết Bị Quá Hạn Bảo Trì </a></li> -->
        <!-- </ul>
          </li> -->
        <!-- <li class="dropdown" id="doc-gia">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Người Dùng<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?p=docgia">Người Dùng</a></li> -->
        <!-- <li class="dropdown" id="doc-gia"><a href="?p=docgia">Người Dùng</a></li> -->
        <!-- </ul>
          </li> -->
        <li class="dropdown" id="thong-ke">
          <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thống kê <span class="caret"></span></a> -->
          <ul class="dropdown-menu">
            <li><a href="?p=sachchuamuon">Thiết Bị chưa mượn</a></li>
            <li><a href="?p=sachdangmuon">Thiết Bị đang mượn</a></li>
            <!-- <li><a href="?p=soluongtheonam">Số lượng Thiết Bị theo năm</a></li> -->
            <!-- <li><a href="?p=top10sachmuon">Top 10 Thiết Bị mượn nhiều nhất năm</a></li> -->
            <li><a href="?p=sachtheonxb">Thiết Bị theo Xuất Xứ</a></li>
          </ul>
        </li>
        <!-- <li><a href="?p=sach"> Nhập Thiết Bị</a></li> -->
        <!-- <li class="dropdown" id="muontra"><a href="?p=muon-tra">Xuất Thiết Bị</a></li> -->
        <li><a href="?p=khoa">Bưu Cục</a></li>


        <li class="dropdown" id="quanhuyen"><a href="?p=quanhuyen">Quận Huyện</a></li>
        <?php if ($loainv == '1') { ?>
        <li class="dropdown" id="nhanvien"><a href="?p=nhanvien">Quản lý nhân viên</a></li>
        <?php } ?>
        <li class="dropdown" id="thong-ke">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thống kê <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?p=sachchuamuon">Danh Sách Thiết Bị Chưa Xuất </a></li>
            <li><a href="?p=muon-tra">Danh Sách Thiết Bị Đã Xuất</a></li>
            <li><a href="?p=sach"> Danh Sách Tất Cả Thiết Bị Nhập</a></li>
            <li><a href="?p=sachtheonxb">Thiết Bị theo Bưu Cục</a></li>
          </ul>
        </li>
      
    </ul>



    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown" id="quanlythongtin">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Thông tin<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="?p=profile">Sửa thông tin</a></li>
          <li><a href="control/ctrl_login_out.php">Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
    <!-- <style>
            .navbar-nav {

            }
        </style> -->
  </nav>


  <div class="container-fluid">
    <div id="khung-trang-admin" class="container" style="width: 97%;">
      <?php
      include_once("public_control.php");
      ?>
    </div>
  </div>

</body>

</html>

<script src="nonti/bootstrap-notify.min.js"></script>