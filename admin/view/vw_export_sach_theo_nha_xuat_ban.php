<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thống kê thiết bị theo Bưu Cục
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <h4>Chọn Bưu Cục</h4>
          <select id="id-nha-xuat-ban" class="form-control selectpicker" data-live-search="true" title="Chọn bưu cục">
            <?php while ($row = mysqli_fetch_assoc($nxb)) {
            ?>
              <option data-tokens="<?php echo $row['MaK']." ".$row['TenK']; ?>" value="<?php echo $row['MaK']; ?>"><?php echo $row['MaK']." - ".$row['TenK']; ?></option>
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
                  <!-- <th class="giua">Loại Thiết Bị</th>
                  <th class="giua">Xuất Xứ</th>
                  <th class="giua">Nhà Sản Xuất</th> -->
                  <th class="giua">Năm Sản Xuất</th>
                  <th class="giua">Dung Lượng</th>
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
  	    $("#id-nha-xuat-ban").change(function(){
  	      $.ajax({
  	        url : "ajax/ajax_du_lieu_sach_theo_nha_xuat_ban.php",
  	        type : "post",
  	        dataType:"text",
  	        data : {
              ma: $("#id-nha-xuat-ban").val(),
              ten: $("#id-nha-xuat-ban :selected").text()
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