<?php

include "connectdb.php";

if (!isset($_GET["id"])) {
    header("location: ../settings.php");
    die();
}

$sql = "DELETE FROM messages WHERE id = :id";
$sth = $db->prepare($sql); 
$params = array(":id" => $_GET["id"]);

try {
    $sth->execute($params);
} catch (Exception $e) {
    sendError($e, 3);
}

header("location: ../settings.php");

?>