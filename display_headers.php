<html>

<?php

session_start();


if($_SESSION["admin"]!=1)
	
	{
	
		header("Location: index.php");	

		
	}	
		


?>
<head>
<link rel="stylesheet" href="mystyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$( document ).ready(function() {
	
	
	$.ajax({
                url:'get_header_info.php',

                type:'post',
                
                success:function(response){
                   
                    $("#result").html(response);
				   

                }
            });
			
	
	$.ajax({
                url:'stale_fresh.php',

                type:'post',
                
                success:function(response){
                   
                    $("#stale_fresh").html(response);
				   

                }
            });		
			
	$.ajax({
                url:'cacheability.php',

                type:'post',
                
                success:function(response){
                   
                    $("#cacheability").html(response);
				   

                }
            });				
		
});	



</script>

</head>

<div class="topnav">
  <a href="display_basic_info.php">Display Basic Info</a>
  <a href="display_timings.php">Display Timings Info</a>
  <a href="display_headers.php">Display Headers Info</a>
  <a href="admin_logout.php">Logout </a>
</div>

<br>
<br>
<br>

<div id="result" align="center"</div>


</body>


</html>