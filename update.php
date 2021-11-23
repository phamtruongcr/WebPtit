<?php 
	require 'admin/connect.php';

	$first_name = $last_name = $address = $date_of_birth = $email = $gender = $id_card = $phone_number = $class = $department = "";
	$err = [];

	$sql1 = "SELECT * FROM department";
	$query1 = mysqli_query($conn, $sql1);

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$id = $_POST['id'];
		
		$first_name = $_POST['firstName'];
		$last_name = $_POST['lastName'];
		$date_of_birth = strtotime($_POST['dateOfBirth']);
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$id_card = $_POST['idCard'];
		$class = $_POST['class'];
		$phone_number = $_POST['phonenum'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$gpa = $_POST['gpa'];

		$sql2 = "SELECT * FROM department WHERE code ='$department'";
		$query2 = mysqli_query($conn, $sql2);
		$data2 = mysqli_fetch_assoc($query2);
		$department_id = $data2['id'];

		if(empty($first_name)){
			$err['first_name'] = 'Bạn chưa nhập họ tên đệm';
		}elseif(!filter_var(($first_name),FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệếỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i")))){
			$err['first_name'] = 'Nhập tên sai định dạng';
		}
		if(empty($last_name)){
			$err['last_name'] = 'Bạn chưa nhập tên';
		}elseif(!filter_var(($last_name),FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệếỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i")))){
			$err['first_name'] = 'Nhập tên sai định dạng';
		}
		if(empty($date_of_birth)){
			$err['date_of_birth'] = 'Bạn chưa nhập ngày sinh';
		}
		if(empty($gender)){
			$err['gender'] = 'Bạn chưa chọn giới tính';
		}
		if(empty($address)){
			$err['address'] = 'Bạn chưa nhập địa chỉ';
		}
		if(empty($id_card)){
			$err['id_card'] = 'Bạn chưa nhập mã sinh viên';
		}
		if(empty($class)){
			$err['class'] = 'Bạn chưa nhập lớp';
		}
		if(empty($phone_number)){
			$err['phone_number'] = 'Bạn chưa nhập số điện thoại';
		}elseif (!filter_var(($phone_number), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/")))) {
			$err['phone_number'] = 'Nhập số điện thoại sai định dạng';
		}

		if(empty($department_id)){
			$err['department'] = 'Ngành lỗi';
		}
		if(empty($email)){
			$err['email'] = 'Bạn chưa nhập email';
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$err['email'] = 'Nhập sai định dạng email';
		}

		if(empty($gpa)){
			$err['gpa'] = 'Bạn chưa nhập gpa';
		}elseif (!filter_var(($gpa), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/")))) {
			$err['gpa'] = 'Nhập sai định dạng gpa';
		}

		if(empty($err)){
			$display_name = $first_name ." ". $last_name;
			//echo $department_id;

			$sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', date_of_birth='$date_of_birth', gender='$gender', address='$address', id_card='$id_card', class='$class', phone_number='$phone_number', department_id='$department_id', display_name='$display_name', email='$email', gpa='$gpa' WHERE id=?";
			if ($stmt = mysqli_prepare($conn, $sql)) {
				mysqli_stmt_bind_param($stmt, "i", $param_id);

				$param_id = $id;
				echo $param_id;
				if (mysqli_stmt_execute($stmt)) {
					header('location: sinhvien.php');
					exit();
				}else{
					echo "Trang bị lỗi. Hãy thử lại!";
				}
			}
			//mysqli_stmt_close($stmt);
			mysqli_close($conn);

		}
	}else{
		if(isset($_GET['id'])&& !empty($_GET['id'])){

			$id = trim($_GET['id']);

			$sql = "SELECT * FROM students WHERE id=?";

			if ($stmt = mysqli_prepare($conn, $sql)) {
				mysqli_stmt_bind_param($stmt, "i", $param_id);

				$param_id = $id;


				if (mysqli_stmt_execute($stmt)) {
					$result = mysqli_stmt_get_result($stmt);

					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$date_of_birth = $row['date_of_birth'];
						$gender = $row['gender'];
						$address = $row['address'];
						$id_card = $row['id_card'];
						$class = $row['class'];
						$phone_number = $row['phone_number'];
						$email = $row['email'];
						$department_id = $row['department_id'];
						$gpa = $row['gpa'];
					}else{
						header('location: err.php');
						exit(); 
					}
				}else{
					echo "Trang bị lỗi. Hãy thử lại!";
				}
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
		<title>Thêm sinh viên</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.has-error{
			    color: red;
			}
		</style>
	</head>
	<body>

		<div class="container" style="margin-bottom: 25px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">						
				</div>
				<div class="col-md-8">
					<div class="page-header clearfix">
					  <h2 class="pull-left">Sửa sinh viên</h2>
					</div>

					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<div class="form-group">
							<label for="">Họ</label>
							<input type="text" class="form-control" id="" value="<?php echo $first_name ?>" name="firstName">
							<div class="has-error">
								<span><?php echo (isset($err['first_name'])) ? $err['first_name']: '' ?></span>
								
							</div>
						</div>
					
						<div class="form-group">
							<label for="">Tên</label>
							<input type="text" class="form-control" id="" value="<?php echo $last_name ?>" name="lastName">
							<div class="has-error">
								<span><?php echo (isset($err['last_name'])) ? $err['last_name']: '' ?></span>
							</div>
						</div>	

						<div class="form-group">
							<label for="">Ngày sinh</label>
							<input class="form-control" type="date" id="" value="<?php echo date('Y-m-d', $date_of_birth) ?>" name="dateOfBirth">
							<div class="has-error">
								<span><?php echo (isset($err['date_of_birth'])) ? $err['date_of_birth']: '' ?></span>
							</div>
						</div>

						<div class="form-group">
					        <label for="gioitinh">Giới tính: </label>
					        <select class="form-control" id="" value="<?php echo $gender ?>" name="gender">
						        <option value="Nam" <?php if ($gender == "Nam") { echo " selected='selected'";} ?> >Nam</option>
						        <option value="Nữ" <?php if ($gender == "Nữ") { echo " selected='selected'";} ?>>Nữ</option>
						        <option value="Khác">Khác</option>
					      	</select>
				      </div>

						<div class="form-group">
							<label for="">Địa chỉ</label>
							<input type="text" class="form-control" id="" value="<?php echo $address ?>" name="address">
							<div class="has-error">
								<span><?php echo (isset($err['address'])) ? $err['address']: '' ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">Mã sinh viên</label>
							<input type="text" class="form-control" id="" value="<?php echo $id_card ?>" name="idCard">
							<div class="has-error">
								<span><?php echo (isset($err['id_card'])) ? $err['id_card']: '' ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">Lớp</label>
							<input type="text" class="form-control" id="" value="<?php echo $class ?>" name="class">
							<div class="has-error">
								<span><?php echo (isset($err['class'])) ? $err['class']: '' ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">Số điện thoại</label>
							<input type="text" class="form-control" id="" value="<?php echo $phone_number ?>" name="phonenum">
							<div class="has-error">
								<span><?php echo (isset($err['phone_number'])) ? $err['phone_number']: '' ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="" value="<?php echo $email ?>" name="email">
							<div class="has-error">
								<span><?php echo (isset($err['email'])) ? $err['email']: '' ?></span>
							</div>
						</div>

						<div class="form-group"> 
				      		<label for="department">Nghành</label>
				      		<select class="form-control" id="nghanh" name="department">
				      			<?php 
				      			if (mysqli_num_rows($query1) > 0) {
				      				while($row1 = mysqli_fetch_assoc($query1)){
				      					if ($row1[id] == $department_id) {
				      						echo "<option value=".$row1['code']." selected='selected' >".$row1['display_name']."</option>";
				      					}else{
				      						echo "<option value=".$row1['code'].">".$row1['display_name']."</option>";
				      					}
					        			
					        		}
				      			}
					        	?>
				      		</select>
				   		</div>

				   		<div class="form-group">
							<label for="">GPA</label>
							<input type="text" class="form-control" id="" value="<?php echo $gpa ?>" name="gpa">
							<div class="has-error">
								<span><?php echo (isset($err['gpa'])) ? $err['gpa']: '' ?></span>
							</div>
						</div>

				   		<input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
					
						<button href="sinhvien.php" type="submit" class="btn btn-success">Cập nhật</button>
						<a href="sinhvien.php" class="btn btn-primary">Hủy</a>
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

