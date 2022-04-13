<?php

include 'db_con.php';

session_start();

$username = $_POST["username"];

$password = $_POST["password"];

$sql = "SELECT username FROM admin WHERE username = '$username' AND password='$password'";

$result = $con->query($sql);

if ($result->num_rows > 0) {

$_SESSION["admin"]=1;

header('Location: admin_index.php');
	
}

else

{
 header('Location: index.php');

}	



?>