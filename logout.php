<?php
//Start session
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 

//if(isset($_SESSION))
//print_r($_SESSION); 
//return;

// redirect to login page
header("Location: login.php");

?>