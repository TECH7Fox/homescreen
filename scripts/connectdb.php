<?php 

$host = 'localhost'; 
$dbname = 'homescreen'; 
$username = 'root'; 
$password = 'root'; 

$connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8'; 
$db = new PDO($connectStr, $username, $password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

function sendError($error, $fatal) {
    global $db;

    $sql = "INSERT INTO notifications (notification, timestamp, level) VALUES (:notification, :timestamp, :level)";
    $sth = $db->prepare($sql); 

    if ($fatal) {
        $level = 3;
    } else {
        $level = 2;
    }

    $params = array(
        ":notification" => $error,
        ":level" => $level,
        ":timestamp" => date("Y-m-d H:i:s")
    );

    $sth->execute($params);
}