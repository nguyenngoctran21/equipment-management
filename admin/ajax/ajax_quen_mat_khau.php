<?php 
    include_once("../config/config.php");
    function matkhau() {
        $bangchucai = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $matkhauduoctao = array();
        $chieudaimang = strlen($bangchucai) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $chieudaimang);
            $matkhauduoctao[] = $bangchucai[$n];
        }
        return implode($matkhauduoctao); //turn the array into a string
    }
    $ketnoi = new clsKetnoi();
    $conn = $ketnoi->ketnoi();
    
    if (!($ketnoi->tontai("SELECT * FROM nhanvien WHERE Mail = N'".$_POST['omail']."' AND TrangThaiNV = '0' AND DaXoa = '0'"))) { ?>
    <script type="text/javascript">alert("Không tìm thấy mail trong hệ thống!")</script>    
    <?php exit();}
    $mk = matkhau();
    $mk_md5 = md5($mk);
    $hoi = "
        UPDATE `nhanvien` SET `MatKhau` = '$mk_md5' WHERE `nhanvien`.`Mail` = '".$_POST['omail']."'
    ";
    if (mysqli_query($conn,$hoi)) {
        include_once ("../mail/class.phpmailer.php");  
        include_once ("../mail/class.smtp.php");    
        $dc = $_POST['omail'];
        $mail = new PHPMailer();  
        $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'nienluanart@gmail.com';                 // SMTP username
        $mail->Password = 'wvylahrbypqqwdhh';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('nienluanart@gmail.com', 'VIETNAMPOST');
        $mail->addAddress($dc);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'VIETNAMPOST - Reset Mật Khẩu';
        $mail->Body    = '
        <div style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; color: #333;">
            <h2 style="background-color: #009085; color: #fff; padding: 10px 20px; text-align: center; border-radius: 5px;">RESET MẬT KHẨU</h2>
            <p>Chào bạn,</p>
            <p>Mật khẩu mới của bạn là:</p>
            <p style="font-size: 18px; font-weight: bold; background: #f9f9f9; padding: 10px 20px; border: 1px solid #ddd; border-radius: 5px; display: inline-block;">'.$mk.'</p>
            <p>Vui lòng đăng nhập và đổi mật khẩu ngay sau khi đăng nhập để đảm bảo an toàn tài khoản.</p>
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
            <p>Trân trọng,</p>
            <p><strong>VIETNAMPOST</strong></p>
            <div style="background-color: #f0f0f0; padding: 10px 20px; border-radius: 5px; text-align: center; margin-top: 20px;">
                <p style="margin: 0;"><i>Gửi từ hệ thống VIETNAMPOST</i></p>
            </div>
        </div>';
        $mail->AltBody = 'Mật khẩu mới của bạn là: '.$mk; 
        if(!$mail->Send())   
        {   
            echo "<script type=\"text/javascript\">alert('Mail gửi bị lỗi! Vui lòng kiểm tra kết nối mạng!')</script>";
            exit();  
        }   
        else   
        {   
            echo "<script type=\"text/javascript\">alert('Mail đã được gửi đến ".$_POST['omail']."')</script>";
            exit();
        } 
    }
?>
