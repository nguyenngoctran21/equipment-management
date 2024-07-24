<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thống kê thiết bị theo năm
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <h4>Chọn năm</h4>
          <select id="id-nam" class="form-control selectpicker" data-live-search="true" title="Chọn năm">
            <?php while ($row = mysqli_fetch_assoc($nam)) {
            ?>
              <option data-tokens="<?php echo $row['nam']; ?>" value="<?php echo $row['nam']; ?>"><?php echo $row['nam']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div id="bang-du-lieu" class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #e0e0e0;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                    <th class="giua">Loại Thiết Bị</th>
                    <th class="giua">Xuất Xứ</th>
                    <th class="giua">Nhà Sản Xuất</th>
                    <th class="giua">Năm Sản Xuất</th>
                    <th class="giua">Dung Lượng</th>
                    <th class="giua">Số lượng</th>
                    <th class="giua">Giá</th>
                    <th class="giua">Ngày nhập</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </section>
 <style type="text/css">
   table.dataTable {
      clear: both;
      margin-top: 6px !important;
      margin-bottom: 6px !important;
      max-width: none !important;
      font-size: 12px;
  }
 </style>
<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#thong-ke").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-khoa-sach').DataTable();
  	    $("#id-nam").change(function(){
  	      $.ajax({
  	        url : "ajax/ajax_du_lieu_sach_theo_nam.php",
  	        type : "post",
  	        dataType:"text",
  	        data : {
              nam: $("#id-nam").val()
  	        },
  	        success : function (data){
                $("#bang-du-lieu").html(data);
  	        }
  	      });
  	    });
      });
</script>
<script src="../bootstrap/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>