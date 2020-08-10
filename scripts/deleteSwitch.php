<?php

include "../scripts/connectdb.php";

if (empty($_GET["id"])) {
    header("location: ../settings.php");
    die();
}

$sql = "DELETE FROM switches WHERE id = " . $_GET["id"];
$sth = $db->prepare($sql);
$sth->execute();

header("location: ../settings.php");