<?php

include 'db_con.php';

$content_types = array();

$sum_of_values = array();

$count_of_values = array();

$sql2 = "SELECT DISTINCT content_type as mytype FROM header_response WHERE content_type<>''";

$result_query = $con->query($sql2);

$sql = "SELECT cache_control, content_type from header_response where cache_control like '%max-age%'";

$db_ttl = array();

$db_con_type = array();

$result = $con->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $cache_control = $row['cache_control'];
	
	$token = strtok($cache_control, ",");

	while ($token !== false)
		{
		
		if (strpos($token, 'max-age') !== false) { 
			
			$token_age = strtok($token,"=");
			
			$token_age = strtok("=");
					
			array_push($db_ttl,intval($token_age));
				
			array_push($db_con_type,$row['content_type']);
			
			
			
			
			
			}
		
		
		
		$token = strtok(",");
	
	    }
} 

}

else {
  echo "0 results";
}



while($row_result = $result_query->fetch_assoc()) {
	
	array_push($content_types,$row_result['mytype']);
	
}

for($i=0;$i<count($content_types);$i++)
	
	{
		array_push($sum_of_values,0);
		array_push($count_of_values,0);
		
	}



for($i=0;$i<count($content_types);$i++)

{
	for($j=0;$j<count($db_con_type);$j++)
		
		{
			if($content_types[$i] == $db_con_type[$j])
				
				{
					$sum_of_values[$i] = $sum_of_values[$i] + $db_ttl[$j];
					
					$count_of_values[$i]++;
					
				}
			
						
		}
	
		
}

$average_ttls = array();


for($i=0;$i<count($content_types);$i++)
	
	{
		
		if($count_of_values[$i]!=0)
		
		{
		
		array_push($average_ttls, $sum_of_values[$i] / $count_of_values[$i]);
		
		}
		
		else
		{
			
			array_push($average_ttls,0);
		}
		
	}

echo "<table border='3'>";

echo "<tr>";

echo "<th>";
echo "Content Type";
echo "</th>";

echo "<th>";
echo "Average TTL";
echo "</th>";
echo "</tr>";
 
for($i=0;$i<count($average_ttls);$i++)
	
	{
		if($average_ttls[$i]!=0)
		{
		echo "<tr>";
		
		echo "<td>";
		echo $content_types[$i];
		echo "</td>";
		
		echo "<td>";
		echo $average_ttls[$i];
		echo "</td>";
		echo "</tr>";
		}
	}
echo "</table>";

echo "<br>";

echo "<br>";

echo "<br>";

$sql = "SELECT COUNT(*) as count_of_public FROM header_response WHERE cache_control LIKE '%public%'";

$result = $con->query($sql);

$row = $result->fetch_assoc();


$sql2 = "SELECT COUNT(*) as count_of_private FROM header_response WHERE cache_control LIKE '%private%'";

$result2 = $con->query($sql2);

$row2 = $result2->fetch_assoc();



$sql3 = "SELECT COUNT(*) as count_of_no_cache FROM header_response WHERE cache_control LIKE '%no-cache%'";

$result3 = $con->query($sql3);

$row3 = $result3->fetch_assoc();


$sql4 = "SELECT COUNT(*) as count_of_no_store FROM header_response WHERE cache_control LIKE '%no-store%'";

$result4 = $con->query($sql4);

$row4 = $result4->fetch_assoc();


$sql5 = "SELECT COUNT(*) as count FROM header_response";

$result5 = $con->query($sql5);

$row5 = $result5->fetch_assoc();

$public_percent = intval($row['count_of_public'])/intval($row5['count']);

$private_percent = intval($row2['count_of_private'])/intval($row5['count']);

$no_cache_percent = intval($row3['count_of_no_cache'])/intval($row5['count']);

$no_store_percent = intval($row4['count_of_no_store'])/intval($row5['count']);


echo "<table border='3'>";

echo "<tr>";

echo "<th>";
echo "Peracentage of Public";
echo "</th>";

echo "<th>";
echo "Percentage of Private";

echo "</th>";

echo "<tr>";

echo "<td>";

echo $public_percent;

echo "</td>";

echo "<td>";

echo $private_percent;

echo "</td>";

echo "</tr>";


echo "</table>";

echo "<br><br>";

echo "<table border='3'>";

echo "<tr>";

echo "<th>";
echo "Percentage of No Cache";

echo "</th>";

echo "<th>";
echo "Percentage of No Store";

echo "</th>";

echo "</tr>";

echo "<tr>";

echo "<td>";

echo $no_cache_percent;

echo "</td>";

echo "</td>";

echo "<td>";

echo $no_store_percent;

echo "</td>";


echo "</tr>";

echo "</table>";

echo "<br>";

echo "<br>";

$sql = "SELECT COUNT(*) as count_of_stale FROM header_response WHERE cache_control LIKE '%max-stale%'";

$result = $con->query($sql);

$row = $result->fetch_assoc();

$total_stales = intval($row['count_of_stale']);

$sql2 = "SELECT COUNT(*) as count_of_fresh FROM header_response WHERE cache_control LIKE '%min-fresh%'";

$result2 = $con->query($sql2);

$row2 = $result2->fetch_assoc();

$total_fresh = intval($row2['count_of_fresh']);

$sql3 = "SELECT COUNT(*) as plithos FROM header_response";

$result3 = $con->query($sql3);

$row3 = $result3->fetch_assoc();

$total = intval($row3['plithos']);


echo "<table border='3'>";

echo "<tr>";

echo "<th>";
echo "Percentage of Max-stale";
echo "</th>";
echo "</tr>";

echo "<tr>";
echo "<td>";

echo $total_stales/$total;
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";

echo "<table border='3'>";

echo "<tr>";

echo "<th>";
echo "Percentage of Min-Fresh";
echo "</th>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo $total_fresh/$total;
echo "</td>";
echo "</tr>";
echo "</table>";




?>