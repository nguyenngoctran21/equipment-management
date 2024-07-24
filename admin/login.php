<html>
	<head>
		<title>VIETNAMPOST</title>
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<style type="text/css">
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

.login-left img {
    width: 150px;
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



#name-system{
    text-align: center;
    color: #04488a;
    width: 495px;
}
		</style>
	</head>
	<!-- <body>
		<div class="login-page">
		  <div class="logo animated bounceInDown" style="text-align: center; margin-bottom: 30px;margin-top: 30px;">
		  	<img src="../images/17.png" style="width: 250px;">
		  </div>
		  <div class="form animated bounceIn">
		    <form class="login-form" action="control/ctrl_login.php" method="post">
		      <input type="text" placeholder="tên đăng nhập" name="username">
		      <input type="password" placeholder="mật khẩu" name="password">
		      <input type="submit" name="" value="đăng nhập" class="nut-sub">
		      <p class="message"><a href="quenmatkhau.php">Quên mật khẩu?</a></p>
		    </form>
		  </div>
		</div>
	</body> -->
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIETNAMPOST</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            
        </div>
        <div class="login-right animated bounceIn">
            <h2  style="display: flex; justify-content: center; align-items: center; flex-direction: column " class="h3 mb-4 fw-bolder">VIETNAMPOST LOGIN</h2>
            <form action="control/ctrl_login.php" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="username" id="username" required placeholder="tên đăng nhập">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" class="form-control" name="password" id="password" required placeholder="mật khẩu">
                    </div>
                </div>
                <p class="message"><a href="quenmatkhau.php">Quên mật khẩu?</a></p>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
