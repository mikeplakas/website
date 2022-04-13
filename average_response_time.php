<?php


include 'db_con.php';

$sql = "SELECT wait,started_date_time from entry";

$result = $con->query($sql);

$sum_response_time = array();

$count_response_time = array();

$avg_response_time = [];

for($i=0;$i<24;$i++)
	
	{
		
		array_push($sum_response_time,0);
		
		array_push($count_response_time,0);
   
		array_push($avg_response_time,0);
		
	}
	

if ($result->num_rows > 0) {
	
	
	while($row = $result->fetch_assoc()) 
		{

     $hour_extracted= $row['started_date_time'];
	 
	 
	 $hour_extracted = substr($hour_extracted,11,2);
	 
	 
	 if($hour_extracted=="01")
		 
		 {
			
             $sum_response_time[0] = $sum_response_time[0] + floatval($row['wait']);
             $count_response_time[0]++;			 
			 
		 }	 
	
    elseif($hour_extracted=="02")
	
	{
		
	  $sum_response_time[1] = $sum_response_time[1] + floatval($row['wait']);
      $count_response_time[1]++;	  

		
	}
	
	elseif($hour_extracted=="03")
	
	{
		
	  $sum_response_time[2] = $sum_response_time[2] + floatval($row['wait']);
      $count_response_time[2]++;	  

		
	}
	
	elseif($hour_extracted=="04")
	
	{
		
	  $sum_response_time[3] = $sum_response_time[3] + floatval($row['wait']);
      $count_response_time[3]++;	  

		
	}
	
	elseif($hour_extracted=="05")
	
	{
		
	  $sum_response_time[4] = $sum_response_time[4] + floatval($row['wait']);
      $count_response_time[4]++;	  

		
	}
	
	elseif($hour_extracted=="06")
	
	{
		
	  $sum_response_time[5] = $sum_response_time[5] + floatval($row['wait']);
      $count_response_time[5]++;	  

		
	}
	
	elseif($hour_extracted=="07")
	
	{
		
	  $sum_response_time[6] = $sum_response_time[6] + floatval($row['wait']);
      $count_response_time[6]++;	  

		
	}
	
	elseif($hour_extracted=="08")
	
	{
		
	  $sum_response_time[7] = $sum_response_time[7] + floatval($row['wait']);
      $count_response_time[7]++;	  

		
	}
	
	elseif($hour_extracted=="09")
	
	{
		
	  $sum_response_time[8] = $sum_response_time[8] + floatval($row['wait']);
      $count_response_time[8]++;	  

		
	}
	
	elseif($hour_extracted=="10")
	
	{
		
	  $sum_response_time[9] = $sum_response_time[9] + floatval($row['wait']);
      $count_response_time[9]++;	  

		
	}
	
	elseif($hour_extracted=="11")
	
	{
		
	  $sum_response_time[10] = $sum_response_time[10] + floatval($row['wait']);
      $count_response_time[10]++;	  

		
	}
	
	elseif($hour_extracted=="12")
	
	{
		
	  $sum_response_time[11] = $sum_response_time[11] + floatval($row['wait']);
      $count_response_time[11]++;	  

		
	}
	
	elseif($hour_extracted=="13")
	
	{
		
	  $sum_response_time[12] = $sum_response_time[12] + floatval($row['wait']);
      $count_response_time[12]++;	  

		
	}
	
	elseif($hour_extracted=="14")
	
	{
		
	  $sum_response_time[13] = $sum_response_time[13] + floatval($row['wait']);
      $count_response_time[13]++;	  

		
	}
	
	
	elseif($hour_extracted=="15")
	
	{
		
	  $sum_response_time[14] = $sum_response_time[14] + floatval($row['wait']);
      $count_response_time[14]++;	  

		
	}
	
	elseif($hour_extracted=="16")
	
	{
		
	  $sum_response_time[15] = $sum_response_time[15] + floatval($row['wait']);
      $count_response_time[15]++;	  

		
	}
	
	
	elseif($hour_extracted=="17")
	
	{
		
	  $sum_response_time[16] = $sum_response_time[16] + floatval($row['wait']);
      $count_response_time[16]++;	  

		
	}
	
	
	elseif($hour_extracted=="18")
	
	{
		
	  $sum_response_time[17] = $sum_response_time[17] + floatval($row['wait']);
      $count_response_time[17]++;	  

		
	}
	
	
	elseif($hour_extracted=="19")
	
	{
		
	  $sum_response_time[18] = $sum_response_time[18] + floatval($row['wait']);
      $count_response_time[18]++;	  

		
	}
	
	
	elseif($hour_extracted=="20")
	
	{
		
	  $sum_response_time[19] = $sum_response_time[19] + floatval($row['wait']);
      $count_response_time[19]++;	  

		
	}
	
	
	elseif($hour_extracted=="21")
	
	{
		
	  $sum_response_time[20] = $sum_response_time[20] + floatval($row['wait']);
      $count_response_time[20]++;	  

		
	}
	
	elseif($hour_extracted=="22")
	
	{
		
	  $sum_response_time[21] = $sum_response_time[21] + floatval($row['wait']);
      $count_response_time[21]++;	  

		
	}
	elseif($hour_extracted=="23")
	
	{
		
	  $sum_response_time[22] = $sum_response_time[22] + floatval($row['wait']);
      $count_response_time[22]++;	  

		
	}
	
	elseif($hour_extracted=="00")
	
	{
		
	  $sum_response_time[23] = $sum_response_time[23] + floatval($row['wait']);
      $count_response_time[23]++;	  

		
	}
	
	
}


for($i=0;$i<24;$i++)
	

	{
		if($count_response_time[$i]>0)
			
			{
				$avg_response_time[$i] = $sum_response_time[$i]/$count_response_time[$i];
				
			}
		
		
		
	}


}

echo json_encode($avg_response_time);






?>