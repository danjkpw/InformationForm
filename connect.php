<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($servername, $username, $password, $dbname);

        $conn->query("SET character_set_results = utf8") or die('Error query: ' . mysqli_error());
        $conn->query("SET character_set_client = utf8") or die('Error query: ' . mysqli_error());
        $conn->query("SET character_set_connection = utf8") or die('Error query: ' . mysqli_error());
        $conn->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci';") or die('Error query: ' . mysqli_error());
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
