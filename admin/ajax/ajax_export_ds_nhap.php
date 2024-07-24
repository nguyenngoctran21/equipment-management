<?php 
session_start();
include_once("ajax_config.php");

function tv_get_sach(){
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT s.MaS, s.TenS, ls.TenLS, tg.TenTG, nxb.TenNXB, s.NamXB, s.SoTrang, s.Gia, s.NgayNhap, pn.MaPN
              FROM sach s
              JOIN tacgia tg ON s.MaTG = tg.MaTG
              JOIN loaisach ls ON s.MaLS = ls.MaLS
              JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
              JOIN phieunhap pn ON s.MaPN = pn.MaPN
              WHERE s.XoaSach = '0'";
    $result = mysqli_query($conn, $query);
    return $result;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        $sdm = tv_get_sach();
        if (!$sdm) {
            die("Failed to retrieve data.");
        }
?>

<style>
    #qltv-loai-sach {
        width: 100%;
        border-collapse: collapse; /* Loại bỏ khoảng cách giữa các ô */
    }
    #qltv-loai-sach th, #qltv-loai-sach td {
        border: 1px solid #ccc; /* Đường viền cho từng ô */
        padding: 8px; /* Khoảng cách nội dung với đường viền */
        text-align: center; /* Căn giữa nội dung */
    }
    #qltv-loai-sach th {
        background-color: #f2f2f2; /* Màu nền cho tiêu đề cột */
    }
</style>

<table id="qltv-loai-sach" class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Phiếu Nhập</th>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Loại Sách</th>
            <th>NXB</th>
            <th>Năm XB</th>
            <th>Số Trang</th>
            <th>Giá</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $stt = 1;
    while ($row = mysqli_fetch_assoc($sdm)) {
        echo "<tr>";
        echo "<td>{$stt}</td>";
        echo "<td>{$row['MaPN']}</td>";
        echo "<td><a>{$row['MaS']}</a></td>";
        echo "<td>{$row['TenS']}</td>";
        echo "<td>{$row['TenLS']}</td>";
        echo "<td>{$row['TenNXB']}</td>";
        echo "<td>{$row['NamXB']}</td>";
        echo "<td>{$row['SoTrang']}</td>";
        echo "<td>{$row['Gia']}</td>";
        echo "</tr>";
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
<script type="text/javascript">
    $('#qltv-loai-sach').DataTable();
</script>
<script>
    window.onload = () => {
        window.print();
    }
</script>
