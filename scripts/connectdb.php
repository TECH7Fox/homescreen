<?php 

$host = 'localhost'; 
$dbname = 'homescreen'; 
$username = 'root'; 
$password = 'root'; 

$connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8'; 
$db = new PDO($connectStr, $username, $password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

function sendError($error, $fatal) {
    $sql = "INSERT INTO notifications (notification, timestamp, level) VALUES (:notification, now(), :level";
    $sth = $db->prepare($sql); 

    if ($fatal) {
        $level = 3;
    } else {
        $level = 2;
    }

    $params = array(
        ":notification"   => $error,
        ":level" => $level
    );

    $sth->execute($params);
}