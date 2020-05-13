<?php

session_start();

include 'config.php';

if(isset($_POST['username'])&&isset($_POST['images'])) {
	$query = "select * from users where image_hash=sha2('{$_POST['images']}', 512) and username='{$_POST['username']}'";
	$res = mysqli_query($conn, $query);
	if($res) {
		$_SESSION['auth'] = 2;
		login();
	}
	else
	{
		die('Invalid Credentials');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.grid3x3{
 width:280px;
 height:280px;
 clear:both;
 border: solid;
}
.grid3x3>div{
 width:90px;
 height:90px;
 float:left;
 line-height:100px;
 text-align:center;
}
.grid3x3>div>img{
 display:inline-block;
 vertical-align:middle;
 max-width:80%;
 max-height:80%;
}
img{
  border: double;
}
</style>
</head>
<script>
var selected = new Array();

function select(input) {
	index = selected.indexOf(input);
	if(index==-1) {
		selected.push(input);
		document.getElementById(input).setAttribute("style","opacity:0.3;border:solid;")
	}
	else {
		selected.splice(index,1);
		document.getElementById(input).setAttribute("style","opacity: 1;")
	}
	document.getElementById("images").setAttribute("value", selected.toString());
}
</script>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">
			<form action="./login.php" method="post" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Login
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
				<input class="input100" type="text" readonly name="username" value="<?=$_SESSION['auth_username']?>">
					<span class="focus-input100"></span>
				</div>

				<input type="hidden" name="images" id="images"/>

				<div class="grid3x3">
				 <div><img onclick="select('batman.jpg');" id='batman.jpg' src="./images/img/batman.jpg"></div>
				 <div><img onclick="select('captainamerica.jpg');" id='captainamerica.jpg' src="./images/img/captainamerica.jpg"></div>
				 <div><img onclick="select('deadpool.jpg');" id='deadpool.jpg' src="./images/img/deadpool.jpg"></div>
				 <div><img onclick="select('greenlantern.jpg');" id='greenlantern.jpg' src="./images/img/greenlantern.jpg"></div>
				 <div><img onclick="select('ironman.jpg');" id='ironman.jpg' src="./images/img/ironman.jpg"></div>
				 <div><img onclick="select('shield.jpg');" id='shield.jpg' src="./images/img/shield.jpg"></div>
				 <div><img onclick="select('spiderman.jpg');" id='spiderman.jpg' src="./images/img/spiderman.jpg"></div>
				 <div><img onclick="select('thor.jpg');" id='thor.jpg' src="./images/img/thor.jpg"></div>
				 <div><img onclick="select('wolverine.jpg');" id='wolverine.jpg' src="./images/img/wolverine.jpg"></div>
				</div>

				<br>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<br>
				<div class="text-center">
					New Here?
					<a href="./register.php" class="txt2 hov1">
						Register Now
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
