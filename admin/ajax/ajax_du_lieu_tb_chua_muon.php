<?php 
session_start();
include_once("ajax_config.php");

function tv_get_sach_chua_muon() {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT s.MaS, s.TenS, ls.TenLS, s.SL 
              FROM sach s 
              JOIN loaisach ls ON s.MaLS = ls.MaLS 
              WHERE s.MaS NOT IN (SELECT m.MaS FROM muontra m) 
              GROUP BY s.MaS, s.TenS, ls.TenLS, s.SL";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    return $result;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        // Fetch data
        $sdm = tv_get_sach_chua_muon();
        if (!$sdm) {
            die("Failed to retrieve data.");
        }
?>

<table id="qltv-loai-sach" class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Mã Thiết Bị</th>
            <th class="text-center">Tên Thiết Bị</th>
            <th class="text-center">Loại Thiết Bị</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $stt = 1;
        while ($row = mysqli_fetch_assoc($sdm)) {
    ?>
        <tr>
            <td class="text-center"><?php echo $stt; ?></td>
            <td class="text-center"><a>S<?php echo $row['MaS']; ?></a></td>
            <td><?php echo $row['TenS']; ?></td>
            <td><?php echo $row['TenLS']; ?></td>
        </tr>
    <?php
            $stt++;
        }
    ?>
    </tbody>
</table>
<?php   
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
<style type="text/css">
    /* CSS để định dạng bảng */
    #qltv-loai-sach {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px; /* Khoảng cách từ đầu trang */
    }
    #qltv-loai-sach th, #qltv-loai-sach td {
        border: 1px solid #ddd; /* Đường viền cho ô */
        padding: 8px; /* Khoảng cách nội dung với đường viền */
        text-align: center; /* Căn giữa nội dung */
    }
    #qltv-loai-sach th {
        background-color: #f2f2f2; /* Màu nền cho tiêu đề cột */
        color: #333; /* Màu chữ cho tiêu đề cột */
    }
</style>
<script type="text/javascript">
    // Script để kích hoạt DataTables
    $(document).ready(function() {
        $('#qltv-loai-sach').DataTable();
    });
</script>
<script>
    // Script để in bảng khi tải xong trang
    window.onload = () => {
        window.print();
    }
</script>
