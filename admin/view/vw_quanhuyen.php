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
           $("#qltv-modal-them-quanhuyen").modal("hide");
           $("#qltv-modal-sua-quanhuyen").modal("hide");
           $("#qltv-modal-xoa-quanhuyen").modal("hide");
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
        QUẬN HUYỆN
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm QUẬN HUYỆN</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã QUẬN HUYỆN</th>
                    <th class="giua">Tên QUẬN HUYỆN</th>
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
                    <td class="giua"><a><?php echo $row['QH_Ma']; ?></a></td>
                    <td><?php echo $row['QH_Ten']; ?></td>
                    <input type="text" hidden="hidden" name="" id="id-ma-quanhuyen-<?php echo $row['QH_Ma']; ?>" value="<?php echo $row['QH_Ma']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-quanhuyen-<?php echo $row['QH_Ma']; ?>" value="<?php echo $row['QH_Ten']; ?>">
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-quanhuyen" data-qltv="<?php echo $row['QH_Ma']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-quanhuyen" title="Xóa"
                        data-qltv="<?php echo $row['QH_Ma']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm quanhuyen -->
<div class="modal fade" id="qltv-modal-them-quanhuyen" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm QUẬN HUYỆN</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã QUẬN HUYỆN</label>
          <input type="text" class="form-control" name="" id="ma-quanhuyen-them" placeholder="mã QUẬN HUYỆN" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên QUẬN HUYỆN</label>
          <input type="text" class="form-control" name="" id="ten-quanhuyen-them" placeholder="tên QUẬN HUYỆN" required autocomplete="on">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-quanhuyen">Thêm QUẬN HUYỆN</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm quanhuyen -->

<!-- Modal: Sửa quanhuyen -->
<div class="modal fade" id="qltv-modal-sua-quanhuyen" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa QUẬN HUYỆN</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã QUẬN HUYỆN</label>
          <input type="text" class="form-control" name="" id="ma-quanhuyen-sua" placeholder="mã QUẬN HUYỆN" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên QUẬN HUYỆN</label>
          <input type="text" class="form-control" name="" id="ten-quanhuyen-sua" placeholder="tên QUẬN HUYỆN" required autocomplete="on">
        </div>
        <input type="text" hidden="hidden" name="" id="ma-quanhuyen-sua-old">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-quanhuyen">Hoàn thành</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa quanhuyens -->

<!-- Modal: Xóa quanhuyen -->
<div class="modal fade in" id="qltv-modal-xoa-quanhuyen" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa QUẬN HUYỆN</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa QUẬN HUYỆN này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-quanhuyen-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-quanhuyen">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa quanhuyen -->

<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#quanhuyen-lop").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-quanhuyen-sach').DataTable();
        $("#themloaisach").click(function(){
        	$("#qltv-modal-them-quanhuyen").modal("show");
        });
        $("#nut-them-quanhuyen").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_quanhuyen.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-quanhuyen-them").val(),
            ten: $("#ten-quanhuyen-them").val(),
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-sua-quanhuyen").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-quanhuyen-sua").val($("#id-ma-quanhuyen-"+id).val().trim());
	    	$("#ten-quanhuyen-sua").val($("#id-ten-quanhuyen-"+id).val().trim());
        $("#ma-quanhuyen-sua-old").val($("#id-ma-quanhuyen-"+id).val().trim());
	    	$("#qltv-modal-sua-quanhuyen").modal("show");
	    });
	    $("#nut-sua-quanhuyen").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_quanhuyen.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-quanhuyen-sua").val(),
            ten: $("#ten-quanhuyen-sua").val(),
            maold: $("#ma-quanhuyen-sua-old").val()
	        },
	        success : function (data){
              $("body").append(data);
	        }
	      });
	    });
	    $(".btn-xoa-quanhuyen").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-quanhuyen-xoa").val($("#id-ma-quanhuyen-"+id).val().trim());
	    	$("#qltv-modal-xoa-quanhuyen").modal("show");
	    });
	    $("#nut-xoa-quanhuyen").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_quanhuyen.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-quanhuyen-xoa").val()
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