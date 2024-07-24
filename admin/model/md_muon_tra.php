<?php 
    include_once("config.php");

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
    

    function tv_get_sach_muon(){
        $ketnoi = new clsKetnoi();
        $conn = $ketnoi->ketnoi();
        $query = "SELECT MaS, TenS 
                  FROM sach 
                  WHERE XoaSach = '0' 
                  ORDER BY TenS ASC";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function tv_get_doc_gia_muon(){
        $ketnoi = new clsKetnoi();
        $conn = $ketnoi->ketnoi();
        $query = "SELECT MaK, TenK 
                  FROM khoa 
                  ORDER BY TenK ASC";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function tv_get_quanhuyen(){
      $ketnoi = new clsKetnoi();
      $conn = $ketnoi->ketnoi();
      $query = "SELECT QH_Ma, QH_Ten
                FROM quanhuyen
                ORDER BY QH_Ten ASC";
      $result = mysqli_query($conn, $query);
      return $result;
  }
    function tv_get_phieu_xuat(){
        $ketnoi = new clsKetnoi();
        $conn = $ketnoi->ketnoi();
        $query = "SELECT MaPX ,Ngayxuat
                  FROM phieuxuat 
                  ORDER BY MaPX ASC";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function tv_get_tra(){
        $ketnoi = new clsKetnoi();
        $conn = $ketnoi->ketnoi();
        $query = "SELECT DISTINCT ct.Id, ct.MaNV, nv.TenNV, ct.MaK, k.TenK, ct.MaS, s.TenS, ct.NgayTra, ct.SLTra ,q.QH_Ma
                  FROM cttra ct
                  JOIN nhanvien nv ON ct.MaNV = nv.MaNV
                  JOIN khoa k ON ct.MaK = k.MaK
                  JOIN quanhuyen q ON q.QH_Ma = q.QH_Ma
                  JOIN sach s ON ct.MaS = s.MaS 
                  GROUP BY ct.Id, ct.MaNV, nv.TenNV, ct.MaK, k.TenK, ct.MaS, s.TenS, ct.NgayTra, ct.SLTra,q.QH_Ma";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // function get_buu_cuc_by_qh_ma($qh_ma) {
    //   $ketnoi = new clsKetnoi();
    //   $conn = $ketnoi->ketnoi();
    //   $query = "SELECT MaK, TenK FROM khoa WHERE QH_Ma = '$qh_ma' ORDER BY TenK ASC";
    //   $result = mysqli_query($conn, $query);
    //   return $result;
    // }
  
  
?>

