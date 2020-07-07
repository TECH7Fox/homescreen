<?php

include "connectdb.php";

if (!isset($_GET["id"])) {
    header("location: ../messages.php");
    die();
}

$sql = "DELETE FROM messages WHERE id = :id";
$sth = $db->prepare($sql); 
$params = array(":id" => $_GET["id"]);

try {
    $sth->execute($params);
} catch (Exception $e) {
    //send error
    header("location: ../messages.php");
    die();
}

header("location: ../messages.php");

?>