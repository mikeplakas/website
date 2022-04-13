<?php

include 'db_con.php';

session_start();

$username = $_POST["username"];

$password = $_POST["password"];

$sql = "SELECT username FROM user WHERE username = '$username' AND password='$password'";

$result = $con->query($sql);

if ($result->num_rows > 0) {

$_SESSION["user"]=1;

$_SESSION["username"] =$username;

header('Location: user_index.php');
	
}

else

{
 header('Location: index.php');

}	



?>