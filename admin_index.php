<html>

<head>

<link rel="stylesheet" href="mystyle.css">

</head>

<?php

session_start();


if($_SESSION["admin"]!=1)
	
	{
	
		header("Location: index.php");	

		
	}	
		


?>

<body>

<div class="topnav">
  <a href="display_basic_info.php">Display Basic Info</a>
  <a href="display_timings.php">Display Timings Info</a>
  <a href="display_headers.php">Display Headers Info</a>
  <a href="admin_logout.php">Logout </a>
</div>

</body>


</html>