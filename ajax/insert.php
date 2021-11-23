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
					  <h2 class="pull-left">Thêm sinh viên</h2>
					</div>

					<form action="" method="POST" id="insert_sv">
						<div class="form-group">
							<label for="">Họ</label>
							<input type="text" class="form-control" id="firstName" placeholder="Nhập họ tên đệm" name="firstName">
						</div>
					
						<div class="form-group">
							<label for="">Tên</label>
							<input type="text" class="form-control" id="lastName" placeholder="Nhập tên" name="lastName">
						</div>	

						<div class="form-group">
							<label for="">Ngày sinh</label>
							<input class="form-control" type="date" id="dateOfBirth" name="dateOfBirth">
						</div>

						<div class="form-group">
					        <label for="gioitinh">Giới tính: </label>
					        <select class="form-control" id="gender" name="gender">
						        <option value="Nam">Nam</option>
						        <option value="Nữ">Nữ</option>
						        <option value="Khác">Khác</option>
					      	</select>
				      </div>

						<div class="form-group">
							<label for="">Địa chỉ</label>
							<input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
						</div>

						<div class="form-group">
							<label for="">Mã sinh viên</label>
							<input type="text" class="form-control" id="idCard" placeholder="Nhập mã sinh viên" name="idCard">
						</div>

						<div class="form-group">
							<label for="">Lớp</label>
							<input type="text" class="form-control" id="class" placeholder="Nhập lớp" name="class">
						</div>

						<div class="form-group">
							<label for="">Số điện thoại</label>
							<input type="text" class="form-control" id="phonenum" placeholder="Nhập số điện thoại" name="phonenum">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="email" placeholder="Nhập email" name="email">
						</div>

						<div class="form-group"> 
				      		<label for="department">Nghành</label>
				      		<select class="form-control" id="department" name="department">
				      			<?php
				      			require '../admin/connect.php';
				      			$sql1 = "SELECT * FROM department";
								$query1 = mysqli_query($conn, $sql1);
				      			if (mysqli_num_rows($query1) > 0) {
				      				while($row1 = mysqli_fetch_assoc($query1)){
					        			echo "<option value=".$row1['code'].">".$row1['display_name']."</option>";
					        		}
				      			}
					        	?>
				      		</select>
				   		</div>

				   		<div class="form-group">
							<label for="">GPA</label>
							<input type="text" class="form-control" id="gpa" placeholder="Nhập gpa" name="gpa">
						</div>
					
						<button href="../sinhvien.php" type="submit" id="button_insert" class="btn btn-success">Thêm</button>
						<a href="../sinhvien.php" class="btn btn-primary">Hủy</a>
					</form>
				</div>
			</div>
		</div>	

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script type="text/javascript">

			$('#button_insert').on('click',function(){
				var first_name = $('#firstName').val();
				var last_name = $('#lastName').val();
				var date_of_birth = $('#dateOfBirth').val();
				var gender = $('#gender').val();
				var address = $('#address').val();
				var id_card = $('#idCard').val();
				var _class = $('#class').val();
				var phonenumber = $('#phonenum').val();
				var email = $('#email').val();
				var department_code = $('#department').val();
				var gpa = $('#gpa').val();

				if( first_name == '' || last_name == '' || date_of_birth == '' || gender == '' || address == '' || id_card == '' || _class == '' || phonenumber == '' || email == '' || department_code == '' || gpa == ''){
					alert('Không được để trống các trường');
				}else{
					$.ajax({
						url: "ajax_action.php",
						method:"POST",
						data:{first_name:first_name,last_name:last_name,date_of_birth:date_of_birth,gender:gender,address:address,id_card:id_card,_class:_class,phonenumber:phonenumber,email:email,department_code:department_code,gpa:gpa},
						success:function(data){
							alert('Thêm thành công');
						}
					});
				}

			});
		</script>
	</body>
</html>