<?php

include 'db_con.php';

$username = $_POST["username"];
$sql1 = "SELECT newest_upload from user WHERE username = '$username'";
$result1 = $con->query($sql1);
$row1 = $result1->fetch_assoc();

$sql2 = "SELECT COUNT(*) as total from entry WHERE username = '$username'";
$result2 = $con->query($sql2);
$row2 = $result2->fetch_assoc();

echo "<br>";
echo "<br>";

echo "<table border = '2'>";
echo "<tr>";
echo "<th>";
echo "Last DateTime of Upload";
echo "</th>";

echo "<th>";
echo "Entries Uploaded";
echo "</th>";

echo "</tr>";

echo "<tr>";

echo "<td>";
echo $row1['newest_upload'];
echo "</td>";

echo "<td>";
echo $row2['total'];
echo "</td>";

echo "</tr>";
echo "</table>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


?>