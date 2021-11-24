<?php 
  include 'admin/connect.php';
  session_start();

  $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

?>


<!DOCTYPE html>
<html lang="vn">
<head>
  <title>Học Viện Công Nghệ Bưu Chính Viễn Thông</title>
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

<div style="margin-top: 35px; ">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src=".\img\ptit5.jpg" alt="0" style="width:100%; height: 100%;">
      </div>

      <div class="item">
        <img src=".\img\ptit1.png" alt="1" style="width:100%;height: 100%;">
      </div>
    
      <div class="item">
        <img src=".\img\ptit2.jpg" alt="2" style="width:100%;height: 100%;">
      </div>
      <div class="item">
        <img src=".\img\ptit3.jpg" alt="3" style="width:100%;height: 100%;">
      </div>
      <div class="item">
        <img src=".\img\ptit4.jpg" alt="4" style="width:100%;height: 100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="jumbotron text-center">
  <h2>VÌ SAO 25.000+ SINH VIÊN CHỌN PTIT?</h2>
  <div class="row">
    <div class="col-sm-3" > 
      <h1>
        5
        <span class="glyphicon glyphicon glyphicon-star logo"></span> 
    </h1>
      <h4  style="color: black;">CHẤT LƯỢNG</h4>
      <h4  style="color: black;">ĐÀO TẠO</h4> 
    </div>
    <div class="col-sm-3" >
      <h1>
        <sup style="font-size: 24px;">TOP </sup>5
    </h1>
      <h4  style="color: black;">CÔNG NGHỆ THÔNG TIN</h4>
      <h4  style="color: black;">TỐT NHẤT VIỆT NAM</h4> 
    </div>
    <div class="col-sm-3" > 
      <h1>97%</h1>
      <h4  style="color: black;">SINH VIÊN CÓ</h4>
      <h4  style="color: black;">VIỆC LÀM NGAY</h4> 
    </div>
    <div class="col-sm-3" >
      <h1>
      8<sup style="font-size: 16px;"> TRIỆU ĐỒNG/THÁNG</sup>
      </h1> 
      <h4  style="color: black;">LƯƠNG</h4>
      <h4  style="color: black;">KHỞI ĐIỂM</h4>
    </div>
  </div> 
</div>

<div class="container">
  <h3>Ngành đào tạo</h3>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar progress-bar-danger" style="width:7%"></div>
  </div>
  <div class="row text-center">
    <div class="col-sm-1">
      
    </div>
    <div class="col-sm-2" > 
      <i class="fas fa-laptop-code logoNdt"></i>
      <br>
     <a href= "#" target="_blank" >Công nghệ thông tin</a>
    </div>
    <div class="col-sm-2" >
      <i class="fas fa-network-wired logoNdt"></i>
      <br>
      <a href= "#" target="_blank" >Điện tử viễn thông</a> 
    </div>
    <div class="col-sm-2" >
      <i class="fas fa-cash-register logoNdt"></i>
      <br>
      <a href= "#" target="_blank" >Thương mại điện tử</a> 
    </div>
    <div class="col-sm-2" >
      <i class="fas fa-photo-video logoNdt"></i>
      <br>
      <a href= "#" target="_blank" >Đa phương tiện</a> 
    </div>
    <div class="col-sm-2" >
      <i class="fas fa-ad logoNdt"></i>
      <br>
      <a href= "#" target="_blank" >Marketing</a> 
    </div>
    <div class="col-sm-1" >
    </div>
  </div> 
</div>

<div class="container">
  <h3>Giảng viên</h3>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar progress-bar-danger" style="width:7%"></div>
  </div>
  <div class="row text-center">
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src=".\img\sonnm.jpg" alt="sonmn">
        <br>
        <p><strong>Nguyễn Mạnh Sơn</strong></p>
        <p style="font-size: 16px;">Giảng viên Khoa công nghệ thông tin</p>
      </div>
    </div>
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src=".\img\quynh.jpg" alt="quynh">
        <br>
        <p><strong>Hoàng Thúy Quỳnh</strong></p>
        <p style="font-size: 16px;">Giảng viên Khoa công nghệ thông tin</p>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="thumbnail">
        <img src=".\img\phong.jpg" alt="phong">
        <br>
        <p><strong>GS.TS. NGƯT Bùi Xuân Phong</strong></p>
        <p style="font-size: 16px;">Giảng viên Khoa Tài chính Kế toán</p>
      </div>
    </div>
</div>
</div>

