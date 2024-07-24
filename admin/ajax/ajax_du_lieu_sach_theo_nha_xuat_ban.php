<?php 
session_start();
include_once("ajax_config.php");

function tv_get_sach_tu_nha_xuat_ban($ma){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();

    $query = "SELECT sach.*, phieuxuat.MaK FROM phieuxuat
              JOIN khoa ON khoa.MaK = phieuxuat.MaK
              JOIN muontra ON muontra.MaPX = phieuxuat.MaPX
              JOIN sach ON sach.MaS = muontra.MaS
              WHERE phieuxuat.MaK = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ma);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])){
    if(!qltv_login_tt($_SESSION['username'], $_SESSION['password'])){
        header("Location: ../login.php");
        exit();
    } else {
        if (isset($_POST['ma']) && isset($_POST['ten'])) {
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $dulieu = tv_get_sach_tu_nha_xuat_ban($ma);
?>

<table id="qltv-loai-sach" class="table table-striped">
    <thead>
        <tr style="background-color: #e0e0e0; color: #7d7d7d; border-top: 3px solid #9e9e9e;">
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
    </thead>
    <tbody>
        <?php 
        $stt = 1;
        while ($row = mysqli_fetch_assoc($dulieu)) { 
        ?>
            <tr>
                <th class="giua"><?php echo $stt; ?></th>
                <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
                <td><?php echo $row['TenS']; ?></td>
                <!-- <td><?php echo $row['TenLS']; ?></td>
                <td><?php echo $row['TenTG']; ?></td>
                <td><?php echo $row['TenNXB']; ?></td> -->
                <td class="giua"><?php echo $row['NamXB']; ?></td>
                <td class="giua"><?php echo $row['SoTrang']; ?></td>
                <td><?php echo $row['Gia']; ?></td>
                <td class="giua"><?php echo $row['NgayNhap']; ?></td>
            </tr>
        <?php
            $stt++;
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>

<?php
        } else {
            echo "Invalid input.";
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
