<?php

include 'db_con.php';

$sql1 = "SELECT COUNT(*) as users FROM user";
$result1 = $con->query($sql1);
$row1 = $result1->fetch_assoc();
$total_users = $row1['users'];

echo "<table border = '3'>";
echo "<tr>";
echo "<th>";
echo "Users Counted";
echo "</th>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo $total_users;
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";



$sql2 = "SELECT COUNT(*) as num_methods,method FROM entry GROUP BY method";
$result2 = $con->query($sql2);



if ($result2->num_rows > 0) {
	echo "<table border='3'>";

	echo "<tr>";
	
	echo "<th>";
	
	echo "Method";
	echo "</th>";
	
	echo "<th>";
	
	echo "Count";
	echo "</th>";
	
	echo "</tr>";
  while($row2 = $result2->fetch_assoc()) 
		{
          echo "<tr>";
		  
		  echo "<td>";
		  echo $row2['method'];
		  echo "</td>";
		  echo "<td>";
		  echo $row2['num_methods'];
		  echo "</td>";
		  echo "</tr>";

		}
  
  	echo "</table>";

  
} else {
  echo "No results found";
}

echo "<br>";

echo "<br>";

$sql3 = "SELECT COUNT(*) as num_status,status FROM entry  GROUP BY status";

$result3 = $con->query($sql3);

if ($result3->num_rows > 0) {

echo "<table border='3'>";

	echo "<tr>";
	echo "<th>";
	echo "Status Of Response";
	echo "</th>";
	echo "<th>";
	echo "Count";
	echo "</th>";

echo "</tr>";
  while($row3 = $result3->fetch_assoc()) 
		{
          echo "<tr>";
		  
		  echo "<td>";
		  echo $row3['status'];
		  echo "</td>";
		  echo "<td>";
		  echo $row3['num_status'];
		  echo "</td>";
		  echo "</tr>";

		}
  
  	echo "</table>";



}

else 
	
	{
		
		echo "No results Found";
	}


echo "<br>";
echo "<br>";

$sql4 = "SELECT COUNT(DISTINCT isp) as num_isps FROM entry";
$result4 = $con->query($sql4);
$row4 = $result4->fetch_assoc();
$num_isps = $row4['num_isps'];


echo "<table border='3'>";
echo "<tr>";
echo "<th>";
echo "ISPs Counted";
echo "</th>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo $num_isps;
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";

$sql5 = "SELECT COUNT(DISTINCT url) as num_domains FROM entry";
$result5 = $con->query($sql5);
$row5 = $result5->fetch_assoc();
$num_domains = $row5['num_domains'];


echo "<table border='3'>";
echo "<tr>";
echo "<th>";
echo "Domains Counted";
echo "</th>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo $num_domains;
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";

$sql6 = "SELECT AVG(age) as mesi_ilikia,content_type FROM header_response GROUP BY content_type HAVING  mesi_ilikia >0";
$result6 = $con->query($sql6);

if ($result6->num_rows > 0) {
	
  echo "<table border='3'>";

   echo "<tr>";
   echo "<th>";
   echo "Content Type";
   echo "</th>";
   echo "<th>";
   echo "Average Age";
   echo "</th>";
   echo "</tr>";   
  // output data of each row
  while($row6 = $result6->fetch_assoc()) 
  {
    echo "<tr>";
	echo "<td>";
	echo $row6['content_type'];
	echo "</td>";
	echo "<td>";
	echo $row6['mesi_ilikia'];
	echo "</td>";
	echo "</tr>";
  }
  
    echo "</table>";

  
} else {
  echo "No results found";
}









?>