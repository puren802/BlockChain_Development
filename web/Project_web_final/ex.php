<?php 
include('server.php')?>
<!DOCTYPE html>

<?
session_start();
$con = mysqli_connect('localhost', "root", "qwerqwer","test");	
?>
<html lang="en">
<head>
  <title>Bit Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #efefef;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 500px;
      height: 300px;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #ffffff !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}
  .modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}
  
  .modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}
  
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}
  
</style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Drop the Bit</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#support">SUPPORT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#donation">DONATION</a></li>
        <li><a href="#contact">CONTACT</a></li>
		<li><a href="#login" onclick="document.getElementById('modal-wrapper1').style.display='block'">LOGIN</a></li>
		<li><a href="#register" onclick="document.getElementById('modal-wrapper2').style.display='block'">REGISTER</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="modal-wrapper1" class="modal">

  <form class="modal-content animate" method="POST" action="login_check.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper1').style.display='none'" class="close" 
	  title="Close PopUp">&times;</span>
      <h1 style="text-align:center">Login</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter userID" name="userID">
      <input type="password" placeholder="Enter Password" name="password">
      <button type="submit" name="submit" style="width: 90px; height: 40px; color: white; background-color:#f4511e">Login</button>
	  <br>
     <!-- <a href="#" style="float:center; margin-left:30px;">Forgot Password ?</a> -->
    </div>
   
  </form>
  
</div>

<div id="modal-wrapper2" class="modal">

  <form class="modal-content animate" method="post">
        <?php include('errors.php'); ?>
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper2').style.display='none'" class="close" 
	  title="Close PopUp">&times;</span>
      <h1 style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register</h1>
	  
    </div>

    <div class="container">
	<br>
	 <td><sup style="color:red">*</sup>UID</td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="text" style="width:200px; border:1px solid;" placeholder="Enter name" name="uid"><br><br>
	  <td><sup style="color:red">*</sup>이 름</td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type="text" style="width:200px; border:1px solid;" placeholder="Enter name" name="name"><br><br>
		<td><sup style="color:red">*</sup>ID</td>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" style="width:300px; vertical-align: middle; border:1px solid;" placeholder="Enter userid" name="userID" value="<?php echo $userID; ?>"><br><br>
	  <td><sup style="color:red">*</sup>PASSWORD</td>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="password" style="width:400px; border:1px solid;" placeholder="Enter Password" name="password_1"><br><br>
	  <td><sup style="color:red">*</sup>Check PASSWORD</td>
      <input type="password" style="width:400px; border:1px solid;" placeholder="Check Password" name="password_2"><br><br>
	  <td><sup style="color:red">*</sup>E-MAIL</td>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;
	  <input type="email" style="width:400px; height:50px; border:1px solid;" 
	  placeholder="        Enter Email" name="email" value="<?php echo $email; ?>" > 
	  <br><br><td><p style="text-align:center"><sup style="color:red">*</sup> is required field.</p></td>
      <button type="submit" name="reg_user" style="margin: auto; display: block; width: 140px; height: 40px; color: white; background-color:#f4511e">Register</button>
	  <br>
    </div>
   
  </form>
  
</div>






<div class="jumbotron text-center">
  <h1>Drop the Bit</h1> 
  <p>Little hope is gathered and becomes big love.</p> 
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Drop the Bit</h2><br>
           <h2>거래하고 남은 거스름돈, 그 자그만 돈으로 </h2> <br> <h3>190개의 국가 및 영토에서 어린의 들의 생명을 구하고, 어린이의 삶을 개선할 수 있습니다.<br>
	  기부한 금액에 따라 포인트처럼 적립 또는 현금처럼 사용 할 수 있습니다.</h3><br>
      <p>기부금액의 0.1~10% 포인트 적립!제휴 브랜드에서 사용시, 결제 금액의 50%를 포인트 사용 가능!<br>
	  Drop the Bit 웹사이트와 어플리케이션에서 잔여 포인트를 확인하고 사용하실 수 있습니다.</p><br>
	  <input type="button" style="height:40px; width:150px" value="Get in Touch" onClick="document.getElementById('modal-wrapper1').style.display='block'">
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-piggy-bank logo slideanim"></span>
    </div>
  </div>
</div>


<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> 우리는 자그만 힘을 모아 세계에 어려운 이웃들에게 도와주려는 일을 하려합니다.</h4><br>
      <p><strong>VISION:</strong> 후원금에 투명성을 위해 Blockchain 기술을 도입한 거래형식을 보여주려 합니다.</p>
    </div>
  </div>
