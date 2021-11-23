<?php 

	require 'admin/connect.php';
  session_start();

  $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

	if (isset($_GET['id'])&& !empty(trim($_GET['id']))) {
		require_once 'admin/connect.php';

		$sql = "SELECT * FROM students WHERE id=?";
		if ($stmt = mysqli_prepare($conn, $sql)) {
			mysqli_stmt_bind_param($stmt, "i", $param_id);

			$param_id = trim($_GET["id"]);

			if (mysqli_stmt_execute($stmt)) {
				$result = mysqli_stmt_get_result($stmt);

				if(mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

					$name = $row['display_name'];
					$dateOfBirth = $row['date_of_birth'];
					$lop = $row['class'];
					$mSV = $row['id_card'];
					$gioiTinh = $row['gender'];
					$diaChi = $row['address'];
					$sDT = $row['phone_number'];
					$email = $row['email'];
					$gpa = $row['gpa'];

					$department_id = $row['department_id'];
					$sql1 = "SELECT * FROM department WHERE id ='$department_id'";
					$query1 = mysqli_query($conn, $sql1);
					$data = mysqli_fetch_assoc($query1);
					$nganh = $data['display_name'];
				}else{
					header('location: err.php');
					exit();
				}
			}else{
				echo "Trang bị lỗi. Hãy thử lại!";
			}
		}
		mysqli_stmt_close($stmt);

		mysqli_close($conn);
	}else{
		header('location: err.php');
		exit();	
	}
?>

<!DOCTYPE html>
<html lang="vn">
<head>

  <title>Xem chi tiết sinh viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
 
</head>

<body id="myPage">

	<?php require 'nav.php' ?>

	<div class="container" style="margin-bottom: 25px; margin-top: 10px;">
		<div class="container-fluid">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="page-header clearfix">
					<h1>Xem chi tiết</h1>
					<p class="form-control-static pull-right" style="font-size: 20px;"> <?php echo $nganh ?> </p>
				</div>
			</div>
			<div class="col-md-2">
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
					<div class="col-sm-2" >	
					</div>
					<div class="col-sm-8" style="background: #3284ff;">
						<label style="color: #fff; font-size: 18px;">Thông tin cá nhân</label>	
					</div>
			</div>
			<div class="row">
    			<div class="col-sm-2" >	
					</div>
				<div class="col-sm-4" >
					<label>Họ tên</label>
					<p class="form-control-static"><?php echo $name; ?></p>
					<label>Giới tính</label>
					<p class="form-control-static"><?php echo $gioiTinh; ?></p>
					<label>Mã sinh viên</label>
					<p class="form-control-static"><?php echo $mSV; ?></p>
				</div>
				<div class="col-sm-4">
					<label>Ngày sinh</label>
					<p class="form-control-static"><?php echo date('d-m-Y', $dateOfBirth); ?></p>
					<label>Địa chỉ</label>
					<p class="form-control-static"><?php echo $diaChi; ?></p>
					<label>Lớp</label>
					<p class="form-control-static"><?php echo $lop; ?></p>
				</div>
		</div>

		<div class="row">
			<div class="col-sm-2" >	
			</div>
			<div class="col-sm-8" style="background: #3284ff;">
				<label style="color: #fff; font-size: 18px;">Thông tin liên hệ</label>	
			</div>
		</div>
		<div class="row">
    			<div class="col-sm-2" >	
					</div>
				<div class="col-sm-4" >
					<label>Số điện thoại</label>
					<p class="form-control-static"><?php echo $sDT; ?></p>
				</div>
				<div class="col-sm-4">
					<label>Email</label>
					<p class="form-control-static"><?php echo $email; ?></p>
				</div>
		</div>


		<div class="row">
					<div class="col-sm-2" >	
					</div>
					<div class="col-sm-8" style="background: #3284ff;">
						<label style="color: #fff; font-size: 18px;">Điểm</label>	
					</div>
		</div>
		<div class="row">
    			<div class="col-sm-2" >	
					</div>
				<div class="col-sm-4" >
					<p class="form-control-static"> <strong>GPA: </strong><?php echo $gpa; ?></p>
					<a href="sinhvien.php" class="btn btn-primary">Trở lại</a>
				</div>
		</div>


	</div>
</div>

<?php require 'footer.php' ?>
		
</body>