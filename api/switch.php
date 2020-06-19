<?php

include "../connectdb.php";

$switch = explode("_", $_GET["switch"]);

$sql = "UPDATE switches SET status = " . ($_GET["status"] == "true"?1:0) . " WHERE location = '" . $switch[0] . "' AND type = '" . $switch[1] . "'";
$sth = $db->prepare($sql);
$sth->execute();

$sql = "SELECT on_code, off_code FROM switches WHERE location = '" . $switch[0] . "' AND type = '" . $switch[1] . "'";
$sth = $db->prepare($sql);
$sth->execute();
$row = $sth->fetch();

for ($i = 1; $i <= 3; $i++) {
    shell_exec("sudo ./home/pi/433Utils/RPi_utils/codesend " . ($_GET["status"] == "true"?$row["on_code"]:$row["off_code"]));
}