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
           $("#qltv-modal-them-khoa").modal("hide");
           $("#qltv-modal-sua-khoa").modal("hide");
           $("#qltv-modal-xoa-khoa").modal("hide");
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
        Bưu Cục
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm Bưu Cục</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Bưu Cục</th>
                    <th class="giua">Tên Bưu Cục</th>
                    <th class="giua">Địa chỉ</th>
                    <th class="giua">Số điện thoại</th>
                    <th class="giua">Thuộc Quận Huyện</th>
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
                    <td class="giua"><a><?php echo $row['MaK']; ?></a></td>
                    <td><?php echo $row['TenK']; ?></td>
                    <td><?php echo $row['DiaChiK']; ?></td>
                    <td><?php echo $row['SDT']; ?></td>
                    <td><?php echo $row['QH_Ma']; ?></td>
                    <td class="giua">
                        <div class="nut nam-giua">
                            <a class="btn btn-primary btn-sua-khoa" data-qltv="<?php echo $row['MaK']; ?>" title="Sửa">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger btn-xoa-khoa" title="Xóa" data-qltv="<?php echo $row['MaK']; ?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>

                    <input type="text" hidden="hidden" name="" id="id-ma-khoa-<?php echo $row['MaK']; ?>" value="<?php echo $row['MaK']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-khoa-<?php echo $row['MaK']; ?>" value="<?php echo $row['TenK']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-dia-chi-khoa-<?php echo $row['MaK']; ?>" value="<?php echo $row['DiaChiK']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-so-dien-thoai-khoa-<?php echo $row['MaK']; ?>" value="<?php echo $row['SDT']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ma-quanhuyen-<?php echo $row['MaK']; ?>" value="<?php echo $row['QH_Ma']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm khoa -->
<div class="modal fade" id="qltv-modal-them-khoa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Bưu Cục</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã Bưu Cục</label>
          <input type="text" class="form-control" name="" id="ma-khoa-them" placeholder="mã Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Bưu Cục</label>
          <input type="text" class="form-control" name="" id="ten-khoa-them" placeholder="tên Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Địa chỉ Bưu Cục</label>
          <input type="text" class="form-control" name="" id="dia-chi-khoa-them" placeholder="địa chỉ Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control" name="" id="so-dien-thoai-khoa-them" placeholder="số điện thoại" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Thuộc Quận Huyện</label>
          <select class="form-control" id="quanhuyen-khoa-them">
            <?php while ($row = mysqli_fetch_assoc($dulieu_quanhuyen)) {
            ?>
              <option value="<?php echo $row['QH_Ma']; ?>"><?php echo $row['QH_Ten']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-khoa">Thêm Bưu Cục</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm khoa -->

<!-- Modal: Sửa khoa -->
<div class="modal fade" id="qltv-modal-sua-khoa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa Bưu Cục</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã Bưu Cục</label>
          <input type="text" class="form-control" name="" id="ma-khoa-sua" placeholder="mã Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Bưu Cục</label>
          <input type="text" class="form-control" name="" id="ten-khoa-sua" placeholder="tên Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Địa chỉ Bưu Cục</label>
          <input type="text" class="form-control" name="" id="dia-chi-khoa-sua" placeholder="địa chỉ Bưu Cục" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control" name="" id="so-dien-thoai-khoa-sua" placeholder="số điện thoại" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Thuộc Bưu Cục</label>
          <select class="form-control" id="quanhuyen-khoa-sua">
            <?php while ($row = mysqli_fetch_assoc($dulieu_quanhuyen_1)) {
            ?>
              <option value="<?php echo $row['QH_Ma']; ?>"><?php echo $row['QH_Ten']; ?></option>
            <?php } ?>
          </select>
        </div>
        <input type="text" hidden="hidden" name="" id="ma-khoa-sua-old">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-khoa">Hoàn thành</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa khoas -->

<!-- Modal: Xóa khoa -->
<div class="modal fade in" id="qltv-modal-xoa-khoa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Bưu Cục</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa Bưu Cục này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-khoa-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-khoa">Tôi chắc chắn</button>
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
        	$("#qltv-modal-them-khoa").modal("show");
        });
        $("#nut-them-khoa").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_khoa.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-khoa-them").val(),
            ten: $("#ten-khoa-them").val(),
            diachi: $("#dia-chi-khoa-them").val(),
            sdt: $("#so-dien-thoai-khoa-them").val(),
            maqh: $("#quanhuyen-khoa-them").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-sua-khoa").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-khoa-sua").val($("#id-ma-khoa-"+id).val().trim());
	    	$("#ten-khoa-sua").val($("#id-ten-khoa-"+id).val().trim());
        $("#dia-chi-khoa-sua").val($("#id-dia-chi-khoa-"+id).val().trim());
        $("#so-dien-thoai-khoa-sua").val($("#id-so-dien-thoai-khoa-"+id).val().trim());
        $("#quanhuyen-khoa-sua").val($("#id-ma-quanhuyen-"+id).val().trim());
        $("#ma-khoa-sua-old").val($("#id-ma-khoa-"+id).val().trim());
	    	$("#qltv-modal-sua-khoa").modal("show");
	    });
	    $("#nut-sua-khoa").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_khoa.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-khoa-sua").val(),
            ten: $("#ten-khoa-sua").val(),
            diachi: $("#dia-chi-khoa-sua").val(),
            sdt: $("#so-dien-thoai-khoa-sua").val(),
            maqh: $("#quanhuyen-khoa-sua").val(),
            maold: $("#ma-khoa-sua-old").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-xoa-khoa").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-khoa-xoa").val($("#id-ma-khoa-"+id).val().trim());
	    	$("#qltv-modal-xoa-khoa").modal("show");
	    });
	    $("#nut-xoa-khoa").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_khoa.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-khoa-xoa").val()
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