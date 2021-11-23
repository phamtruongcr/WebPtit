<?php  
$conn = mysqli_connect('localhost','root','','ptit');

mysqli_set_charset($conn, 'utf8');

if($conn == false){
	die("ERROR: Không thể kết nối. ".mysqli_connect_error());
}
?>