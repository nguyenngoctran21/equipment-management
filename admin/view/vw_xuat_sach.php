<!-- Content Header (Page header) -->
<section class="content-header animated fadeIn">
  <h1>
    Thanh Lý Thiết Bị
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
            <th class="giua">Loại Thiết Bị</th>
            <th class="giua">Dung Lượng</th>
            <th class="giua">Thanh Lý Thiết Bị</th>
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
          <td><?php echo $row['TenLS']; ?></td>
          <td class="giua"><?php echo $row['SoTrang']; ?></td>
          <td class="giua">
            <div class="nut nam-giua">
              <a class="btn btn-danger btn-xuat-sach" data-qltv="<?php echo $row['MaS']; ?>" title="Thanh Lý">
                <i class="fa fa-minus" aria-hidden="true"></i>
              </a>
            </div>
          </td>
          <input type="text" hidden="hidden" name="" id="id-ma-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaS']; ?>">
          <input type="text" hidden="hidden" name="" id="id-ten-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenS']; ?>">
          <input type="text" hidden="hidden" name="" id="id-ten-ls-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenLS']; ?>">
          <input type="text" hidden="hidden" name="" id="id-so-trang-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['SoTrang']; ?>">
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
      Lịch Sử Thanh Lý Thiết Bị
      <div class="line"></div>
    </h1>
  </section>
  <div class="windows-table animated fadeIn">
    <table id="qltv-loai-sach-t" class="table table-striped">
      <thead>
        <tr role="row">
          <tr style="background-color: #e15a56;color: #fff;">
            <th class="giua">STT</th>
            <th class="giua">Mã Thiết Bị</th>
            <!-- <th class="giua">Tên Thiết Bị</th>
            <th class="giua">Tên loại Thiết Bị</th> -->
            <th class="giua">Ngày Thanh Lý</th>
            <th class="giua">Ghi chú</th>
          </tr>
          </thead>
        <tbody>
          <?php 
            $stt = 1;
            while ($row = mysqli_fetch_assoc($dulieu_lich_su1)) {
          ?>
            <tr>
              <th class="giua"><?php echo $stt; ?></th>
              <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
              <!-- <td><a><?php echo $row['TenS']; ?></a></td>
              <td><?php echo $row['TenLS']; ?></td> -->
              <td class="giua"><?php echo $row['NgayXuat']; ?></td>
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
  <div class="modal fade" id="qltv-modal-xuat-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Thanh Lý Thiết Bị</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Tên Thiết Bị:</label>
            <span class="form-control-static" id="ten-sach-xuat"></span>
          </div>
          <div class="form-group">
            <label class="control-label">Loại Thiết Bị:</label>
            <span class="form-control-static" id="loai-sach-xuat"></span>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Dung Lượng</label>
                <input type="text" class="form-control" name="" id="so-trang-sach-xuat" placeholder="số trang" required autocomplete="on">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="hidden" class="form-control" name="" id="so-luong-sach-xuat" placeholder="số lượng" required autocomplete="on">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Ngày Thanh Lý</label>
            <input type="date" class="form-control" name="" id="ngay-xuat-sach" placeholder="ngày nhập sách" required autocomplete="on">
          </div>
          <div class="form-group">
            <label>Ghi chú</label>
            <textarea id="ghi-chu-xuat" class="form-control" rows="5" placeholder=""></textarea>
          </div>
          <input type="text" id="ma-sach-xuat" hidden="hidden" name="" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" id="nut-xuat-sach">Hoàn tất</button>
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
      $("#qltv-modal-xuat-sach").modal("hide");
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
      document.getElementById('ngay-xuat-sach').valueAsDate = new Date();
      document.getElementById("ngay-xuat-sach").readOnly = true;
      document.getElementById("ten-sach-xuat").readOnly = true;
      document.getElementById("loai-sach-xuat").readOnly = true;
      document.getElementById("so-trang-sach-xuat").readOnly = true;
      $('[rel=thongbaonho]').bind('mouseover', function(){
        if ($(this).hasClass('ajax')) {
          var ajax = $(this).attr('ajax');    
          $.get(ajax,
          function(noidungtooltip){
            $('<div class="thongbaonho">'  + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');
          });
        } else {
          var noidungtooltip = $(this).attr('content');
          $('<div class="thongbaonho">' + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');
        }
        $(this).bind('mousemove', function(e){
          $('div.thongbaonho').css({
            'top': e.pageY - ($('div.thongbaonho').height() / 2) - 5
            ,
            'left': e.pageX + 15
          });
        });
      }).bind('mouseout', function(){
        $('div.thongbaonho').fadeOut('fast', function(){
          $(this).remove();
        });
      });
      
      $("#nut-xuat-sach").click(function(){
        $.ajax({
          url : "ajax/ajax_xuat_sach.php",
          type : "post",
          dataType:"text",
          data : {
            ngay: $("#ngay-xuat-sach").val(),
            ma: $("#ma-sach-xuat").val(),
            ghichu: $("#ghi-chu-xuat").val()
           
          },
          success : function (data){
            $("body").append(data);
          }
        });
      });
      
      $(".btn-xuat-sach").click(function(){
        var id = $(this).attr("data-qltv");
        document.getElementById('ten-sach-xuat').innerHTML = $("#id-ten-s-"+id).val().trim();
        document.getElementById('loai-sach-xuat').innerHTML = $("#id-ten-ls-s-"+id).val().trim();
        $("#so-trang-sach-xuat").val($("#id-so-trang-s-"+id).val().trim());
        $("#ma-sach-xuat").val($("#id-ma-s-"+id).val().trim());
        $("#qltv-modal-xuat-sach").modal("show");
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
