<?php

$server = "localhost";
$dbname = "50notout";
$username = "root";
$password = "111";

/*
$server = "localhost";
$dbname = "website1_test";
$username = "root";
$password = "111";
	*/
$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>