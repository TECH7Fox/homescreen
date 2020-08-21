<?php

include "connectdb.php";

$sql = "INSERT INTO switches (
    name, 
    type, 
    status, 
    value, 
    on_code,
    off_code
) VALUES (
    :name,
    :type,
    :status,
    :value,
    :on_code,
    :off_code
)";
$sth = $db->prepare($sql); 
$params = array(
    ":name"  => $_POST["name"],
    ":type"      => $_POST["type"],
    ":status"    => $_POST["status"],
    ":value"       => "manual",
    ":on_code" => $_POST["on_code"],
    ":off_code" => $_POST["off_code"]
);

try {
    $sth->execute($params);
} catch (Exception $e) {
    sendError($e, 3);
}

header("location: ../settings.php");