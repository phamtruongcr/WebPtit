<?php 
	include 'admin/connect.php';
	session_start();

	$err = [];
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($email)){
			$err['email'] = 'Bạn chưa nhập email';
		}
		if(empty($password)){
			$err['password'] = 'Bạn chưa nhập password';
		}

		if(empty($err)){
			$sql = "SELECT * FROM users WHERE email = '$email'";
			$query = mysqli_query($conn, $sql);
			$data = mysqli_fetch_assoc($query);
			$checkMail = mysqli_num_rows($query);
			if($checkMail == 1){
				$checkPass = password_verify($password, $data['password']);
				if($checkPass == 1){
					$_SESSION['user'] = $data;
					header('location: index.php');
				}else{
					echo "<p class='lead'><em>Sai mật khẩu</em></p>";
				}

			}else{
				echo "<p class='lead'><em>Email không tồn tại</em></p>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="vn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng nhập</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<style>
			.has-error{
				color: red;
			}
		</style>
	</head>
	<body>
		<div class="container" style="margin-top: 45px">
			<div class="row">
				<div class="col-md-3">
				</div>	
				<div class="col-md-6">
					<form action="" method="POST" role="form">
						<legend>Đăng nhập</legend>
					
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="" placeholder="Nhập email" name="email">
							<div class="has-error">
								<span><?php echo (isset($err['email'])) ? $err['email']: '' ?></span>
								
							</div>
						</div>	

						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="password">
							<div class="has-error">
								<span><?php echo (isset($err['password'])) ? $err['password']: '' ?></span>
								
							</div>
						</div>

						<button type="submit" class="btn btn-primary">Đăng nhập</button>
						<a href="index.php" class="btn btn-primary">Trở về</a>
					</form>
					
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>