<!-- Content Header (Page header) -->
<script type="text/javascript">
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'success',
              delay: 2000
            });
         
           $("#qltv-modal-sua-xuat").modal("hide");
           
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
      }
      function dongsua() {
        $("#qltv-modal-sua-dg").modal("hide");
      }
      function dongxoa(){
        $("#qltv-modal-xoa-dg").modal("hide");
      }
      function khongthanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'danger',
              delay: 4000
            });

      }
</script>
<script src="ckfinder/ckfinder.js"></script>
<section class="content-header">
    <h1>
        Thống Kê Thiết Bị Đã Xuất
        <div class="line"></div>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- <div class="col-md-12 col-ms-12">
            <a id="muonsach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Xuất thiết bị</a>
        </div> -->
        <div class="col-md-12 col-ms-12 cach"></div>
    </div>
    <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Tên Nhân Viên</th>
                    <th class="giua">Phiếu Xuất</th>
                  
                    <th class="giua">Mã Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                     <!-- <th class="giua">Ngày Xuất Thiết Bị</th> -->
                     <!-- <th class="giua">Thao tác</th> -->
                    <!-- <th class="giua">Ngày bảo trì</th>
                    <th class="giua">Trạng thái</th>
                    <th class="giua">Trả Thiết Bị</th>  -->
                </tr>
            </thead>
            <tbody>
            <?php 
                $dulieu = tv_get_muon();
                $stt = 1;
                while ($row = mysqli_fetch_assoc($dulieu)) { ?>
                <tr data-id="<?php echo $row['Id']; ?>" data-manv="<?php echo $row['MaNV']; ?>" data-mapx="<?php echo $row['MaPX']; ?>" data-mas="<?php echo $row['MaS']; ?>">
                    <th class="giua"><?php echo $stt; ?></th>
                    <td id="id-ten-nv-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
                    <td id="id-ma-px-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['MaPX']; ?></a></td>
                 
                    <td id="id-ma-s-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['MaS']; ?></a></td>
                    <td id="id-ten-s-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenS']; ?></a></td>
                    <!-- <td class="giua" id="id-ngay-muon-mt-<?php echo $row['Id']; ?>"><?php echo $row['NgayMuon']; ?></td> -->
                    <!-- <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-sach" data-qltv="<?php echo $row['MaS']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </td> -->
                    <!-- <td class="giua" id="id-ngay-tra-mt-<?php echo $row['Id']; ?>"><?php echo $row['NgayTra']; ?></td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>">
                    <?php if ($row['TrangThai'] == 0) { ?>
                        <span class="chuatra">Chưa trả</span>
                    <?php } else { ?>
                        <span class="datra">Đã trả</span>
                    <?php } ?>
                    </td>
                    <td class="giua">
                    <?php if ($row['TrangThai'] == 0) { ?>
                        <div class="nut nam-giua"><a class="btn btn-primary btn-tra-sach" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></div>
                    <?php } ?>
                    </td> -->
                </tr>
                <?php
                    $stt++;
                }
            ?>
            </tbody>
        </table>
    </div>
</section>



    <!-- <section class="content-header">
      <h1>
        Trả Thiết Bị
        <div class="line"></div>
      </h1>
    </section>
      <div class="windows-table animated fadeIn">
        <table id="qltv-tra-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Tên Phiếu Xuất</th>
                    <th class="giua">Mã Bưu Cục</th>
                    <th class="giua">Tên Bưu Cục</th>
                    <th class="giua">Tên thiết bị</th>
                    <th class="giua">Ngày trả</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($tra)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <input type="text" hidden="hidden" id="id-ma-px-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaPX'] ?>" >
                    <td id="id-ten-px-t-<?php echo $row['Id']; ?>"><a><?php echo $row['MaPX']; ?></a></td>
                    <input type="text" hidden="hidden" id="id-ma-dg-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaK'] ?>" >
                    <td id="id-ma-dg-2-t-<?php echo $row['Id']; ?>"><a><?php echo $row['MaK']; ?></a></td>
                    <td id="id-ten-dg-t-<?php echo $row['Id']; ?>"><a><?php echo $row['TenK']; ?></a></td>
                    <input type="text" hidden="hidden" class="giua" id="id-ma-s-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaS'] ?>" >
                    <td id="id-ten-s-t-<?php echo $row['Id']; ?>"><a><?php echo $row['TenS']; ?></a></td>
                    <td class="giua" id="id-ngay-tra-t-<?php echo $row['Id']; ?>"><?php echo $row['NgayTra']; ?></td>
                    <td class="giua" id="id-trang-thai-t-<?php echo $row['Id']; ?>">
                       
                    </td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section> -->

