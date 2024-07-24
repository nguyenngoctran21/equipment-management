<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIETNAMPOST</title>
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            display: flex;
            width: 80%;
            height: 90%;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .login-left {
            flex: 1;
            background: url('../images/bg-login.png') no-repeat center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 20px;
        }
        .login-right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-right h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }
        .login-right .btn-primary {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .login-right .btn-primary:hover {
            background-color: #ec971f;
            border-color: #ec971f;
        }
        #name-system {
            text-align: center;
            color: #04488a;
            width: 495px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <!-- Add any content or logo here if needed -->
        </div>
        <div class="login-right animated bounceIn">
		<h3 class="h3 mb-4 fw-bolder" style="text-align: center; color: black;">Quên mật khẩu?</h3>

            <div class="form">
                <div class="mb-3">
                    <label for="omail" class="form-label">Nhập mail để lấy lại mật khẩu</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" id="omail" name="username" placeholder="Nhập email" required>
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" id="guimail">Gửi mail quên mật khẩu</button>
                </div>
                <br>
                <p class="message" style="text-align: center;"><a href="index.php"><< Quay lại trang đăng nhập</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#guimail").click(function(){
                $.ajax({
                    url: "ajax/ajax_quen_mat_khau.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        omail: $("#omail").val().trim()
                    },
                    success: function(data){
                        $("body").append(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
