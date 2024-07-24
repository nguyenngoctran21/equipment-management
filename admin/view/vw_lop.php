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
           $("#qltv-modal-them-lop").modal("hide");
           $("#qltv-modal-sua-lop").modal("hide");
           $("#qltv-modal-xoa-lop").modal("hide");
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
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Phòng Ban
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm Phòng Ban</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Phòng Ban</th>
                    <th class="giua">Tên Phòng Ban</th>
                    <th class="giua">Thuộc Bưu Cục</th>
                    <th class="giua">Thao tác</th>
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
                    <td class="giua"><a><?php echo $row['MaL']; ?></a></td>
                    <td><?php echo $row['TenL']; ?></td>
                    <td><?php echo $row['TenK']; ?></td>
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-lop" data-qltv="<?php echo $row['MaL']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-lop" title="Xóa"
                        data-qltv="<?php echo $row['MaL']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-lop-<?php echo $row['MaL']; ?>" value="<?php echo $row['MaL']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-lop-<?php echo $row['MaL']; ?>" value="<?php echo $row['TenL']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ma-khoa-<?php echo $row['MaL']; ?>" value="<?php echo $row['MaK']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm lớp -->
<div class="modal fade" id="qltv-modal-them-lop" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Phòng Ban</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã Phòng Ban</label>
          <input type="text" class="form-control" name="" id="ma-lop-them" placeholder="mã phòng ban" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Phòng Ban</label>
          <input type="text" class="form-control" name="" id="ten-lop-them" placeholder="tên phòng ban" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Thuộc Bưu Cục</label>
          <select class="form-control" id="khoa-lop-them">
            <?php while ($row = mysqli_fetch_assoc($dulieu_khoa)) {
            ?>
              <option value="<?php echo $row['MaK']; ?>"><?php echo $row['TenK']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-lop">Thêm Phòng Ban</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm lớp -->

<!-- Modal: Sửa lớp -->
<div class="modal fade" id="qltv-modal-sua-lop" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa Phòng Ban</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã Phòng Ban</label>
          <input type="text" class="form-control" name="" disabled id="ma-lop-sua" placeholder="mã phòng ban" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Phòng Ban</label>
          <input type="text" class="form-control" name="" id="ten-lop-sua" placeholder="tên phòng ban" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Thuộc Bưu Cục</label>
          <select class="form-control" id="khoa-lop-sua">
            <?php while ($row = mysqli_fetch_assoc($dulieu_khoa_1)) {
            ?>
              <option value="<?php echo $row['MaK']; ?>"><?php echo $row['TenK']; ?></option>
            <?php } ?>
          </select>
        </div>
        <input type="text" hidden="hidden" name="" id="ma-lop-sua-old" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-lop">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa lớp -->

<!-- Modal: Xóa khoa -->
<div class="modal fade in" id="qltv-modal-xoa-lop" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Phòng Ban</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa phòng ban này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-lop-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-lop">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#khoa-lop").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-khoa-sach').DataTable();
        $("#themloaisach").click(function(){
        	$("#qltv-modal-them-lop").modal("show");
        });
        $("#nut-them-lop").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_lop.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          mal: $("#ma-lop-them").val(),
            tenl: $("#ten-lop-them").val(),
            mak: $("#khoa-lop-them").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-sua-lop").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-lop-sua").val($("#id-ma-lop-"+id).val().trim());
	    	$("#ten-lop-sua").val($("#id-ten-lop-"+id).val().trim());
        $("#khoa-lop-sua").val($("#id-ma-khoa-"+id).val().trim());
        $("#ma-lop-sua-old").val($("#id-ma-lop-"+id).val().trim());
	    	$("#qltv-modal-sua-lop").modal("show");
	    });
	    $("#nut-sua-lop").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_lop.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          mal: $("#ma-lop-sua").val(),
            tenl: $("#ten-lop-sua").val(),
            mak: $("#khoa-lop-sua").val(),
            malold: $("#ma-lop-sua-old").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-xoa-lop").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-lop-xoa").val($("#id-ma-lop-"+id).val().trim());
	    	$("#qltv-modal-xoa-lop").modal("show");
	    });
	    $("#nut-xoa-lop").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_lop.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-lop-xoa").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
      });
</script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>