<!-- Modal: Thêm lớp -->
<div class="modal fade" id="qltv-modal-muon-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Xuất Thiết Bị</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <label>Mã thiết bị</label>
          <input type="text" class="form-control" name="" id="ma-tb-px-muon" placeholder="mã phiếu xuất" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mã Phiếu Xuất</label>
          <select id="ma-px-muon" class="form-control selectpicker" data-live-search="true" title="chọn mã phiếu xuất">
            <?php while ($row = mysqli_fetch_assoc($dulieu_phieu_xuat1)) {
            ?>
              <option data-tokens="<?php echo $row['MaPX']."  ".$row['Ngayxuat']; ?>" value="<?php echo $row['MaPX']; ?>"><?php echo$row['MaPX'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Mã Quận Huyện </label>
          <select id="ma-quanhuyen-muon" class="form-control selectpicker" data-live-search="true" title="chọn mã cơ quan">
            <?php while ($row = mysqli_fetch_assoc($dulieu_quanhuyen)) {
            ?>
              <option data-tokens="<?php echo $row['QH_Ma']." ".$row['QH_Ten']; ?>" value="<?php echo $row['QH_Ma']; ?>"><?php echo $row['QH_Ma']." - ".$row['QH_Ten']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Tên Bưu Cục</label>
          <select id="ma-ten-doc-gia-muon" class="form-control selectpicker" data-live-search="true" title="chọn mã cơ quan">
            <?php while ($row = mysqli_fetch_assoc($dulieu_doc_gia_muon)) {
            ?>
              <option data-tokens="<?php echo $row['MaK']." ".$row['TenK']; ?>" value="<?php echo $row['MaK']; ?>"><?php echo $row['MaK']." - ".$row['TenK']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Ngày Xuất Thiết Bị</label>
          <input type="date" class="form-control" name="" id="ngay-muon" required autocomplete="on">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-cho-muon">Xuất</button>
      </div>
    </div>
  </div>
  </div>
</div> <!-- Modal: Thêm lớp -->



<!-- Modal: Thêm lớp -->
<!-- Modal: Thêm lớp -->
<div class="modal fade bd-example-modal-sm" id="qltv-modal-tra-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Trả Thiết Bị</h4>
      </div>
      <div class="modal-body">
       
        <input type="text" hidden="hidden" name="" id="id-id-muon-tra" value="">

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-success" id="nut-tra-sach">Xác nhận trả</button>
      </div>
    </div>
  </div>
  </div>
</div>

    <form action="ajax/ajax_export_tb_dang_muon.php" method="post">
    <input type="text" hidden="hidden" name="dangmuon" value="1">
    <input class="animated pulse btn btn-success" type="submit" name="" value="Tải xuống file Excel" target="_blank" style="position: relative;bottom: 0;margin-bottom: 10px;left: 44%;" >
  </form>


<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muon-tra").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'success',
              delay: 2000
            });
           $("#qltv-modal-muon-sach").modal("hide");
           $("#qltv-modal-tra-sach").modal("hide");
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
      }
      function khongthanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'danger',
              delay: 4000
            });
      }
      $(document).ready(function(){
        $("#muonsach").click(function(){
          $("#qltv-modal-muon-sach").modal("show");
        });
        $("#nut-cho-muon").click(function(){
          var manv = '<?php echo $manv; ?>';
          $.ajax({
            url : "ajax/ajax_cho_muon_sach.php",
            type : "post",
            dataType:"text",
            data : {
              s: $("#ma-tb-px-muon").val(),
              qh_ma: $("#ma-quanhuyen-muon").val(),
              dg: $("#ma-ten-doc-gia-muon").val(),
              px: $("#ma-px-muon").val(),
              nm: $("#ngay-muon").val(),
              nv: manv
            },
            success : function (data){
                $("body").append(data);
            }
          });
        });
        $(".btn-gia-han").click(function(){
          var id = $(this).attr("data-qltv");
          $.ajax({
            url : "ajax/ajax_gia_han_sach.php",
            type : "post",
            dataType:"text",
            data : {
              id: id
            },
            success : function (data){
                $("body").append(data);
                //location.reload();
            }
          });
        });
        $(".btn-tra-sach").click(function(){
  
          var id = $(this).attr("data-qltv");
        
          $("#id-id-muon-tra").val(id);
          $("#qltv-modal-tra-sach").modal("show");
        });
        $("#nut-tra-sach").click(function(){
          var id = $("#id-id-muon-tra").val();
          $.ajax({
            url : "ajax/ajax_tra_sach.php",
            type : "post",
            dataType:"text",
            data : {
            
              id: id,
              s: $("#id-ma-s-mt-"+id).val(),
              nv: '<?php echo $manv; ?>'
            },
            success : function (data){
                //alert(data);
                $("body").append(data);
                //location.reload();
            }
          });
        });
      });
</script>
<script src="../bootstrap/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
  $('#qltv-tra-sach').DataTable();
</script>
<style type="text/css">
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px 1px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>