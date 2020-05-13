<?php

session_start();

include 'config.php';

if($_SESSION['auth']===3) {
	header('Location: ./index.php');

if($_SESSION['reg']===0||!isset($_SESSION['reg'])) {
	register1();
} else if($_SESSION['reg']===1) {
	register2();
} else if($_SESSION['reg']===2) {
	register3();
} else if($_SESSION['reg']===3) {
	registered();
} else {
	http_response_code(400);
}

function register() {
	header('Location: ./register.php');
}

function register2() {
	include 'register2.php';
}

function register3() {
	include 'register3.php';
}

function registered() {
	header('Location: ./index.php');
}

function register1{
	if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&($_POST['password']===$_POST['confirm_password'])) {
		$query = "insert into users(username, password) values('{$_POST['username']}', md5('{$_POST['password']}'))";
		$res = mysqli_query($conn, $query);
		if($res) {
			$_SESSION['reg'] = 1;
			$_SESSION['reg_username'] = $rows['username'];
			register();
		}
		else
		{
			die('Invalid Credentials');
		}
	}
}
