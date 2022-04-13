<?php


session_start();

$filtered = $_POST["filtered_data"];


echo $filtered;

$myfile = fopen("local_data.har", "w");

fwrite($myfile, $filtered);


fclose($myfile);












?>