<div class="container ">
  <h3>Tin tức</h3>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar progress-bar-danger" style="width:7%"></div>
  </div>
  <div class="row text-justify">
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "https://portal.ptit.edu.vn/viettel-va-ptit-ky-bien-ban-ghi-nho-ve-khoa-hoc-cong-nghe-va-chuyen-doi-so/">
        <img src=".\img\tt0.jpg" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tt0">
        <p>Viettel và PTIT ký biên bản ghi nhớ về khoa học công nghệ và chuyển đổi số</p><br><br>
        </a>
      </div>
    </div>
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "https://portal.ptit.edu.vn/hoi-thao-truc-tuyen-cach-thuc-khao-sat-tinh-trang-viec-lam-cua-sinh-vien-tot-nghiep-tai-cac-co-so-dai-hoc-trong-boi-canh-dai-dich-covid-19/">
          <img src=".\img\tt1.jpg" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tt1">
          <p>Hội thảo trực tuyến “Cách thức khảo sát tình trạng việc làm của sinh viên tốt nghiệp tại các cơ sở đại học trong bối cảnh Đại dịch Covid-19”</p>
        </a>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "https://portal.ptit.edu.vn/tiep-can-cong-nghe-ai-va-co-hoi-viec-lam-qua-ai-now-academic-career/">
          <img src=".\img\tt2.jpg" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tt2">
          <p>Tiếp cận công nghệ AI và cơ hội việc làm qua “AI Now: Academic & Career”</p><br><br>
        </a>
      </div>
    </div>
    <div class="text-right" style="padding: 0px 15px;">
      <a href="https://portal.ptit.edu.vn/category/tin-tuc/" class="btn btn-danger" role="button">Xem thêm</a>  
    </div>
</div>
</div>

<div class="container ">
  <h3>Thông báo</h3>
  <div class="progress" style="height: 3px;">
    <div class="progress-bar progress-bar-danger" style="width:7%"></div>
  </div>
  <div class="row text-justify">
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "#"> 
        <img src=".\img\tb.png" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tb0">
        <p>Thông báo về việc điều chỉnh chỉ tiêu trong thông báo tuyển sinh đại học hình thức VLVH năm 2021</p>
        </a>
      </div>
    </div>
    
    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "#">
          <img src=".\img\tb.png" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tb1">
          <p>Thông báo hướng dẫn sơ kết học kỳ 2 năm học 2020-2021</p><br>
        </a>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="thumbnail">
        <a href= "#">
          <img src=".\img\tb.png" style="border-radius: 0%; width: 90%; height: 165px; margin-bottom: 10px;" alt="tb2">
          <p>Thông báo tổ chức lớp đầu khóa học đối với các Tân sinh viên khóa 2021</p><br>
        </a>
      </div>
    </div>
    <div class="text-right" style="padding: 0px 15px;">
      <a href="https://portal.ptit.edu.vn/category/thong-bao/" class="btn btn-danger" role="button" >Xem thêm</a> 
    </div>
</div>
</div>

<div class="container">
 
  <div class="row">
    <div class="col-sm-6" > 
       <h3>Video</h3>
        <div class="progress" style="height: 3px;">
          <div class="progress-bar progress-bar-danger" style="width:7%"></div>
        </div>
        <iframe width="100%" height="345px" src="https://www.youtube.com/embed/2TAib6Q5oiQ"></iframe>
    </div> 
    <div class="col-sm-6" > 
       <h3>Đối tác</h3>
        <div class="progress" style="height: 3px;">
          <div class="progress-bar progress-bar-danger" style="width:7%"></div>
        </div>
        <div class="center-block">
        <div id="myCarouse2" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
            <li data-target="#myCarouse2" data-slide-to="1"></li>
            <li data-target="#myCarouse2" data-slide-to="2"></li>
            <li data-target="#myCarouse2" data-slide-to="3"></li>
            <li data-target="#myCarouse2" data-slide-to="4"></li>
            <li data-target="#myCarouse2" data-slide-to="5"></li>
            <li data-target="#myCarouse2" data-slide-to="6"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src=".\img\dt1.png" alt="0" style="width:100%; height: 345px;">
            </div>

            <div class="item">
              <img src=".\img\dt2.png" alt="1" style="width:100%;height: 345px;">
            </div>
          
            <div class="item">
              <img src=".\img\dt3.png" alt="2" style="width:100%; height: 345px;">
            </div>
            <div class="item">
              <img src=".\img\dt4.png" alt="3" style="width:100%; height: 345px;">
            </div>
            <div class="item">
              <img src=".\img\dt5.png" alt="4" style="width:100%; height: 245px;">
            </div>
            <div class="item">
              <img src=".\img\dt6.png" alt="4" style="width:100%; height: 245px;">
            </div>
            <div class="item">
              <img src=".\img\dt7.png" alt="4" style="width:100%; height: 245px;">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarouse2" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarouse2" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div> 
  </div>
  </div>

<?php require 'footer.php' ?>

</body>
</html>