</div>


<!-- Container (support Section) -->
<div id="support" class="container-fluid text-center">
    <h2>support</h2><br>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="sup1.jpg">
        <p><strong>세계 어린이 후원</strong></p>
        <p>전 세계 도움이 필요한 어린이들이 건강하게 자라고 안전하게 살 수 있도록 지원합니다.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="sup2.jpg">
        <p><strong>난민 어린이 후원</strong></p>
        <p>자연재해, 전쟁으로 집을 잃고 생활하는 난민 어린이를 지원합니다.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="sup3.jpg">
        <p><strong>에이즈감염어린이 후원</strong></p>
        <p>에이즈로 부모를 잃은 어린이를 보호하고 모자감염 예방과 치료를 지원합니다.</p>
      </div>
    </div>
  </div><br>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center bg-grey">
<h2>SERVICES</h2>
  <!--<h4>What we offer</h4>-->
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-piggy-bank logo-small"></span>
      <h4>point</h4>
      <p>get some point with donation</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-usd logo-small"></span>
      <h4>donate</h4>
      <p>easy & happy donation</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo-small"></span>
      <h4>global</h4>
      <p>helping global poverty</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>they need our love</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>SNS</h4>
      <p>publishing to the whole world with SNS </p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">WORK</h4>
      <p>work hard for better life</p>
    </div>
  </div>
  <br><br><br>
  
   <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      <h3>"후원금은 투명하게 쓰여지나요?"</h3><h4>유니세프는 UN기구와 OECD가 가입한 IATI(국제원조투명성 이니셔티브)를 통해 투명하게 기금을 관리하고 있습니다.<br>또한, 유니세프한국위원회는 공인된 외부회계법인의 정기적인 회계감사를 받습니다. <br> 유니세프는 매년 기금모금 및 사용 내용을 홈페이지에 게시하여 투명하게 사용 내용을 공개하며 유니세프 소식지와 연차 보고를 통해 사업결과 및 지원현황을 알리고 있습니다.</h4>
      </div>
      <div class="item">
        <h3>"유니세프는 아프리카 어린이만 돕나요?"</h3><h4>전 세계 34개국에 국가위원회, 155개의 지역사무소가 있으며 190여 개 국가에서 아동들을 돕고 있습니다. <br> 국가위원회는 선진국에 설치된 모금조직으로 개발도상국에서 아동을 위한 사업을 펼칠 수 있도록 기금을 모아 본부에 전달합니다.<br>전 세계의 나라들을 포함하여 우리나라에 있는 불우이웃들에게도 도움이 될 수 있도록 최선을 다 하고 있습니다.</h4>
      </div>
      <div class="item">
        <h3>"유니세프를 통해 1:1 결연 후원이 가능한가요?"</h3><h4>유니세프는 가장 긴급하고 지금 당장 도움이 절실한 아동들에게 후원금이 먼저 사용될 수 있도록 노력하고 있습니다. <br> 1:1 지원이 아닌 유니세프의 사업별 지원 방식은 매년 새로운 자연재해, 전쟁 등으로 먼저 도움이 필요한 지역이<br> 달라지는 상황에서 제한된 후원금을 효율적으로 사용하여 더 많은 어린이에게 혜택을 줄 수 있습니다.</h4>
      </div>
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

<!-- Container (donation Section) -->
<div id="donation" class="container-fluid">
  <div class="text-center">
    <h2>Donation</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <img src="unicef.png">
        </div>
        <div class="panel-body">
          <p>어린이를 위한 유니세프 사업전략 <br>
         유니세프는 어린이가 살기 좋은 세상을 만들기 위해<br>
