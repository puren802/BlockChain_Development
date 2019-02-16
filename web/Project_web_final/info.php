<!DOCTYPE html>

<?php
session_start();
$userID=$_SESSION['userID'];
$_SESSION['ndate']='';
$con = mysqli_connect('localhost', "root", "qwerqwer","test");	
?>
<html lang="en">
<head>
  <title>Bit Company Page</title>
</head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
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
	  margin-bottom: 0px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
	     margin-left: 200px;
    padding-left: 20px;
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
      width: 100%;
      height: 100%;
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
      background-color: #f4511e !important;
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
.dropbtn {
    background-color: #f4511e;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 145px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #ffffff;
	color: orange;
} 
div.container2 {
    width: 100%;
	height: 900px;
    border: 2px solid gray;
}

section {
    float: left;
    max-width: 400px;
}


article {
    margin-left: 600px;
	margin-top: 200px;
}
.grid-container {
  display: grid;
  align:center;
  grid-template-columns: 400px 400px 400px 400px;
  grid-gap: 10px;
  background-color: #f1f1f1;
  padding-left: 130px;
  padding-bottom: 50px;
  max-width: auto;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px;
  font-size: 20px;
}
dt{
	text-align:left;
}
dd{
	text-align:left;
}
ul.menu {
    list-style-type: none;
    margin-left: 15%;;
    padding: 0;
    width: 10%;
    background-color: #ffffff;
    position: absolute;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
	margin-top:10px;
	margin-bottom:-30px;
    padding:8px 16px; 
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #f4511e;
    color: white;
    text-decoration: none;
}
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="members.php">Drop the Bit</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	
		<ul class="nav navbar-nav navbar-right">
		<div class="dropdown">
			<button class="dropbtn"><?=$userID?>님 환영합니다.</button>
			<div class="dropdown-content">
				<a href="info.php">Info</a>
				<a href="logout.php">Logout</a>
				</div>
		</div>
		</ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
  <h1>Drop the Bit</h1> 
  <p>Little hope is gathered and becomes big love.</p> 
</div>

<ul class="menu">
  <li style="background-color: #f4511e; padding-top:15px"><a style="color: white;">나의 후원 내역</a></li>
  <hr style="border:1px solid red; width=90%"> 
  <li><a href="account.php">계좌 정보</a></li>
  <hr style="border:1px solid red; width=90%"> 
</ul>

<div style="margin-left:30%;padding:1px 16px;">

<br>
  <h2 style="color:#f4511e">Drop the bit</h2>
  <p style="font-size:20px;"><strong>사랑</strong>으로 자라는 아이들.</p>
  <p style="font-size:20px;">여러분의 <strong>나눔</strong>으로 <strong>희망</strong>을 꿈꿉니다.</p>

  <div style=" background-color:#f5f5f5; border: 3px solid #f1f1f1; width: 50%;">
  <table style="width:100%">
  <tr><td>
  <p><?=$userID?> 후원자님, 환영합니다!</p></td><td align="right"><p> uid번호:
  <?php
  $query1 = "SELECT * FROM test_join where userID like '$userID';";
	$result1 = mysqli_query($con, $query1);
	$row1 = mysqli_fetch_array($result1);
	$uid = $row1['uid'];
	echo $row1['uid'];
  ?>
  </p></td></tr>
  </table>
  </div>
  <?php
		$query2 = "SELECT * FROM test_trade where uid like '$uid';";
		$result2 = mysqli_query($con,$query2);
		$n=1;
		$ndate='최근 날짜 데이터가 없습니다.';
		$nout='최근 후원 금액이 없습니다.';
		$total_rows=mysqli_num_rows($result2)-1;
		if($total_rows>=0){
		mysqli_data_seek($result2,$total_rows);
		$row2 =mysqli_fetch_array($result2);
		do{
			$nout=$row2['out'];
			mysqli_data_seek($result2,$total_rows);
			$row2 =mysqli_fetch_array($result2);
			$ndate = $row2['date'];
			$nout=$row2['out'];
			$total_rows=$total_rows-1;
		}
		while($row2['out']==0);
		}
		else{
			
		}
	?>
  
  
  <br>
  <table>
  <tr><td  style="border-bottom: 2px dotted red;"><h3 style="color:#f4511e">후원금 내역 </h3></td>
  <tr>
    <td style="padding-left:10px; width: 50%; border-bottom:2px solid lightgray; padding-bottom:10px; padding-right:12px; padding-top:12px; text-align:justify">
	<p style="margin-bottom:-10px;">최근 후원일 : <?=$ndate?></p>
	</td>
	<tr>
	<td style="padding-left:10px; padding-top:12px; padding-bottom:10px; border-bottom:2px solid lightgray; text-align:justify"> <p style="margin-bottom:-10px;">최근 후원 금액 : <?=$nout?></p>
	</td></tr>
	<tr>
	<td style="padding-left:10px; padding-top:12px; padding-bottom:10px; border-bottom:2px solid lightgray; text-align:justify"> <p style="margin-bottom:-10px;">총 후원 금액 : 
	<?php
	$query3="SELECT * FROM test_trade where uid='$uid'";
	$result3 = mysqli_query($con,$query3);
	$total=0;
	while($row3=mysqli_fetch_array($result3)){
		if($row3['out']!=0){
		$total = $total + $row3['out'];
		}
	}
	echo $total;
?>
	</td></p></tr>
  </tr></tr>
  </ul>
</table>
  <br>
  <div style="border: 1px solid #f4511e; width: 50%;">
  <p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
  <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
  <p>Some text..</p>
  <p>Some text..</p>
  <p>Some text..</p>
  <p>Some text..</p>
  <p>Some text..</p>
  <p>Some text..</p>
  <p>Some text..</p>
</div>
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

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>

</body>
</html>