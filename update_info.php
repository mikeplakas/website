<html>

<head>


</head>

<?php
session_start();

include 'db_con.php';


$username = $_POST["username"];

$password = $_POST["password"];


if ($username != "" && $password != ""){

  
       
	   $past_username = $_SESSION["username"];
	   
	   $sql = "UPDATE user SET username='$username',password='$password' WHERE username='$past_username'";
	   
	   $con->query($sql);
	   	   
	   include 'user_logout.php';
    }


?>

</html>