<?php
//Database parameters
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "churchapp";
// $databaseName = "citadel";

//Create connection
$dbConn = new mysqli($serverName,$userName,$password,$databaseName);

//Check connection_aborted
if($dbConn -> connect_error)
{
    die("Connection failed: " . $dbConn -> connect_error);
}

//echo "Connection successful";
//$dbConn -> close();

?>