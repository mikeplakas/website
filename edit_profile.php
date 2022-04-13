<?php

session_start();

$username = $_SESSION["username"];

?>

<html>

<head>
<link rel="stylesheet" href="mystyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	var username = "<?php echo($username); ?>";
		
	$.ajax({
                url:'get_user_info.php',
				
				data: {username:username},

                type:'post',
                
                success:function(response){
                   

                    $("#user_info").html(response);
				   

                }
            });		
	
	
});
</script>


</head>






<?php


if($_SESSION["user"]!=1)
	
	{
			header("Location: index.php");		
	}


?>

<body>

<div class="topnav">
  <a href="filter.php">Upload Har File</a>
  <a href="view_map.php">View Map</a>
  <a href="edit_profile.php">Edit Profile</a>
  <a href="user_logout.php">Logout </a>
</div>

<br> 

<br>



<div id="user_info"> </div>


<form action="update_info.php" method = "post">

Username:
<input type = "text" name="username">

<br>
<br>
Password:

<input type ="password" name="password">

<br>
<br>
<input type ="submit" value="Change">


</form>

</body>

</html>