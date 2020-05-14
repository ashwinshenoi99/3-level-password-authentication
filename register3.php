<?php

session_start();

include 'config.php';

if(isset($_POST['username'])&&isset($_POST['colors'])) {
	$query = "update users set color_hash=sha2('{$_POST['colors']}',512) where username='{$_SESSION['reg_username']}'";
	$res = mysqli_query($conn, $query);
	if($res) {
		$_SESSION['reg'] = 3;
		session_destroy();
		registered();
	}
	else
	{
		die(mysqli_error($conn));
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
</head>
<script>
function color(inp) {
	var element = document.getElementById('colors');
	var prev = element.getAttribute("value") || "";
	if(prev.length>=30) {
		return;
	}
	if(inp == 'red') {
		element.setAttribute("value", prev+"ff0000");
	} else if(inp == 'green') {
		element.setAttribute("value", prev+"00ff00");
	} else if(inp == 'blue') {
		element.setAttribute("value", prev+"0000ff");
	}
}
</script>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">
			<form action="./register.php" method="post" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Register
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
				<input class="input100" type="text" readonly name="username" value="<?=$_SESSION['reg_username']?>">
					<span class="focus-input100"></span>
				</div>
				
				<div>
					<div onclick="color('red')" style="text-align:center;float:left;width:85px;height:85px;border:solid;border-color:red;background-color:red;">
						<br><br><br><br>Red
					</div>

					<div onclick="color('green')" style="text-align:center;float:left;margin-left:10px;width:85px;height:85px;border:solid;border-color:green;background-color:green;">
						<br><br><br><br>Green
					</div>

					<div onclick="color('blue')" style="text-align:center;float:left;margin-left:10px;width:85px;height:85px;border:solid;border-color:blue;background-color:blue;">
						<br><br><br><br>Blue
					</div>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Click color patterns" style="margin-top:160px;">
				<input readonly id="colors" class="input100" type="text" name="colors">
					<span class="focus-input100"></span>
				</div>

				<div onclick="document.getElementById('colors').setAttribute('value','');" style="text-align:center;height:30px;width:50px;border:outset;">
					Clear
				</div>

				<div style="margin-top:10px;" class="container-login100-form-btn">
					<button class="login100-form-btn">
						Register
					</button>
				</div>

				<br>
				<div class="text-center">
					Already Registered?
					<a href="./login.php" class="txt2 hov1">
						Login Here
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
