<?php 

$host = 'localhost'; 
$dbname = 'homescreen'; 
$username = 'root'; 
$password = 'root'; 

$connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8'; 
$db = new PDO($connectStr, $username, $password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 