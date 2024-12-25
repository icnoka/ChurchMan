<?php
//Start session
session_start();

if(!isset($_SESSION["userName"]))
	header("Location: login.php");

$userName = $_SESSION["userName"];
?>