<?php
session_start();
include_once("ajax_config.php");

$id = $_POST['id'];

$ketnoi = new clsKetnoi();
$conn = $ketnoi->ketnoi();
$query = "SELECT * FROM `phieuxuat`
    JOIN `khoa` ON `phieuxuat`.`MaK` = `khoa`.`MaK`
    WHERE `MaPX` = '$id'";
$phieuxuat = mysqli_query($conn, $query);

$response = array();

if ($phieuxuat) {
    $phieuxuat_data = $phieuxuat->fetch_assoc();
    if ($phieuxuat_data) {
        $response['status'] = 'success';
        $response['data']['phieuxuat'] = $phieuxuat_data;

        // Query to fetch associated `thietbi` data
        $query_thietbi = "SELECT sach.*, phieuxuat.MaPX FROM phieuxuat 
                                JOIN muontra ON phieuxuat.MaPX = muontra.MaPX
                                JOIN sach ON sach.MaS = muontra.MaS
                                WHERE phieuxuat.MaPX = $id;";
                                
        $thietbi_result = mysqli_query($conn, $query_thietbi);

        if ($thietbi_result) {
            $thietbi_data = array();
            while ($row = mysqli_fetch_assoc($thietbi_result)) {
                $thietbi_data[] = $row;
            }
            $response['data']['thietbi'] = $thietbi_data;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Query failed: ' . mysqli_error($conn);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No record found.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Query failed: ' . mysqli_error($conn);
}

header('Content-Type: application/json');
echo json_encode($response);