다음 7가지 사업분야에 중점을 두고 사업을 펼쳐 나갑니다.<br><br>
<strong><i class="fa fa-medkit"></i>&nbsp; 보건사업전개</strong><br>
<strong><span class="glyphicon glyphicon-leaf"></span>&nbsp; 에이즈 감염 감소</strong><br>
<strong><i class="fa fa-tint"></i>&nbsp; 식수와 위생 개선</strong><br>
<strong><span class="glyphicon glyphicon-cutlery"></span>&nbsp; 영양 실조율 감소</strong><br>
<strong><span class="glyphicon glyphicon-education"></span>&nbsp;교육 환경 개선</strong><br>
<strong><span class="glyphicon glyphicon-user"></span>어린이 보호</strong><br>
<strong><i class="fa fa-universal-access"></i>&nbsp; 사회통합</strong><br>      
         </p>
  <a href="http://www.unicef.or.kr/">http://www.unicef.or.kr/</a>

        </div>
        <div class="panel-footer">
          <h3>후원하기</h3>
          <button class="btn btn-lg" onclick="document.getElementById('modal-wrapper3').style.display='block'">Check</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <img src="world_vision.png">
        </div>
        <div class="panel-body">
        <p>월드비전은 전세계 가장 취약한 아동,가정,지역사회가<br>
		빈곤과 불평등에서 벗어나도록 하나님의 사랑을 실천하고 <br>
		모든 파트너와 함께 지속 가능한 변화를 만들어가는 글로벌 NGO입니다<br><br>

      3대 사업을 중심으로 일합니다.<br>
      <strong><span class="glyphicon glyphicon-wrench"></span>&nbsp;지역개발사업</strong> <br>
      <strong><i class="fa fa-medkit"></i>&nbsp;국제구호사업</strong>  <br>
      <strong><span class="glyphicon glyphicon-education"></span>&nbsp;옹호사업</strong>

      </p>
      <a href="http://www.worldvision.or.kr/index.asp">http://www.worldvision.or.kr/index.asp</a>

        </div>
        <div class="panel-footer">
          <h3>후원하기</h3>
          <button class="btn btn-lg" onclick="document.getElementById('modal-wrapper4').style.display='block'">Check</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <img src="goodneighbors.png"/>
        </div>
        <div class="panel-body">
          <p>굿네이버스는 총 35개국 191개 지역에서<br>
		  지역개발사업(CDP, Community Development Project)을 지원하고 있습니다.<br>
         굿네이버스는 1991년 한국에서 설립된 대한민국 토종 NGO입니다.<br>
         8명의 창립멤버와 128명의 정회원으로 시작해, 현재 국내 52개 지부, 
		 <br>해외 38개국에서 세상을 위한 좋은 변화를 만들어 나가고 있습니다.<br>
         <br>
         <strong><span class="glyphicon glyphicon-leaf"></span>&nbsp;국내복지사업</strong><br>
         <strong><i class="fa fa-medkit"></i>&nbsp;국제구호개발사업</strong><br>
         <strong><span class="glyphicon glyphicon-education"></span>&nbsp;사회개발교육사업</strong><br>   
		</p>
         <a href="http://www.goodneighbors.kr/">http://www.goodneighbors.kr/</a>

        </div>
        <div class="panel-footer">
          <h3>후원하기</h3>
          <button class="btn btn-lg" onclick="document.getElementById('modal-wrapper5').style.display='block'">Check</button>
        </div>
      </div>      
    </div>    
  </div>
</div>


<div id="modal-wrapper3" class="modal">

  <form class="modal-content animate" method="POST" action="login_check.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper3').style.display='none'" class="close" 
	  title="Close PopUp">&times;</span>
      <h1 style="text-align:center">Login</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter userID" name="userID">
      <input type="password" placeholder="Enter Password" name="password">
      <button type="submit" name="submit" style="width: 90px; height: 40px; color: white; background-color:#f4511e">Login</button>
	  <br>
    </div>
   
  </form>
  
</div>



<div id="modal-wrapper4" class="modal">

  <form class="modal-content animate" method="POST" action="login_check.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper4').style.display='none'" class="close" 
	  title="Close PopUp">&times;</span>
      <h1 style="text-align:center">Login</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter userID" name="userID">
      <input type="password" placeholder="Enter Password" name="password">
      <button type="submit" name="submit" style="width: 90px; height: 40px; color: white; background-color:#f4511e">Login</button>
	  <br>
    </div>
   
  </form>
  
</div>


<div id="modal-wrapper5" class="modal">

  <form class="modal-content animate" method="POST" action="login_check.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper5').style.display='none'" class="close" 
	  title="Close PopUp">&times;</span>
      <h1 style="text-align:center">Login</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter userID" name="userID">
      <input type="password" placeholder="Enter Password" name="password">
      <button type="submit" name="submit" style="width: 90px; height: 40px; color: white; background-color:#f4511e">Login</button>
	  <br>
    </div>
   
  </form>
  
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
<div id="contact" class="container-fluid bg-grey">
<form class="modal-content animate" method="POST" action="send.php">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Seong-buk, Seoul</p>
      <p><span class="glyphicon glyphicon-phone"></span> +82 10-1234-5678</p>
      <p><span class="glyphicon glyphicon-envelope"></span> dropthebit@hansung.ac.kr</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit" name="submit2">Send</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>




<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper1');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>