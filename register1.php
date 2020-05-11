<?php

session_start();

include 'config.php';

if($_SESSION['auth']===0||!isset($_SESSION['auth'])) {
	login1();
} else if($_SESSION['auth']===1) {
	login2();
} else if($_SESSION['auth']===2) {
	login3();
} else if($_SESSION['auth']===3) {
	loggedin();
} else {
	http_response_code(400);
}

function login2() {
	header('Location: login2.php');
}

function logic3() {
	header('Location: login3.php');
}

function loggedin() {
	header('Location: index.php');
}

function login1() {
	if(isset($_POST['username'])&&isset($_POST['password'])) {
		$query = "select * from users where username='{$_POST['username']}' and password=md5('{$_POST['password']}')";
		$res = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)>0) {
			$rows = mysqli_fetch_assoc($result);
			$_SESSION['auth'] = 1;
			$_SESSION['username'] = $rows['username'];
			login2();
	}
}
