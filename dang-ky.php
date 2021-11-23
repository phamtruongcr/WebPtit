<?php 
	include 'admin/connect.php';

	$err = [];
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rPassword = $_POST['rPassword'];

		if(empty($name)){
			$err['name'] = 'Bạn chưa nhập tên';
		}
		if(empty($email)){
			$err['email'] = 'Bạn chưa nhập email';
		}
		if(empty($password)){
			$err['password'] = 'Bạn chưa nhập password';
		}
		if($rPassword != $password){
			$err['rPassword'] = 'Mật khẩu nhập lại không đúng';
		}
		if(empty($err)){
			$pass = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO users(name,email,password, role) VALUES ('$name', '$email', '$pass', 'student')";
			$query = mysqli_query($conn, $sql);
			if ($query) {
			  echo "New record created successfully";
			  header('location: login.php');
			} else {
			  echo "Error: ". $sql . "<br>" . mysqli_error($conn);
			}
		}
		//die();
	}
?>

<!DOCTYPE html>
<html lang="vn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng ký</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
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
						<legend>Đăng ký tài khoản</legend>
					
						<div class="form-group">
							<label for="">Tên tài khoản</label>
							<input type="text" class="form-control" id="" placeholder="Nhập tài khoản" name="name">
							<div class="has-error">
								<span><?php echo (isset($err['name'])) ? $err['name']: '' ?></span>
								
							</div>
						</div>
					
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

						<div class="form-group">
							<label for="">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="" placeholder="Xác nhận mật khẩu" name="rPassword">
							<div class="has-error">
								<span><?php echo (isset($err['rPassword'])) ? $err['rPassword']: '' ?></span>
							</div>
						</div>
					
						<button type="submit" class="btn btn-primary">Đăng ký</button>
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