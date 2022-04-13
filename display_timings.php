<html>

<head>
<link rel="stylesheet" href="mystyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script>

<script>

$( document ).ready(function() {
	
	avg_response_time = new Array();
		
	$.ajax({
                url:'average_response_time.php',

                type:'post',
                
                success:function(response){
                   		
					avg_response_time = JSON.parse(response);
					
					const mygraph = document.getElementById('histogram').getContext('2d');

const chart = new Chart(mygraph, {
  type: 'bar',
  data: {
    labels: [1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,0],
    datasets: [{
      label: 'Avg Response Time',
      data: avg_response_time,
      backgroundColor: 'blue',
    }]
  },
  options: {
    scales: {
      xAxes: [{
        display: false,
        barPercentage: 1,
        ticks: {
          max: 24,
        }
      }, {
        display: true,
        ticks: {
          autoSkip: false,
          max: 24,
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
					
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

<div class="topnav">
  <a href="display_basic_info.php">Display Basic Info</a>
  <a href="display_timings.php">Display Timings Info</a>
  <a href="display_headers.php">Display Headers Info</a>
  <a href="admin_logout.php">Logout </a>
</div>

<br><br>
<canvas id="histogram" width="45" height="20"></canvas>

</body>






</html>