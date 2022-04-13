<html>

<head>
<link rel="stylesheet" href="mystyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$( document ).ready(function() {
    
	$.ajax({
                url:'basics.php',

                type:'post',
                
                success:function(response){
                   

                    $("#div1").html(response);
				   

                }
            });
	
	
	
});	



</script>

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

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div id="div1"align="center">   </div>
<br>
<br>


</body>

</html>

