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

function login1() {
	include 'login1.php';
}

function login2() {
	include 'login2.php';
}

function logic3() {
	include 'login3.php';
}

function loggedin() {
	header('Location: ../index.php');
}
