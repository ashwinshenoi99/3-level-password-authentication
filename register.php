<?php

session_start();

include 'config.php';

if($_SESSION['auth']===3) {
	header('Location: ./index.php');
}

if(!isset($_SESSION['reg'])) {
	register1();
} else if($_SESSION['reg']===0) {
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

function register1() {
	include 'register1.php';
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

?>
