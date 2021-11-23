<?php 

	require 'admin/connect.php';
	session_start();

	$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

	if (isset($_POST['id']) && !empty($_POST['id'])) {
		require_once 'admin/connect.php';

		$sql = "DELETE FROM students WHERE id=?";

		if ($stmt = mysqli_prepare($conn, $sql)) {
			mysqli_stmt_bind_param($stmt, "i", $param_id);

			$param_id = trim($_POST["id"]);

			if (mysqli_stmt_execute($stmt)) {
				header('location: sinhvien.php');
				exit();
			}else{
				echo "Trang bị lỗi. Hãy thử lại!";
			}
		}
		//mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}else{
		if(empty(trim($_GET["id"]))){
			header('location: err.php');
			exit();	
		}
	}
	
?>

<!DOCTYPE html>
<html lang="vn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Xóa sinh viên</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.has-error{
			    color: red;
			}
		</style>
	</head>
	<body id="myPage">

		<div class="container" style="margin-bottom: 25px;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">						
					</div>
					<div class="col-md-8">
						<div class="page-header clearfix">
						  <h2 class="pull-left">Xóa sinh viên</h2>
						</div>

						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
							<div class="alert alert-danger fade in">
								<input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
								<p>Bạn có muốn xóa sinh viên này?</p> <br>
								<p>
									<input type="submit" value="Xóa" class="btn btn-danger">
									<a href="sinhvien.php" class="btn btn-primary">Không</a>
								</p>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>