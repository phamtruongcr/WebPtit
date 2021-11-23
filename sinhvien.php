<?php 
  require 'admin/connect.php';
  session_start();

  $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>


<!DOCTYPE html>
<html lang="vn">
<head>
  <title>Sinh viên</title>
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
</head>

<body id="myPage">

 <?php require 'nav.php' ?>

	<div class="container" style="margin-top: 45px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">						
				</div>
				<div class="col-md-8">
				<div class="page-header clearfix">
				  <h2 class="pull-left">Sinh viên</h2>
				  <br>
					<?php if($user['role']=='admin') {?>
					  <a href="create.php" type="button" class="btn btn-success pull-right">Thêm sinh viên</a>
					<?php }else{ ?>
					<?php } ?>
				  
				</div>

				<table id="data_students" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
						<th>Mã sinh viên</th>
						<th>Họ tên</th>
						<th>Lớp</th>
						<th>Ngành học</th>
						<th>GPA</th>
						<?php if($user['role']=='admin') {?>
								<?php echo"<th>Action</th>"; ?>
						<?php }else{ ?>
						<?php } ?>
						</tr>
					</thead>
				</table>

			</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
  $(document).ready(function() {
    $('#data_students').dataTable({
    	"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
			"scrollX": true,
			"pagingType": "numbers",
		  "processing": true,
		  "serverSide": true,
		  "ajax": "server.php",
		  "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json"
        }
    } );
	});
  </script>

	<div class="container text-center" style="margin-bottom: 35px;">
		<div class="container-fluid">
			<h2 style="color: #db0707;">Top 3 sinh viên</h2>
			<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarouse3" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarouse3" data-slide-to="1"></li>
			    <li data-target="#myCarouse3" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<?php
			  		$sql2 = "SELECT * FROM students ORDER BY gpa DESC LIMIT 3";
			  		if($query2 = mysqli_query($conn, $sql2)){
			  			$row2 = mysqli_fetch_array($query2);
			  			echo "<div class='item active'><h4 style='font-size: 18px; font-family: Tahoma; font-style: italic; margin: 70px 0;'>".$row2['display_name']." - ".$row2['id_card']."<br><br><span style='font-style:normal;'>GPA: ".$row2['gpa']."</span></h4> </div>";
			  			while($row2 = mysqli_fetch_array($query2)){
					        echo "<div class='item'><h4 style='font-size: 18px; font-family: Tahoma; font-style: italic; margin: 70px 0;'>".$row2['display_name']." - ".$row2['id_card']."<br><br><span style='font-style:normal;'>GPA: ".$row2['gpa']."</span></h4> </div>";
					    }
			  		}
			  		mysqli_close($conn);
			  	?>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>

	 <?php require 'footer.php' ?>

</body>
</html>