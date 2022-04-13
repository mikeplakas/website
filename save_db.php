<html>

<head>
<link rel="stylesheet" href="mystyle.css">

</head>

<?php

error_reporting(E_ERROR | E_PARSE);

include 'db_con.php';

session_start();

$data_from_har = $_POST["filtered_data"];
$user_ip = $_POST["user_ip"];
$api_for_user = "http://ipinfo.io/{$user_ip}/json";
$content = file_get_contents($api_for_user);
$result = json_decode($content);
$coords = $result->loc;
$paroxos  = $result->org;
$data_decoded = json_decode($data_from_har, true);
$coords_of_server="unknown";
$data_decoded = $data_decoded['entries'];
$started_dt="";
$srv_ip="";
$wait="";
$method ="";
$url = "";
$username = $_SESSION["username"];
$status ="";
$text_of_status="";
$converted_day="";
$sql_max_id = "SELECT MAX(id) as megisto FROM entry";
$result = mysqli_query($con,$sql_max_id);
$row = $result->fetch_assoc();
$id_of_entry = $row["megisto"];

$insert_into_entry  = "INSERT INTO entry VALUES";
$sql_req  = "INSERT INTO request VALUES";
$sql_resp  = "INSERT INTO response VALUES";
$insert_into_head_req  = "INSERT INTO header_request VALUES";
$insert_into_head_respo  = "INSERT INTO header_response VALUES";



date_default_timezone_set('Europe/Athens');

$newest_upload = date('m/d/Y h:i:s a', time());

$sql_update = "UPDATE user SET newest_upload='$newest_upload' where username='$username'";

if ($con->query($sql_update) === TRUE) {
} else {

}



for($i=0;$i<count($data_decoded);$i++)
	
	{
		$coords_of_server="unknown";
		$id_of_entry= $id_of_entry+1;
		$started_dt =  $data_decoded[$i]['startedDateTime'];
		$myday = substr($started_dt,0,10);
		$converted_day=date('l', strtotime($myday));
		$srv_ip = $data_decoded[$i]['serverIPAddress'];
		$api_for_server = "http://ipinfo.io/{$srv_ip}/json";
		$content_server = file_get_contents($api_for_server);
		$result_server = json_decode($content_server);
		$coords_of_server = $result_server->loc;
		$wait = $data_decoded[$i]['timings']['wait'];
	    $method = $data_decoded[$i]['request']['method'];
        $url = $data_decoded[$i]['request']['url'];
        $req_id = $id_of_entry;
		$status = $data_decoded[$i]['response']['status'];
        $text_of_status = $data_decoded[$i]['response']['statusText'];
        $resp_id = $id_of_entry;
		$request_array = $data_decoded[$i]['request']['headers'];
	    $response_array = $data_decoded[$i]['response']['headers'];
	    $content_type_req="";
	    $cache_control_req="";
	    $pragma_req="";
	    $expires_req="";
	    $age_req="";
		$last_modified_req="";
        $host_req="";
		$content_type_resp="";
	    $cache_control_resp="";
	    $pragma_resp="";
	    $expires_resp="";
	    $age_resp="";
		$last_modified_resp="";
        $host_resp="";
		$header_req_id = $req_id;
		$header_resp_id = $resp_id;
		
		
  $insert_into_entry = $insert_into_entry."('$id_of_entry','$started_dt','$wait','$srv_ip','$username','$paroxos','$coords','$coords_of_server','$converted_day','$method','$url','$status','$text_of_status')";
    
   if($i!=count($data_decoded)-1)

   {
      $insert_into_entry=$insert_into_entry.",";

   }	   

  	 
	
	for($j=0;$j<count($request_array);$j++)
		
		{
			if($request_array[$j]['name']=="content-type"||$request_array[$j]['name']=="Content-Type")
				
				{
					$content_type_req = $request_array[$j]['value'];
				}
			
			if($request_array[$j]['name']=="cache-control"||$request_array[$j]['name']=="Cache-Control")
				
				{
				  $cache_control_req= $request_array[$j]['value'];

				}
			
			if($request_array[$j]['name']=="pragma"||$request_array[$j]['name']=="Pragma")
				
				{
				$pragma_req = $request_array[$j]['value'];

					
				}
				
			if($request_array[$j]['name']=="expires"||$request_array[$j]['name']=="Expires")
				
				{
				$expires_req = $request_array[$j]['value'];

				}
				
			if($request_array[$j]['name']=="age"|$request_array[$j]['name']=="Age")
				
				{
				$age_req = $request_array[$j]['value'];

				}
				
			if($request_array[$j]['name']=="last-modified"|$request_array[$j]['name']=="Last-Modified")
				
				{
				$last_modified_req = $request_array[$j]['value'];

				}
				
			if($request_array[$j]['name']=="host"||$request_array[$j]['name']=="Host")
				
				{
				$host_req = $request_array[$j]['value'];
				}
			
		}
	
	
	$insert_into_head_req  = $insert_into_head_req."('$header_req_id','$id_of_entry','$content_type_req','$cache_control_req','$pragma_req','$expires_req','$age_req','$last_modified_req','$host_req')";
		  

	if($i!=count($data_decoded)-1)

   {
      $insert_into_head_req=$insert_into_head_req.",";

   }	
	
	
	for($k=0;$k<count($response_array);$k++)
		
		{
			if($response_array[$k]['name']=="content-type"||$response_array[$k]['name']=="Content-Type")
				
				{
					$content_type_resp = $response_array[$k]['value'];
				}
			
				if($response_array[$k]['name']=="cache-control"||$response_array[$k]['name']=="Cache-Control")
				
				{
				  $cache_control_resp= $response_array[$k]['value'];

				}
			
			if($response_array[$k]['name']=="pragma"||$response_array[$k]['name']=="Pragma" )
				
				{
				$pragma_resp = $response_array[$k]['value'];

					
				}
				
			if($response_array[$k]['name']=="expires"||$response_array[$k]['name']=="Expires")
				
				{
				$expires_resp = $response_array[$k]['value'];

				}
				
			if($response_array[$k]['name']=="age"||$response_array[$k]['name']=="Age")
				
				{
				$age_resp= $response_array[$k]['value'];

				}
				
			if($response_array[$k]['name']=="last-modified"||$response_array[$k]['name']=="Last-Modified")
				
				{
				$last_modified_resp = $response_array[$k]['value'];

				}
				
			if($response_array[$k]['name']=="host"||$response_array[$k]['name']=="Host")
				
				{
				$host_resp = $response_array[$k]['value'];
				}
			
		}
	
	
	$insert_into_head_respo  = $insert_into_head_respo."('$header_resp_id','$id_of_entry','$content_type_resp','$cache_control_resp','$pragma_resp','$expires_resp','$age_resp','$last_modified_resp','$host_resp')";
		  
		  
	if($i!=count($data_decoded)-1)

   {
      $insert_into_head_respo=$insert_into_head_respo.",";

   }	  

	
	}
	
	
if ($con->query($insert_into_entry) === TRUE) {
  //echo "Ola ok";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($con->query($insert_into_head_req) === TRUE) {
  //echo "Ola ok";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($con->query($insert_into_head_respo) === TRUE) {
  //echo "Ola ok";
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
}
	

?>


</html>