<?php 
session_start();
include_once("ajax_config.php");

function tv_get_muon() {
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    $query = "SELECT 
                m.Id, 
                nv.Id as 'IdNV', 
                m.MaNV, 
                nv.TenNV, 
                m.MaS, 
                s.TenS, 
                m.NgayMuon, 
                m.NgayTra, 
                m.TrangThai, 
                m.SLMuon, 
                m.GiaHan, 
                m.SLThucTe, 
                px.MaPX
              FROM 
                muontra m
              JOIN 
                nhanvien nv ON m.MaNV = nv.MaNV
              JOIN 
                sach s ON m.MaS = s.MaS 
              JOIN 
                phieuxuat px ON m.MaPX = px.MaPX
              ORDER BY 
                m.Id DESC";
    $result = mysqli_query($conn, $query);
    return $result;
}

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if (!qltv_login_tt($_SESSION['username'], $_SESSION['password'])) {
        header("Location: ../login.php");
    } else {
        // Fetch data
        $dulieu = tv_get_muon();
        if (!$dulieu) {
            die("Failed to retrieve data.");
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách mượn trả thiết bị</title>
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
                margin: 0px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <table id="qltv-loai-sach" class="table table-striped">
        <thead>
            <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                <th class="giua">STT</th>
                <th class="giua">Tên Nhân Viên</th>
                <th class="giua">Phiếu Xuất</th>
                <th class="giua">Mã Thiết Bị</th>
                <th class="giua">Tên Thiết Bị</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $stt = 1;
                while ($row = mysqli_fetch_assoc($dulieu)) { 
            ?>
            <tr data-id="<?php echo $row['Id']; ?>" data-manv="<?php echo $row['MaNV']; ?>" data-mapx="<?php echo $row['MaPX']; ?>" data-mas="<?php echo $row['MaS']; ?>">
                <td class="giua"><?php echo $stt; ?></td>
                <td><?php echo $row['TenNV']; ?></td>
                <td><?php echo $row['MaPX']; ?></td>
                <td><?php echo $row['MaS']; ?></td>
                <td><?php echo $row['TenS']; ?></td>
            </tr>
            <?php
                    $stt++;
                }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php   
    }
} else {
    echo "<script type=\"text/javascript\">trangdangnhap()</script>";
    exit();
}
?>
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
    $(document).ready(function() {
        $('#qltv-loai-sach').DataTable();
        window.print();
    });
</script>
<script>
	window.onload = ()=> {
		window.print();
	}
</script>