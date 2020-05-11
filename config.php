<?php

/*
 * MySQL Config file
 */

$hostname = 'localhost';
$username = 'root';
$password = 'toor';
$db = 'se';

/*
 * MySQL+PHP Connection Establishment
 */

$conn = mysqli_connect($hostname, $username, $password, $db);

?>

