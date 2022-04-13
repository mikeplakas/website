<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="mystyle.css">

</head>

<?php

session_start();

if($_SESSION["user"]!=1)
	
	{
			header("Location:index.php");		
	}


?>

<body>

<div class="topnav">
  <a href="filter.php">Upload Har File</a>
  <a href="view_map.php">View Map</a>
  <a href="edit_profile.php">Edit Profile</a>
  <a href="user_logout.php">Logout </a>
</div>

</body>



</html>