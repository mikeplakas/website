<html>

<head>

<link rel="stylesheet" href="mystyle.css">


</head>

<?php

session_start();

include 'db_con.php';

$new_username = $_POST["username"];

$new_password = $_POST["password"];

$new_email = $_POST["email"];


 $sql = "INSERT INTO user (username, password, email) VALUES ('$new_username', '$new_password', '$new_email')";

		if ($con->query($sql) === TRUE) {
			
			echo "<br>";
			
			echo "<br>";

			echo "<br>";

			
			echo "<h4 align ='center'>You registered in our System</h4>";
			
			echo "<br>";
			
			echo "<br>";

			echo "<h4 align='center'><a href='index.php' >Return to Login </a></h4>";
			} 







?>











</html>