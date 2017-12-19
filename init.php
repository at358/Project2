<?php

session_start();

$_SESSION['user_id'] = 1;

$servername = "mysql1.njit.edu";
$username = "at358";
$password = "rhkGR7VNK";


$db = new PDO("mysql:host=$servername;dbname=at358", $username, $password);

if(!isset($_SESSION['user_id'])){
	die('You are not registered.');
}