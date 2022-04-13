<html>

<head>

<link rel="stylesheet" href="mystyle.css">
<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"> </script>
<script src="leaflet-heatmap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
		
	        var properties_of_map = {
            center: [38.246241, 21.735087],
            zoom: 5
         }
		 	 
		 let heatmap_properties = {"radius": 40,
			"maxOpacity": 3,
			"scaleRadius": false,
			"useLocalExtrema": false,
			latField: 'lat',
			lngField: 'lng',
			valueField: 'count'};	
	
		 let hm_layer = new HeatmapOverlay(heatmap_properties);

         var map = new L.map('map', properties_of_map);
         
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         map.addLayer(layer);
         
		 map.addLayer(hm_layer);
		
$( document ).ready(function() {
    
	  $.ajax({
                url:'map_data.php',
			
               type:'post',
 
                success:function(response){
					
					 var result = JSON.parse(response);
		
					 var k = result.map(function(x) { 
                        return { 
						lat:x[0], 
						lng: x[1],
						count: x[2]
                       }; 
                       });
                 
				let show = {
				max: 10, data: k};


        hm_layer.setData(show);

                }
            });	
});	

});



</script>


</head>

<?php

session_start();

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
<br>
<br>

 <div id = "map" style = "width: 100%; height: 100%"></div>

</body>

</html>