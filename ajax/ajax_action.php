<?php 
	require '../admin/connect.php';
	
	$id = uniqid();

	if(isset($_POST['first_name'])){
		$first_name = trim($_POST['first_name']);
		$last_name = trim($_POST['last_name']);
		$date_of_birth = strtotime($_POST['date_of_birth']);
		$gender = $_POST['gender'];
		$address = trim($_POST['address']);
		$id_card = trim($_POST['id_card']);
		$class = trim($_POST['_class']);
		$phone_number = trim($_POST['phonenumber']);
		$department = trim($_POST['department_code']);
		$email = trim($_POST['email']);
		$gpa = trim($_POST['gpa']);

		$sql2 = "SELECT * FROM department WHERE code ='$department'";
		$query2 = mysqli_query($conn, $sql2);
		$data2 = mysqli_fetch_assoc($query2);
		$department_id = $data2['id'];

		$display_name = $first_name ." ". $last_name;
		echo $department_id;

		$sql = "INSERT INTO students(id,first_name,last_name, date_of_birth, gender, address, id_card, class, phone_number, department_id, display_name, email, gpa) VALUES ('$id','$first_name', '$last_name', '$date_of_birth', '$gender', '$address', '$id_card', '$class', '$phone_number', '$department_id', '$display_name', '$email', '$gpa')";
		$query = mysqli_query($conn, $sql);
		if($query){
			echo "New record created successfully";
			header('location: ../sinhvien.php');
		}
	}
?>