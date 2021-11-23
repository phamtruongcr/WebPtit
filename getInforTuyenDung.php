<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
<style>

</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','ptit');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM company WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$soLuong = $row['quantity'];
$gpa = $row['gpa'];
$department_id = $row['department_id'];

$sql2 = "SELECT * FROM department WHERE id ='$department_id'";
$query2 = mysqli_query($con, $sql2);
$data = mysqli_fetch_assoc($query2);

echo "<p class='form-control-static' style='font-size: 20px;'><strong>Công ty: </strong>".$row['name']."</p>";
echo "<p class='form-control-static text-center' style='font-size: 20px;'>".$data['display_name']."</p>";
echo "<div class='row'>
        <div class='col-sm-1' > 
        </div>
        <div class='col-sm-2' >
          <p class='form-control-static'><strong>Số lượng cần:</strong></p>
        </div>
        <div class='col-sm-2' >
          <p class='form-control-static'>".$soLuong."</p>
        </div>
        <div class='col-sm-2' > 
        </div>
        <div class='col-sm-2' >
          <p class='form-control-static'><strong>GPA yêu cầu:</strong></p>
        </div>
        <div class='col-sm-2' >
          <p class='form-control-static'>".$gpa."</p>
        </div>
    </div>";
    echo "<table class='table table-striped table-bordered' cellspacing='0' width='100%'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Số điện thoại</th>
<th>GPA</th>
</tr>";
$sql = "SELECT * FROM recruitment WHERE company_id ='".$q."'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0) {
  
  while($row1 = mysqli_fetch_array($result)){
    $student_id = $row1['student_id'];
    $sql1 = "SELECT * FROM students WHERE id ='$student_id' AND gpa >= '$gpa' AND department_id = '$department_id'";
    $result1 = mysqli_query($con,$sql1);
    if($num_row = mysqli_num_rows($result1) > 0){
      while($row = mysqli_fetch_array($result1)) {
        if($soLuong > 0){
          echo "<tr>";
          echo "<td>" . $row['display_name'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['phone_number'] . "</td>";
          echo "<td>" . $row['gpa'] . "</td>";
          $soLuong--;
          
        }
      }
    }
  }

echo "</table>";
}
mysqli_close($con);
?>
</body>
</html>