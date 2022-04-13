<?php

session_start();

include 'db_con.php';

$username = $_SESSION["username"];

$sql = "SELECT COUNT(*) as total, entry.server_latlng as slatlng FROM entry inner join header_response on entry.id = header_response.id_entry WHERE entry.server_latlng<>''AND entry.username='$username'   GROUP BY entry.server_latlng";

$result = $con->query($sql);

$map_data = array();

if ($result->num_rows > 0) {


while($row = $result->fetch_assoc()) 
		{
          $data = array();
		  $latlng = explode(',', $row["slatlng"]);
		  array_push($data,floatval($latlng[0])); 
		  array_push($data,floatval($latlng[1]));
          array_push($data,intval($row["total"]));
          array_push($map_data,$data);


		}


}

echo json_encode($map_data);


?>