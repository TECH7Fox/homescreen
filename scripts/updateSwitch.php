<?php

include "../scripts/connectdb.php";
include "../scripts/dotEnv.php";

$switch = explode("_", $_GET["switch"]);

$sql = "UPDATE switches SET status = :status WHERE name = ':name' AND type = ':type'";
$sth = $db->prepare($sql);
$params = array(
    ":status"   => $_GET["status"] == "true"?1:0,
    ":name" => $switch[0],
    ":type" => $switch[1]
);

try {
    $sth->execute($params);
} catch (Exception $e) {
    sendError($e, 3);
    die();
}

$sql = "SELECT on_code, off_code FROM switches WHERE name = ':name' AND type = ':type'";
$sth = $db->prepare($sql);
$params = array(
    ":name"   => $switch[0],
    ":type" => $switch[1]
);

try {
    $sth->execute($params);
} catch (Exception $e) {
    sendError($e, 3);
    die();
}

$row = $sth->fetch();

try {
    for ($i = 1; $i <= 3; $i++) {
        shell_exec($_ENV["paths"]["443Utils_path"] . "/433Utils/RPi_utils/codesend " . ($_GET["status"] == "true"?$row["on_code"]:$row["off_code"]));
    }
} catch (Exception $e) {
    sendError($e, 3);
}

