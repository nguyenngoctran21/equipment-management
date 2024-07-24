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
           $("#qltv-modal-them-pn").modal("hide");
           $("#qltv-modal-sua-pn").modal("hide");
           $("#qltv-modal-xoa-pn").modal("hide");
           $("#qltv-modal-them-tb").modal("hide");
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
      }
      function dongsua() {
        $("#qltv-modal-sua-pn").modal("hide");
      }
      function dongxoa(){
        $("#qltv-modal-xoa-pn").modal("hide");
      }
      function dongthem(){
        $("#qltv-modal-them-tb").modal("hide");
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
        PHIẾU NHẬP
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm Phiếu Nhập</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Phiếu Nhập</th>
                    <th class="giua">Tên Nhân Viên</th>
                    <th class="giua">Ngày Tạo Phiếu Nhập</th>
                    <th class="giua">Ghi Chú</th>
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
                    <td><a><?php echo $row['MaPN']; ?></a></td>
                    <input type="text" hidden="hidden" id="id-ma-nv-mt-<?php echo $row['MaNV']; ?>" value="<?php echo $row['MaNV'] ?>" >
                    <td id="id-ten-nv-mt-<?php echo $row['MaNV']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
                    <td><?php echo $row['Ngaynhap']; ?></td>
                    <td><?php echo $row['MoTa']; ?></td>
                    <td class="giua">
                        <div class="nut nam-giua">
                            <a class="btn btn-primary btn-sua-pn" data-qltv="<?php echo $row['MaPN']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger btn-xoa-pn" title="Xóa" data-qltv="<?php echo $row['MaPN']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a class="btn btn-success btn-combined" title="Nhập Thiết Bị và Xem Chi Tiết" data-qltv="<?php echo $row['MaPN']; ?>" data-ma-pn="<?php echo $row['MaPN']; ?>">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i> 
                            </a>


                          </div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-pn-<?php echo $row['MaPN']; ?>" value="<?php echo $row['MaPN']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ngay-pn-<?php echo $row['MaPN']; ?>" value="<?php echo $row['Ngaynhap']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-mo-ta-pn-<?php echo $row['MaPN']; ?>" value="<?php echo $row['MoTa']; ?>">
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
<div class="modal fade" id="qltv-modal-them-pn" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Phiếu Nhập</h4>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
		          <label>Ngày Tạo Phiếu Nhập </label>
		          <input type="date" class="form-control" name="" id="ngay-pn-them" placeholder="ngày Nhập" required autocomplete="on">
		    </div>
        <div class="form-group">
          <label>Mô Tả Phiếu Nhập</label>
          <input type="text" class="form-control" name="" id="mo-ta-pn-them" placeholder="mô tả phiếu Nhập" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-pn">Thêm Phiếu</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-sua-pn" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh Sửa Phiếu Nhập</h4>
      </div>
      <div class="modal-body">
      
        <div class="form-group">
		          <label>Ngày Tạo Phiếu Nhập </label>
		          <input type="date" class="form-control" name="" id="ngay-pn-sua" placeholder="ngày Nhập" required autocomplete="on">
		    </div>
        <div class="form-group">
          <label>Mô Tả Phiếu Nhập</label>
          <input type="text" class="form-control" name="" id="mo-ta-pn-sua" placeholder="mô tả phiếu Nhập" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="ma-pn-sua-old">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-pn">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Xoa loại sách -->
<div class="modal fade in" id="qltv-modal-xoa-pn" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Phiếu Nhập</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa Phiếu Nhập này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-pn-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-pn">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div>

<!-- Combined Modal: Thêm loại sách và hiển thị chi tiết -->
<div class="modal fade" id="qltv-modal-them-tb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg for a larger modal -->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Thiết Bị và Xem Chi Tiết</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã Imei Thiết Bị</label>
          <input type="text" class="form-control" id="ma-sach-them" placeholder="Mã Imei thiết bị" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên Thiết Bị</label>
          <input type="text" class="form-control" id="ten-sach-them" placeholder="Tên thiết bị" required autocomplete="on">
        </div>
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
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Năm Sản Xuất</label>
              <input type="text" class="form-control" id="nam-xuat-ban-sach-them" placeholder="Năm sản xuất" required autocomplete="on">
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
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Dung Lượng (GB)</label>
              <input type="text" class="form-control" id="so-trang-sach-them" placeholder="Dung lượng" required autocomplete="on">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="so-luong-sach-them" value="0">
            </div>
            <div class="form-group">
              <label>Giá</label>
              <input type="text" class="form-control" id="gia-sach-them" placeholder="Giá" required autocomplete="on">
            </div>
            <div class="form-group">
              <label>Mã Phiếu</label>
              <input type="text" class="form-control" id="pn-them" placeholder="Mã Phiếu" required autocomplete="off" readonly>
            </div>
            <div class="form-group">
              <label>Ngày Nhập</label>
              <input type="date" class="form-control" id="ngay-nhap-sach-them" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <input type="text" hidden="hidden" id="hinh-anh-sach-them-src">
          </div>
        </div>
        <!-- Table to display details -->
        <div class="windows-table animated fadeIn">
          <table id="qltv-loai-sach1" class="table table-striped">
              <thead>
                  <tr role="row">
                    <tr style="background-color: #e0e0e0;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã Imei Thiết Bị</th>
                    <th class="giua">Tên Thiết Bị</th>
                    <th class="giua">Loại Thiết Bị</th>
                    <th class="giua">Nhà Sản Xuất</th>
                    <th class="giua">Xuất Xứ</th>
                    <th class="giua">Năm Sản Xuất</th>
                    <th class="giua">Dung Lượng</th>
                    <th class="giua">Giá</th>
                    <th class="giua">Ngày Nhập</th>
                    <th class="giua">Thao Tác</th>
                  </tr>
                </thead>
                <tbody>
                <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-sach">Thêm thiết bị</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    document.title = "VIETNAMPOST";
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#them-phieu").addClass("active");
    });
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
    $('#qltv-loai-sach').DataTable();
    $(document).ready(function() {
        document.getElementById("pn-them").readOnly = true;
        $('#qltv-pn').DataTable();
        $("#themloaisach").click(function(){
            $("#qltv-modal-them-pn").modal("show");
        });
        $("#nut-them-pn").click(function(){
            var manv = '<?php echo $manv; ?>';
            $.ajax({
                url : "ajax/ajax_them_pn.php",
                type : "post",
                dataType:"text",
                data : {
                    ma: $("#ma-pn-them").val(),
                    ngay: $("#ngay-pn-them").val(),
                    mota: $("#mo-ta-pn-them").val(),
                    nv: manv
                },
                success : function (data){
                    updateMainTable(); // Update the main table content
                    $("#qltv-modal-them-pn").modal("hide");
                }
            });
        });
        $(".btn-sua-pn").click(function(){
            var id = $(this).attr("data-qltv");
            $("#ngay-pn-sua").val($("#id-ngay-pn-"+id).val().trim());
            $("#mo-ta-pn-sua").val($("#id-mo-ta-pn-"+id).val().trim());
            $("#ma-pn-sua-old").val($("#id-ma-pn-"+id).val().trim());
            $("#qltv-modal-sua-pn").modal("show");
        });
        $("#nut-sua-pn").click(function(){
            $.ajax({
                url : "ajax/ajax_sua_pn.php",
                type : "post",
                dataType: "text",
                data : {
                    ngay: $("#ngay-pn-sua").val(),
                    mota: $("#mo-ta-pn-sua").val(),
                    maold: $("#ma-pn-sua-old").val() // Ensure that 'maold' value is included here
                },
                success : function (data){
                    updateMainTable(); // Update the main table content
                    $("#qltv-modal-sua-pn").modal("hide");
                }
            });
        });
        $(".btn-xoa-pn").click(function(){
            var id = $(this).attr("data-qltv");
            $("#ma-pn-xoa").val($("#id-ma-pn-"+id).val().trim());
            $("#qltv-modal-xoa-pn").modal("show");
        });
        $("#nut-xoa-pn").click(function(){
            $.ajax({
                url : "ajax/ajax_xoa_pn.php",
                type : "post",
                dataType:"text",
                data : {
                    ma: $("#ma-pn-xoa").val()
                },
                success : function (data){
                    updateMainTable(); // Update the main table content
                    $("#qltv-modal-xoa-pn").modal("hide");
                }
            });
        });

        $(".btn-combined").on('click', function() {
            var maPN = $(this).data('ma-pn');
            var qltv = $(this).data('qltv');
            // First AJAX request to get book details
            $.ajax({
                url: 'ajax/ajax_lay_thong_tin_sach.php',
                type: 'GET',
                data: { MaPN: maPN },
                dataType: 'json',
                success: function(response) {
                    if (response.status === "error") {
                        alert(response.message);
                        return;
                    }
                    var tbody = $('#qltv-loai-sach1 tbody');
                    tbody.empty();

                    $.each(response, function(index, item) {
                        var row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.MaS}</td>
                            <td>${item.TenS}</td>
                            <td>${item.TenLS}</td>
                            <td>${item.TenTG}</td>
                            <td>${item.TenNXB}</td>
                            <td>${item.NamXB}</td>
                            <td>${item.SoTrang}</td>
                            <td>${item.Gia}</td>
                            <td>${item.NgayNhap}</td>
                            <td><button class="btn btn-danger btn-sm xoa-thiet-bi" data-ma-tb="${item.MaS}">Xóa</button></td>
                        </tr>`;
                        tbody.append(row);
                    });

                    // Show the modal for adding devices
                    $("#qltv-modal-them-tb").modal("show");
                    $("#pn-them").val(qltv);
                },
                error: function(xhr, status, error) {
                    alert('Lỗi khi lấy dữ liệu từ server: ' + xhr.responseText);
                }
            });
            // Event handler for adding a book
            $("#nut-them-sach").off('click').on('click', function(){
                var pn = $("#pn-them").val();
                $.ajax({
                    url: "ajax/ajax_them_sach.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        pn: pn,
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
                    success: function (data){
                        updateModalTable(); // Update the modal table content
                    }
                });
            });
        });
    });

    //xóa
    $(document).on('click', '.xoa-thiet-bi', function() {
        var maS = $(this).data('ma-tb');
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa thiết bị này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'ajax/ajax_xoa_tb_nhap.php',
                    type: 'POST',
                    data: { MaS: maS },
                    success: function(response) {
                        Swal.fire({
                            title: 'Xóa thiết bị thành công!',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                        }).then(() => {
                            updateModalTable(); // Update the modal table content
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Lỗi khi xóa thiết bị',
                            text: xhr.responseText,
                            icon: 'error',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK',
                        });
                    }
                });
            }
        });
    });

    function updateMainTable() {
        $.ajax({
            url: 'ajax/ajax_lay_thong_tin_pn.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var tbody = $('#qltv-pn tbody');
                tbody.empty();
                $.each(response, function(index, item) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.MaPN}</td>
                        <td>${item.NgayPN}</td>
                        <td>${item.MoTa}</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-sua-pn" data-qltv="${item.MaPN}">Sửa</button>
                            <button class="btn btn-danger btn-sm btn-xoa-pn" data-qltv="${item.MaPN}">Xóa</button>
                        </td>
                    </tr>`;
                    tbody.append(row);
                });
            },
            error: function(xhr, status, error) {
                alert('Lỗi khi cập nhật bảng: ' + xhr.responseText);
            }
        });
    }

    function updateModalTable() {
        var maPN = $("#pn-them").val();
        $.ajax({
            url: 'ajax/ajax_lay_thong_tin_sach.php',
            type: 'GET',
            data: { MaPN: maPN },
            dataType: 'json',
            success: function(response) {
                if (response.status === "error") {
                    alert(response.message);
                    return;
                }
                var tbody = $('#qltv-loai-sach1 tbody');
                tbody.empty();
                $.each(response, function(index, item) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${item.MaS}</td>
                        <td>${item.TenS}</td>
                        <td>${item.TenLS}</td>
                        <td>${item.TenTG}</td>
                        <td>${item.TenNXB}</td>
                        <td>${item.NamXB}</td>
                        <td>${item.SoTrang}</td>
                        <td>${item.Gia}</td>
                        <td>${item.NgayNhap}</td>
                        <td><button class="btn btn-danger btn-sm xoa-thiet-bi" data-ma-tb="${item.MaS}">Xóa</button></td>
                    </tr>`;
                    tbody.append(row);
                });
            },
            error: function(xhr, status, error) {
                alert('Lỗi khi cập nhật bảng modal: ' + xhr.responseText);
            }
        });
    }
</script>
