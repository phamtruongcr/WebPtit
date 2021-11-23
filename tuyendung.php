<?php 
  require 'admin/connect.php';
  session_start();

  $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>


<!DOCTYPE html>
<html lang="vn">
<head>
  <title>Tuyển dụng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">
  	$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();
  	)};	

  </style>

  <script>
		function showUser(str) {
		  if (str == "") {
		    document.getElementById("txtHint").innerHTML = "";
		    return;
		  } else {
		    var xmlhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		        document.getElementById("txtHint").innerHTML = this.responseText;
		      }
		    };
		    xmlhttp.open("GET","getInforTuyenDung.php?q="+str,true);
		    xmlhttp.send();
		  }
		}
	</script>
</head>

<body id="myPage">

 <?php require 'nav.php' ?>

	<div class="container" style="margin-top: 45px; margin-bottom: 25px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">						
				</div>
				<div class="col-md-8">
					<div class="page-header clearfix">
					  <h2 class="pull-left">Tuyển dụng</h2>
					  <br>
					  <form class="pull-right">
			  		<select class="form-control" name="tuyendung" onchange="showUser(this.value)">
				      <option value="">Chọn công ty</option>
				      <?php 
				      require 'admin/connect.php';
				      $sql1 = "SELECT * FROM company";
				      $query1 = mysqli_query($conn, $sql1);
				      if (mysqli_num_rows($query1) > 0) {
				        while($row1 = mysqli_fetch_assoc($query1)){
				        	$department_id = $row1['department_id'];
				        	$sql2 = "SELECT * FROM department WHERE id ='$department_id'";
									$query2 = mysqli_query($conn, $sql2);
									$data = mysqli_fetch_assoc($query2);
				          echo "<option value=".$row1['id'].">".$row1['name']." - ". $data['display_name']."</option>";
				        }
				      }
				      ?>
  					</select>
					</form> 
					</div>
					<div id="txtHint"><b>Thông tin học sinh trúng tuyển sẽ hiện ra</b></div>
					
			</div>
			</div>
		</div>
	</div>

	 <?php require 'footer.php' ?>

</body>
</html>