<?php

session_start();

if($_SESSION['auth']!=3) {
	header('Location: ./login.php');
	exit();
}

echo "HELLO: " . $_SESSION['username'];

?>
