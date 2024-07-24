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
           $("#qltv-modal-them-sach").modal("hide");
           $("#qltv-modal-sua-sach").modal("hide");
           $("#qltv-modal-xoa-sach").modal("hide");
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
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DANH SÁCH THIẾT BỊ 
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
	 
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <!-- <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm Thiết Bị</a> -->
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #e0e0e0;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
					<th class="giua">Phiếu Nhập</th>
                    <th class="giua">Mã Imei Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                    <th class="giua">Loại Thiết Bị</th>
                    <th class="giua">Nhà Sản Xuất</th>
                    <th class="giua">Xuất Xứ</th>
                    <th class="giua">Năm Sản Xuất</th>
                    <th class="giua">Dung Lượng (GB)</th>
                    <!-- <th class="giua">Số lượng</th> -->
                    <th class="giua">Giá</th>
                    <th class="giua">Ngày nhập</th>
                    <!-- <th class="giua">Thao tác</th> -->
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
					<td><?php echo $row['MaPN']; ?></a></td>
                    <td class="giua"><a><?php echo $row['MaS']; ?></a></td>
                    <td><a class="ten-a btn-sua-sach" data-qltv="<?php echo $row['MaS']; ?>" alt="Image" Tooltip rel=thongbaonho content="<div id=imagcon>
                            <img src='../<?php echo $row['HinhAnhS']; ?>' class=thongbaonho-image/></div>"><?php echo $row['TenS']; ?></a></td>
                    <td><?php echo $row['TenLS']; ?></td>
                    <td><?php echo $row['TenTG']; ?></td>
                    <td><?php echo $row['TenNXB']; ?></td>
                    <td class="giua"><?php echo $row['NamXB']; ?></td>
                    <td class="giua"><?php echo $row['SoTrang']; ?></td>
                    <!-- <td class="giua"><?php echo $row['SL']; ?></td> -->
                    <td><?php echo $row['Gia']; ?></td>
                    <td class="giua"><?php echo $row['NgayNhap']; ?></td>
                    <!-- <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-sach" data-qltv="<?php echo $row['MaS']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </td> -->
					
					<input type="text" hidden="hidden" name="" id="id-ten-pn-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaPN']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ma-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-loai-sach-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaLS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-tg-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-nxb-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaNXB']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-nam-xb-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['NamXB']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-so-trang-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['SoTrang']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-so-luong-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['SL']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-gia-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['Gia']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ngay-nhap-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['NgayNhap']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-anh-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['HinhAnhS']; ?>">
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
<div class="modal fade" id="qltv-modal-them-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Thiết Bị</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
          <label>Mã Imei Thiết Bị</label>
          <input type="text" class="form-control" name="" id="ma-sach-them" placeholder="mã imei thiết bị" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Thiết Bị</label>
          <input type="text" class="form-control" name="" id="ten-sach-them" placeholder="tên thiết bị" required autocomplete="on">
        </div>
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Loại Thiết Bị</label>
			          <select id="ma-loai-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_ls)) {
			          		?>
			          		<option value="<?php echo $row['MaLS'] ?>"><?php echo $row['TenLS'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Nhà Sản Xuất</label>
			          <select id="ma-tac-gia-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_tg)) {
			          		?>
			          		<option value="<?php echo $row['MaTG'] ?>"><?php echo $row['TenTG'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        	</div>
        <!--</div>-->
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Năm Sản Xuất</label>
			          <input type="text" class="form-control" name="" id="nam-xuat-ban-sach-them" placeholder="năm sản xuất" required autocomplete="on">
			        </div>
        		</div>
				<div class="col-md-6">
        			<div class="form-group">
			          <label>Phiếu Nhập</label>
			          <select id="pn-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_phieu_nhap)) {
			          		?>
			          		<option value="<?php echo $row['MaPN'] ?>"><?php echo $row['MaPN'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Xuất Xứ</label>
			          <select id="nha-xuat-ban-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_nxb)) {
			          		?>
			          		<option value="<?php echo $row['MaNXB'] ?>"><?php echo $row['TenNXB'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		</div>
        <!--</div>-->
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
			          <label>Dung Lượng</label>
			          <input type="text" class="form-control" name="" id="so-trang-sach-them" placeholder="dung lượng" required autocomplete="on">
			        </div>
        		<div class="form-group">
			          
			          <input type="hidden" class="form-control" name="" id="so-luong-sach-them" placeholder="số lượng" required autocomplete="on" value="0">
			        </div>
        		<div class="form-group">
		          <label>Giá</label>
		          <input type="text" class="form-control" name="" id="gia-sach-them" placeholder="giá " required autocomplete="on">
		        </div>
		        <div class="form-group">
		          <label>Ngày nhập </label>
		          <input type="date" class="form-control" name="" id="ngay-nhap-sach-them" placeholder="ngày nhập" required autocomplete="on">
		        </div>
        	</div>
        	<div class="col-md-6">
        		<!-- <div class="form-group">
        			<button class="btn" onclick="BrowseServer()">Chọn hình ảnh ... </button>				
        		</div>
        		<div class="form-group">
        			<img src="#" class="col-md-12" id="hinh-anh-sach-them" style="height: 235px;width: inherit; text-align: center;">
        		</div> -->
        		<input type="text" hidden="hidden" name="" value="" id="hinh-anh-sach-them-src">
        	</div>
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-sach">Thêm thiết bị</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Sửa loại sách -->
<div class="modal fade" id="qltv-modal-sua-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa thiết bị</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
          <label>Mã Imei Thiết Bị</label>
          <input type="text" class="form-control" name="" id="ma-sach-sua" placeholder="mã imei thiết bị" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Thiết Bị</label>
          <input type="text" class="form-control" name="" id="ten-sach-sua" placeholder="tên thiết bị" required autocomplete="on">
        </div>
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Loại Thiết Bị</label>
			          <select id="ma-loai-sach-sua" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_ls_s)) {
			          		?>
			          		<option value="<?php echo $row['MaLS'] ?>"><?php echo $row['TenLS'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Nhà Sản Xuất</label>
			          <select id="ma-tac-gia-sach-sua" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_tg_s)) {
			          		?>
			          		<option value="<?php echo $row['MaTG'] ?>"><?php echo $row['TenTG'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        	</div>
        <!--</div>-->
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Năm Sản Xuất</label>
			          <input type="text" class="form-control" name="" id="nam-xuat-ban-sach-sua" placeholder="năm sản xuất" required autocomplete="on">
			        </div>
        		</div>
				<div class="col-md-6">
        			<div class="form-group">
			          <label>Phiếu Nhập</label>
			          <select id="pn-sua" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_phieu_nhap1)) {
			          		?>
			          		<option value="<?php echo $row['MaPN'] ?>"><?php echo $row['MaPN'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Xuất Xứ</label>
			          <select id="nha-xuat-ban-sach-sua" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_nxb_s)) {
			          		?>
			          		<option value="<?php echo $row['MaNXB'] ?>"><?php echo $row['TenNXB'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		</div>
        <!--</div>-->
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
			          <label>Dung Lượng (GB)</label>
			          <input type="text" class="form-control" name="" id="so-trang-sach-sua" placeholder="dung lượng" required autocomplete="on">
			        </div>
        		<div class="form-group">
			          
			          <input type="hidden" class="form-control" name="" id="so-luong-sach-sua" placeholder="số lượng" required autocomplete="on">
			        </div>
        		<div class="form-group">
		          <label>Giá</label>
		          <input type="text" class="form-control" name="" id="gia-sach-sua" placeholder="giá" required autocomplete="on">
		        </div>
		        <div class="form-group">
		          <label>Ngày nhập thiết bị</label>
		          <input type="date" class="form-control" name="" id="ngay-nhap-sach-sua" placeholder="ngày nhập Chỉnh sửa thiết bị" required autocomplete="on">
		        </div>
        	</div>
        	<div class="col-md-6">
        		<!-- <div class="form-group">
        			<button class="btn" onclick="BrowseServer_sua()">Chọn hình ảnh ... </button>				
        		</div>
        		<div class="form-group">
        			<img src="#" class="col-md-12" id="hinh-anh-sach-sua" style="height: 235px;width: inherit; text-align: center;">
        		</div>
        		<input type="text" hidden="hidden" name="" value="" id="hinh-anh-sach-sua-src"> -->
        	</div>
        	<input type="text" hidden="hidden" name="" value="" id="ma-sach-sua-old">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-sach">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa loại sách -->

<!-- Modal: Xoa loại sách -->
<div class="modal fade in" id="qltv-modal-xoa-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa thiết bị</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa thiết bị này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-sach-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-sach">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div>

<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muc-sach").addClass("active");
	});
</script>
<script type="text/javascript">
	var finder = new CKFinder();
    function BrowseServer() {
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        document.getElementById('hinh-anh-sach-them').src = fileUrl;
        var host = "<?php echo $qltv['HOST']; ?>";
        host = host.substr(0,host.lastIndexOf("\/"));
        document.getElementById('hinh-anh-sach-them-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
    }
    function BrowseServer_sua() {
        finder.selectActionFunction = SetFileField_sua;
        finder.popup();
    }
    function SetFileField_sua(fileUrl) {
        document.getElementById('hinh-anh-sach-sua').src = fileUrl;
        var host = "<?php echo $qltv['HOST']; ?>";
        host = host.substr(0,host.lastIndexOf("\/"));
        document.getElementById('hinh-anh-sach-sua-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
    }
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        document.getElementById("so-luong-sach-sua").readOnly = true;
        document.getElementById("so-luong-sach-them").readOnly = true;
        $("#themloaisach").click(function(){
        	$("#qltv-modal-them-sach").modal("show");
        });
        $("#nut-them-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
				pn: $("#pn-them").val(),
				mas: $("#ma-sach-them").val(),
	         	ten: $("#ten-sach-them").val(),
				ls: $("#ma-loai-sach-them").val(),
				tg: $("#ma-tac-gia-sach-them").val(),
				nxb: $("#nha-xuat-ban-sach-them").val(),
				nam: $("#nam-xuat-ban-sach-them").val(),
				trang: $("#so-trang-sach-them").val(),
				luong: $("#so-luong-sach-them").val(),
				gia: $("#gia-sach-them").val(),
				nhap: $("#ngay-nhap-sach-them").val(),
				anh: $("#hinh-anh-sach-them-src").val()
	        },
	        success : function (data){
                $("body").append(data);
	        }
	      });
	    });
	    $(".btn-sua-sach").click(function(){
	    	var id = $(this).attr("data-qltv");
			$("#pn-sua").val($("#id-ten-pn-s-"+id).val().trim());
			$("#ma-sach-sua").val($("#id-ma-s-"+id).val().trim());
	    	$("#ten-sach-sua").val($("#id-ten-s-"+id).val().trim());
	    	$("#ma-loai-sach-sua").val($("#id-loai-sach-s-"+id).val().trim());
	    	$("#ma-tac-gia-sach-sua").val($("#id-ten-tg-s-"+id).val().trim());
	    	$("#nha-xuat-ban-sach-sua").val($("#id-ten-nxb-s-"+id).val().trim());
	    	$("#nam-xuat-ban-sach-sua").val($("#id-nam-xb-s-"+id).val().trim());
	    	$("#so-trang-sach-sua").val($("#id-so-trang-s-"+id).val().trim());
	    	$("#so-luong-sach-sua").val($("#id-so-luong-s-"+id).val().trim());
	    	$("#gia-sach-sua").val($("#id-gia-s-"+id).val().trim());
	    	$("#ngay-nhap-sach-sua").val($("#id-ngay-nhap-s-"+id).val().trim());
	    	$("#hinh-anh-sach-sua").attr('src', "../"+$("#id-anh-s-"+id).val().trim());
	    	$("#hinh-anh-sach-sua-src").val($("#id-anh-s-"+id).val().trim());
	    	$("#ma-sach-sua-old").val($("#id-ma-s-"+id).val().trim());
	    	$("#qltv-modal-sua-sach").modal("show");
	    });
	    $("#nut-sua-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
			pn: $("#pn-sua").val(),
				mas: $("#ma-sach-sua").val(),
	          ten: $("#ten-sach-sua").val(),
	          ls: $("#ma-loai-sach-sua").val(),
	          tg: $("#ma-tac-gia-sach-sua").val(),
	          nxb: $("#nha-xuat-ban-sach-sua").val(),
	          nam: $("#nam-xuat-ban-sach-sua").val(),
	          trang: $("#so-trang-sach-sua").val(),
	          luong: $("#so-luong-sach-sua").val(),
	          gia: $("#gia-sach-sua").val(),
			  nhap: $("#ngay-nhap-sach-sua").val(),
	          anh: $("#hinh-anh-sach-sua-src").val(),
	          maold: $("#ma-sach-sua-old").val()
	        },
	        success : function (data){
                $("body").append(data);
	        }
	      });
	    });
	    $(".btn-xoa-sach").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-sach-xoa").val($("#id-ma-s-"+id).val().trim());
	    	$("#qltv-modal-xoa-sach").modal("show");
	    });
	    $("#nut-xoa-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-sach-xoa").val()
	        },
	        success : function (data){
                $("body").append(data);
	        }
	      });
	    });
      });
</script>
<script type="text/javascript">
$(document).ready(function(){
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
});
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	padding: 4px 0px;
	padding-left: 4px;
}
   table.dataTable {
      clear: both;
      margin-top: 6px !important;
      margin-bottom: 6px !important;
      max-width: none !important;
      font-size: 12px;
  }
</style>
<script type="text/javascript">
    $('#qltv-loai-sach').DataTable();
</script>
<form action="ajax/ajax_export_ds_nhap.php" method="post">
 		<input type="text" hidden="hidden" name="ma" value="<?php echo $ma; ?>">
 		<input type="text" hidden="hidden" name="ten" value="<?php echo $ten; ?>">
 		<input class="animated pulse btn btn-success" type="submit" name="" value="Tải xuống file Excel" target="_blank" style="position: relative;bottom: 0;margin-bottom: 10px;left: 44%;" >
 	</form>