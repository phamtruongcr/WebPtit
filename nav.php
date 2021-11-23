<?php 
  include 'admin/connect.php';
  //session_start();
  $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>


<!DOCTYPE html>
<html lang="vn">
<head>
  <title>Nav</title>
</head>

<body id="nav">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">PTIT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="https://portal.ptit.edu.vn/gioi-thieu/">Giới thiệu</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="https://portal.ptit.edu.vn/giao-duc-va-dao-tao/">Giáo dục và đào tạo<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> <p style="font-size: 15px;">Đào tạo sau đại học </p> </a></li>
            <li><a href="#"> <p style="font-size: 15px;">Đào tạo đại học</p></a></li>
            <li><a href="#"> <p style="font-size: 15px;">Đào tạo quốc tế</p></a></li>
            <li><a href="#"> <p style="font-size: 15px;">Đào tạo ngắn hạn</p></a></li>
            <li><a href="#"> <p style="font-size: 15px;">Văn bằng</p></a></li>
            <li><a href="#"> <p style="font-size: 15px;">Văn bản quy định</p></a></li>
          </ul>
        </li>
        <?php if(isset($user['email'])) {?>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="sinhvien.php">Sinh viên<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sinhvien.php"> <p style="font-size: 15px;">Sinh viên </p> </a></li>
            <li><a href="tuyendung.php"> <p style="font-size: 15px;">Tuyển dụng</p></a></li>
          </ul>
        </li>
        <?php }else{ ?>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="">Sinh viên<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=""> <p style="font-size: 15px;">Sinh viên </p> </a></li>
            <li><a href="#"> <p style="font-size: 15px;">Tuyển dụng</p></a></li>
          </ul>
        </li>
        <?php } ?>
        <li><a href="https://tuyensinh.ptit.edu.vn/">Tuyển sinh</a></li>
        <li><a href="https://portal.ptit.edu.vn/covid19/">Covid19</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <?php if(isset($user['email'])) {?>
          <li><a href="#"> <?php echo $user['email'] ?> </a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
        <?php }else{ ?>
          <li><a href="dang-ky.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>  
        <?php } ?>
      </ul>

    </div>
  </div>
</nav>

</body>
</html>