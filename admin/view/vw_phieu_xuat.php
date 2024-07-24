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
    $("#qltv-modal-them-px").modal("hide");
    $("#qltv-modal-sua-px").modal("hide");
    $("#qltv-modal-xoa-px").modal("hide");
  }

  function tailai() {
    setTimeout(function() {
      location.reload();
    }, 3000);
  }

  function dongsua() {
    $("#qltv-modal-sua-px").modal("hide");
  }

  function dongxoa() {
    $("#qltv-modal-xoa-px").modal("hide");
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
    PHIẾU XUẤT
    <div class="line"></div>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 col-ms-12">
      <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm Phiếu Xuất</a>
    </div>
    <div class="col-md-12 col-ms-12 cach"></div>
  </div>
  <div class="windows-table animated fadeIn">
    <table id="qltv-loai-sach" class="table table-striped">
      <thead>
        <tr role="row">
        <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
          <th class="giua">STT</th>
          <th class="giua">Mã Phiếu Xuất</th>
          <th class="giua">Tên Nhân Viên</th>
          <th class="giua">Tên Bưu Cục</th>
          <th class="giua">Ngày Tạo Phiếu Xuất</th>
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
            <th class="giua"><?php echo $stt++; ?></th>
            <td><a><?php echo $row['MaPX']; ?></a></td>
            <input type="text" hidden="hidden" id="id-ma-nv-mt-<?php echo $row['MaNV']; ?>" value="<?php echo $row['MaNV']; ?>">
            <td id="id-ten-nv-mt-<?php echo $row['MaNV']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
            <td id="id-ten-k-mt-<?php echo $row['MaK']; ?>"><a><?php echo isset($row['TenK']) ? $row['TenK'] : ''; ?></a></td>
            <td><?php echo $row['Ngayxuat']; ?></td>
            <td><?php echo $row['MoTa']; ?></td>
            <td class="giua">
              <div class="nut nam-giua">
                <a class="btn btn-primary btn-sua-px" data-qltv="<?php echo $row['MaPX']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="btn btn-danger btn-xoa-px" title="Xóa" data-qltv="<?php echo $row['MaPX']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a class="btn btn-success btn-combined" title="Xuất Thiết Bị và Xem Chi Tiết" data-qltv="<?php echo $row['MaPX']; ?>" data-ma-px="<?php echo $row['MaPX']; ?>" id="btn-show-modal">

                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a class="btn btn-primary printExportButton" title="Print Handover Note" data-qltv="<?php echo $row['MaPX']; ?>"><i class="fa fa-solid fa-print" aria-hidden="true"></i></a>
              </div>
            </td>
            <input type="text" hidden="hidden" name="" id="id-ma-px-<?php echo $row['MaPX']; ?>" value="<?php echo $row['MaPX']; ?>">
            <input type="text" hidden="hidden" name="" id="id-ma-k-<?php echo $row['MaPX']; ?>" value="<?php echo $row['MaK']; ?>">
            <input type="text" hidden="hidden" name="" id="id-ten-k-<?php echo $row['MaPX']; ?>" value="<?php echo $row['TenK']; ?>">
            <input type="text" hidden="hidden" name="" id="id-ngay-px-<?php echo $row['MaPX']; ?>" value="<?php echo $row['Ngayxuat']; ?>">
            <input type="text" hidden="hidden" name="" id="id-mo-ta-px-<?php echo $row['MaPX']; ?>" value="<?php echo $row['MoTa']; ?>">
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
<div class="modal fade" id="qltv-modal-them-px" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm Phiếu Xuất</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
          <div class="form-group">
            <label>Quận Huyện</label>
            <select id="ma-quanhuyen-muon" class="form-control">
              <?php
              // Kiểm tra nếu $dulieu_quanhuyen có dữ liệu
              if ($dulieu_quanhuyen && mysqli_num_rows($dulieu_quanhuyen) > 0) {
                mysqli_data_seek($dulieu_quanhuyen, 0); // Đặt con trỏ dữ liệu về đầu
                while ($row = mysqli_fetch_assoc($dulieu_quanhuyen)) {
              ?>
                  <option value="<?php echo $row['QH_Ma'] ?>"><?php echo $row['QH_Ten'] ?></option>
              <?php
                } // Kết thúc vòng lặp while okay
              } // Kết thúc điều kiện if
              ?>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Tên Bưu Cục</label>
            <select id="ma-ten-doc-gia-muon" class="form-control">

            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Ngày Tạo Phiếu Xuất </label>
          <input type="date" class="form-control" name="" id="ngay-px-them" placeholder="ngày xuất" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mô Tả Phiếu Xuất</label>
          <input type="text" class="form-control" name="" id="mo-ta-px-them" placeholder="mô tả phiếu xuất" required autocomplete="on">
        </div>
      </div>
      <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-px">Thêm Phiếu</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-sua-px" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh Sửa Phiếu Xuất</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Ngày Tạo Phiếu Xuất </label>
          <input type="date" class="form-control" name="" id="ngay-px-sua" placeholder="ngày xuất" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mô Tả Phiếu Xuất</label>
          <input type="text" class="form-control" name="" id="mo-ta-px-sua" placeholder="mô tả phiếu xuất" required autocomplete="on">
        </div>
      </div>
      <input type="text" hidden="hidden" name="" value="" id="ma-px-sua-old">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-px">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Xoa loại sách -->
<div class="modal fade in" id="qltv-modal-xoa-px" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Phiếu Xuất</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa Phiếu Xuất này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-px-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-px">Tôi chắc chắn</button>
      </div>
    </div>
  </div>
</div>

<!-- Combined Modal: Thêm Thiết Bị và Hiển Thị Chi Tiết -->
<div class="modal fade" id="qltv-modal-them-tb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg for a larger modal -->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Xuất Thiết Bị và Xem Chi Tiết</h4>
      </div>

      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="ma-tb-px-muon">Mã thiết bị</label>
            <input type="text" class="form-control" id="ma-tb-px-muon" placeholder="Mã thiết bị" required autocomplete="on">
          </div>
          <div class="form-group">
            <label>Mã Phiếu</label>
            <input type="text" class="form-control" id="px-them" placeholder="Mã Phiếu" required autocomplete="off" readonly>
          </div>

        </form>

        <!-- Table to display details -->
        <div class="windows-table animated fadeIn">
          <table id="qltv-loai-sach1" class="table table-striped">
            <thead>
              <tr style="background-color: #e0e0e0; color: #7d7d7d; border-top: 3px solid #9e9e9e;">
                <th class="giua">STT</th>
                <th class="giua">Tên Nhân Viên</th>
                <th class="giua">Phiếu Xuất</th>
                <th class="giua">Mã Thiết Bị</th>
                <th class="giua">Tên Thiết Bị</th>
                <th class="giua">Thao tác</th>
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
    $("#muc-sach").addClass("active");
  });
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
  $('#qltv-loai-sach').DataTable();
  $(document).ready(function() {
    $('#qltv-px').DataTable();

    $("#themloaisach").click(function() {
      $("#qltv-modal-them-px").modal("show");
    });

    $("#nut-them-px").click(function() {

      var manv = '<?php echo $manv; ?>';
      $.ajax({
        url: "ajax/ajax_them_px.php",
        type: "post",
        dataType: "text",
        data: {
          ma: $("#ma-px-them").val(),
          ngay: $("#ngay-px-them").val(),
          mota: $("#mo-ta-px-them").val(),
          dg: $("#ma-ten-doc-gia-muon").val(),
          
          nv: manv
        },
        success: function(data) {
          $("body").append(data);
        }
      });
    });

    $(".btn-sua-px").click(function() {
      var id = $(this).attr("data-qltv");
      $("#ngay-px-sua").val($("#id-ngay-px-" + id).val().trim());
      $("#mo-ta-px-sua").val($("#id-mo-ta-px-" + id).val().trim());
      $("#ma-px-sua-old").val($("#id-ma-px-" + id).val().trim());
      $("#qltv-modal-sua-px").modal("show");
    });

    $("#nut-sua-px").click(function() {
      $.ajax({
        url: "ajax/ajax_sua_px.php",
        type: "post",
        dataType: "text",
        data: {
          ngay: $("#ngay-px-sua").val(),
          mota: $("#mo-ta-px-sua").val(),
          maold: $("#ma-px-sua-old").val()
        },
        success: function(data) {
          $("body").append(data);
        }
      });
    });

    $(".btn-xoa-px").click(function() {
      var id = $(this).attr("data-qltv");
      $("#ma-px-xoa").val($("#id-ma-px-" + id).val().trim());
      $("#qltv-modal-xoa-px").modal("show");
    });

    $("#nut-xoa-px").click(function() {
      $.ajax({
        url: "ajax/ajax_xoa_px.php",
        type: "post",
        dataType: "text",
        data: {
          ma: $("#ma-px-xoa").val()
        },
        success: function(data) {
          $("body").append(data);
        }
      });
    });

    // Show modal and set px-them value
    $(".btn-combined").on('click', function() {
      var maPX = $(this).data('ma-px');
      var qltv = $(this).data('qltv');
      $.ajax({
        url: 'ajax/ajax_lay_ds_xuat_tb.php',
        type: 'GET',
        data: {
          MaPX: maPX
        },
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
                          <td>${item.TenNV}</td>
                          <td>${item.MaPX}</td>
                          <td>${item.MaS}</td>
                          <td>${item.TenS}</td>
                          <td><button class="btn btn-danger btn-sm xoa-thiet-bi" data-ma-tb="${item.MaS}">Xóa</button></td>
                      </tr>`;
            tbody.append(row);
          });
          $('#qltv-modal-them-tb').modal('show');
          $("#px-them").val(qltv);
        },
        error: function(xhr, status, error) {
          alert('Lỗi khi lấy dữ liệu từ server: ' + xhr.responseText);
        }
      });
    });

    // Add new device
    $("#nut-them-sach").on('click', function() {
      const tmp = $("#ma-ten-doc-gia-muon").val()
      console.log(tmp);
      var manv = '<?php echo $manv; ?>';
      $.ajax({
        url: "ajax/ajax_cho_muon_sach.php",
        type: "post",
        dataType: "text",
        data: {
          s: $("#ma-tb-px-muon").val(),
          qh_ma: $("#ma-quanhuyen-muon").val(),
          dg: $("#ma-ten-doc-gia-muon").val(),
          px: $("#px-them").val(),
          nm: $("#ngay-muon").val(),
          nv: manv
        },
        success: function(data) {
          $("body").append(data);
          updateModalTable();
        },
        error: function(xhr, status, error) {
          alert('Lỗi khi thêm thiết bị: ' + xhr.responseText);
        }
      });
    });

    // Delete device
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
            url: 'ajax/ajax_xoa_tb_xuat.php',
            type: 'POST',
            data: {
              MaS: maS
            },
            success: function(response) {
              Swal.fire({
                title: 'Xóa thiết bị thành công!',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
              }).then(() => {
                updateModalTable();
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

    function updateModalTable() {
      var maPX = $('#px-them').val();
      $.ajax({
        url: 'ajax/ajax_lay_ds_xuat_tb.php',
        type: 'GET',
        data: {
          MaPX: maPX
        },
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
                          <td>${item.TenNV}</td>
                          <td>${item.MaPX}</td>
                          <td>${item.MaS}</td>
                          <td>${item.TenS}</td>
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
    //
    $('#ma-quanhuyen-muon').change(function() {
      var selectedQH_Ma = $(this).val();
      console.log(selectedQH_Ma);
      // AJAX request to fetch data based on selected QH_Ma
      $.ajax({
        url: 'ajax/ajax_load_buu_cuc.php',
        type: 'POST',
        data: {
          QH_Ma: selectedQH_Ma
        },
        // dataType: 'json',
        success: function(response) {
          console.log(response);
          $('#ma-ten-doc-gia-muon').html(response);
        },
        error: function(xhr, status, error) {
          console.error('Error fetching data:', error);
        }
      });
    });
  });

  $('.printExportButton').on('click', function() {
    var id = $(this).attr("data-qltv");
    $.ajax({
      url: "ajax/ajax_in_px.php",
      type: "post",
      dataType: "json",
      data: {
        id: id
      },
      success: function(response) {
        console.log(response.data);
        var phieuxuatData = response.data.phieuxuat;
        var thietbiData = response.data.thietbi;

        var postOfficeAdd = phieuxuatData['TenK']; // Adjust according to your data structure
        
        var exportDeviceHtml = '';
        for (var i = 0; i < thietbiData.length; i++) {
          exportDeviceHtml += `
            <tr>
              <td style="border: 1px solid #000; padding: 8px;">${i + 1}</td>
              <td style="border: 1px solid #000; padding: 8px;">${thietbiData[i].TenS}</td>
              <td style="border: 1px solid #000; padding: 8px;">${thietbiData[i].MaS}</td>
            </tr>
          `;
        }

        var newWindowContent = `
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Trang In</title>
                        <style>
                            @media print {
                                body {
                                    font-family: "Times New Roman", Times, serif;
                                    margin: 0;
                                    padding: 0;
                                }
                                @page {
                                    margin: 0;
                                }
                                p {
                                    margin: 0px 0px 10px 0px;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div style="position: absolute; top: 300; left: 0; right: 0; text-align: center; z-index: 0;">
                            <img style="opacity: 0.3;" src="../images/minilogo.png" alt="Logo">
                        </div>
                        <div style="position: relative; z-index: 1;">
                            <p style="font-size: 23px; font-weight: bold; text-align: center; padding-top: 50px; margin: 0px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                            <p style="font-size: 21px; font-weight: bold; text-align: center; margin: 5px 0px 0px 0px;">Độc lập – Tự do – Hạnh phúc</p>
                            <p style="font-size: 23px; font-weight: bold; text-align: center; margin: 0px 0px 0px 0px;">-------------------------------------------</p>
                            <p style="font-size: 23px; font-weight: bold; text-align: center; margin: 30px 0px 30px 0px;">BIÊN BẢN GIAO NHẬN</p>
                            <p style="font-size: 18px; margin-left: 100px;">Hôm nay, ngày ... tháng ... năm ...</p>
                            <p style="font-size: 18px; font-weight: bold; margin-left: 100px;">BÊN A (BÊN GIAO, Phòng Kỹ Thuật Nghiệp Vụ): </p>
                            <div style="display:flex;">
                                <p style="font-size: 18px; margin-left: 100px;">- Ông / Bà: <input type="text" style="border-style:hidden; font-size: 18px; font-family: 'Times New Roman';" placeholder="Nhấn để nhập thông tin"/></p>
                                <p style="font-size: 18px; margin-left: 50px;">- Chức vụ: <input type="text" style="border-style:hidden; font-size: 18px; font-family: 'Times New Roman';" placeholder="Nhấn để nhập thông tin"/></p>
                            </div>
                            <p style="font-size: 18px; font-weight: bold; margin-left: 100px;">BÊN B (BÊN NHẬN, ${postOfficeAdd}): </p>
                            <div style="display:flex;">
<p style="font-size: 18px; margin-left: 100px;">- Ông / Bà: <input type="text" style="border-style:hidden; font-size: 18px; font-family: 'Times New Roman';" placeholder="Nhấn để nhập thông tin"/></p>
                                <p style="font-size: 18px; margin-left: 50px;">- Chức vụ: <input type="text" style="border-style:hidden; font-size: 18px; font-family: 'Times New Roman';" placeholder="Nhấn để nhập thông tin"/></p>
                            </div>
                            <p style="font-size: 18px; font-weight: bold; margin-left: 100px;">Nội dung:</p>
                            <p style="font-size: 18px; margin-left: 100px;">Hai bên cùng tiến hành bàn giao nhận thiết bị cụ thế như sau:</p>
                            <table style="width: 75%; border-collapse: collapse; text-align: center; margin: 0px 0px 0px 100px;">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid #000; padding: 8px;">STT</th>
                                        <th style="border: 1px solid #000; padding: 8px; text-align: center;">Tên thiết bị</th>
                                        <th style="border: 1px solid #000; padding: 8px; text-align: center;">Serial Number</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    ${exportDeviceHtml}
                                </tbody>
                            </table>
                            <p style="font-size: 18px; margin: 20px 0px 0px 100px;">Bên B đã nhận đủ số lượng và chất lượng đạt yêu cầu.</p>
                            <p style="font-size: 18px; margin: 0px 0px 50px 100px;">Biên bản được lập thành 03 bản có giá trị như nhau, bên A giữ 02 bản, bên B giữ 01 bản.</p>
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="font-size: 18px; font-weight: bold; text-align: center; padding-bottom: 150px;">XÁC NHẬN BÊN A</th>
                                        <th style="font-size: 18px; font-weight: bold; text-align: center; padding-bottom: 150px;">XÁC NHẬN BÊN B</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size: 18px; font-weight: bold; text-align: center;"></td>
                                        <td style="font-size: 18px; font-weight: bold; text-align: center;"></td>
                                    </tr>
                                </tbody>
</table>
                        </div>
                    </body>
                    </html>
                `;

        var newWindow = window.open("", "_blank");
        if (newWindow) {
          newWindow.document.open();
          newWindow.document.write(newWindowContent);
          newWindow.document.close();
        } else {
          alert("Popup blocked. Please allow popups for this site.");
        }
      }
    });
  });

  //
</script>