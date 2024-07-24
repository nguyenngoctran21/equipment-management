<!-- Content Header (Page header) -->
    <section class="content-header animated fadeIn">
      <h1>
        Nhập Thiết Bị
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                    <th class="giua">Loại Thiết Bị</th>
                    <th class="giua">Dung Lượng (GB)</th>
                    <th class="giua">Nhập Thiết Bị</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($dulieu)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
                    <td><a class="ten-a btn-sua-sach" data-qltv="<?php echo $row['MaS']; ?>" alt="Image" Tooltip rel=thongbaonho content="<div id=imagcon>
                            <img src='../<?php echo $row['HinhAnhS']; ?>' class=thongbaonho-image/></div>"><?php echo $row['TenS']; ?></a></td>
                    <td><?php echo $row['TenLS']; ?></td>
                    <td class="giua"><?php echo $row['SoTrang']; ?></td>
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-success btn-nhap-sach" data-qltv="<?php echo $row['MaS']; ?>" title="Sửa"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-ls-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenLS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-so-trang-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['SoTrang']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-anh-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['HinhAnhS']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    <section class="content-header animated fadeIn">
      <h1>
        Lịch sử nhập thiết bị
        <div class="line"></div>
      </h1>
    </section>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach-t" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #16a085;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                    <th class="giua">Tên loại Thiết Bị</th>
                    <th class="giua">Ngày nhập</th>
                    <th class="giua">Ghi chú</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($dulieu_lich_su)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
                    <td><a><?php echo $row['TenS']; ?></a></td>
                    <td><?php echo $row['TenLS']; ?></td>
                 
                    <td class="giua"><?php echo $row['NgayNhap']; ?></td>
                    <td><?php echo $row['GhiChu']; ?></td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-nhap-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nhập Thiết Bị</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Tên Thiết Bị:</label>
          <span class="form-control-static" id="ten-sach-nhap"></span>
        </div>
        <div class="form-group">
          <label class="control-label">Loại Thiết Bị:</label>
          <span class="form-control-static" id="loai-sach-nhap"></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Dung Lượng (GB)</label>
                  <input type="text" class="form-control" name="" id="so-trang-sach-nhap" placeholder="Dung Lượng" required autocomplete="on">
                </div>
            </div>
         
        </div>
        <div class="form-group">
          <label>Ngày nhập Thiết Bị</label>
          <input type="date" class="form-control" name="" id="ngay-nhap-sach" placeholder="ngày nhập thiết bị" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Ghi chú</label>
          <textarea id="ghi-chu-nhap" class="form-control" rows="5" placeholder=""></textarea>
        </div>
        <input type="text" id="ma-sach-nhap" hidden="hidden" name="" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-nhap-sach">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->


<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muc-sach").addClass("active");
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
           $("#qltv-modal-nhap-sach").modal("hide");
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
      $(document).ready(function() {
        document.getElementById('ngay-nhap-sach').valueAsDate = new Date();
        document.getElementById("ngay-nhap-sach").readOnly = true;
        document.getElementById("ten-sach-nhap").readOnly = true;
        document.getElementById("loai-sach-nhap").readOnly = true;
        document.getElementById("so-trang-sach-nhap").readOnly = true;
        $('[rel=thongbaonho]').bind('mouseover', function(){
         if ($(this).hasClass('ajax')) {
            var ajax = $(this).attr('ajax');    
          $.get(ajax,
          function(noidungtooltip){
            $('<div class="thongbaonho">'  + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');});
         }
         else{
                var noidungtooltip = $(this).attr('content');
                $('<div class="thongbaonho">' + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');
                }
                
                $(this).bind('mousemove', function(e){
                    $('div.thongbaonho').css({
                        'top': e.pageY - ($('div.thongbaonho').height() / 2) - 5,
                        'left': e.pageX + 15
                    });
                });
            }).bind('mouseout', function(){
                $('div.thongbaonho').fadeOut('fast', function(){
                    $(this).remove();
                });
            });
        $("#nut-nhap-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_nhap_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
              ngay: $("#ngay-nhap-sach").val(),
	          ma: $("#ma-sach-nhap").val(),
	      
	          ghichu: $("#ghi-chu-nhap").val()
	        },
	        success : function (data){
	            $("body").append(data);
	            //location.reload();
	        }
	      });
	    });
	    $(".btn-nhap-sach").click(function(){
	    	var id = $(this).attr("data-qltv");
            document.getElementById('ten-sach-nhap').innerHTML = $("#id-ten-s-"+id).val().trim();
             document.getElementById('loai-sach-nhap').innerHTML = $("#id-ten-ls-s-"+id).val().trim();
	    	$("#so-trang-sach-nhap").val($("#id-so-trang-s-"+id).val().trim());
	    	$("#ma-sach-nhap").val($("#id-ma-s-"+id).val().trim());
	    	$("#qltv-modal-nhap-sach").modal("show");
	    });
        $('#qltv-loai-sach').DataTable();
        $('#qltv-loai-sach-t').DataTable();
      });
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	padding: 4px 0px;
	padding-left: 4px;
}
</style>