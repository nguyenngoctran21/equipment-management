<?php 
	session_start();
	include_once("ajax_config.php");
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			include_once ("../mail/class.phpmailer.php");  
			include_once ("../mail/class.smtp.php");    
			$tens = $_POST['tens'];
			$tendg = $_POST['tendg'];
			$dc = $_POST['dc'];
			$mail = new PHPMailer();  
			$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
			$mail->CharSet = "UTF-8";
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'nienluanart@gmail.com';                 // SMTP username
			$mail->Password = 'wvylahrbypqqwdhh';  
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('nienluanart@gmail.com', 'VIETNAMPOST');
			$mail->addAddress($dc);     // Add a recipient
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'VIETNAMPOST';
			$mail->Body    = '
			<table style="max-width:555px;background-color:#eff3f2;border-style:none;margin:0 auto;height:255px;">
				<tbody>
					<tr>
						<th colspan="2" style="height: 20px;font-size: 24px;background:#009085;color:#fff;text-align:inherit;border-left: 9px solid #23746e;padding-left: 10px;">CẢNH BÁO thiết bị QUÁ HẠN</th>
					</tr>
					<tr style="font-size: 20px;height: 20px;">
						<td style="width: 100px;font-weight: bold;padding: 0;">Tên thiết bị: </td>
						<td style="
			    padding: 0;
			">'.$tens.'</td>
					</tr>
					<tr style="font-size: 20px;height: 20px;">
						<td style="width: 80px;font-weight: bold;">Số lượng: </td>
						<td>'.$tendg.'</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color:bisque;height: 20px;text-align:end;padding-right:15px;border-right:9px solid #c6955b;"><b><i>Gửi từ | Thư viện</i></b></td>
					</tr>
				</tbody>
			</table>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
			if(!$mail->Send())   
			{   
			    echo "Loi khi goi mail!";   
			}   
			else   
			{   
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã gửi mail đến người dùng</strong>!\")</script>";
				exit();
			} 
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>