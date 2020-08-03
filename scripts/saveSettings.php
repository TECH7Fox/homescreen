<?php

include "connectdb.php";
include "dotEnv.php";

$sql = "SELECT location FROM switches";
$sth = $db->prepare($sql);
$sth->execute();

while ($row = $sth->fetch()) {
    $sql = "UPDATE switches SET value = " . "'" . $_POST[$row["location"]] . "' WHERE location = '" . $row["location"] . "'";
    $sth2 = $db->prepare($sql);
    $sth2->execute();
}

for ($i = 1; $i <= 4; $i++) {
    $_ENV["cams"]["camera_$i"] = $_POST["camera_$i"];
}

$_ENV["cosmetics"]["loading_screen"] = $_POST["loading_screen"];

$_ENV["discord"]["discord_sendby_arm"]     = $_POST["discord_sendby_arm"];
$_ENV["discord"]["discord_sendby_unarm"]   = $_POST["discord_sendby_unarm"];
$_ENV["discord"]["discord_sendby_tripped"] = $_POST["discord_sendby_tripped"];

updateDotEnv($_ENV);

header("location: ../settings.php");