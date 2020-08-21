<?php

include "../scripts/connectdb.php";
include "../scripts/dotEnv.php";

$switch = explode("_", $_GET["switch"]);

$sql = "UPDATE switches SET status = :status WHERE name = :name AND type = :type";
$sth = $db->prepare($sql);
if ($_GET["status"] == "true") {
    $status = 1;
} else {
    $status = 0;
}
$params = array(
    ":status" => $status,
    ":name"   => $switch[0],
    ":type"   => $switch[1] 
);

try {
    $sth->execute();
} catch (Exception $e) {
    sendError($e, 3);
    die();
}

$sql = "SELECT on_code, off_code FROM switches WHERE name = :name AND type = :type";
$sth = $db->prepare($sql);
$params = array(
    ":name" => $switch[0],
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
        echo shell_exec("sudo " . $_ENV["paths"]["433Utils"] . "/433Utils/RPi_utils/codesend " . ($_GET["status"] == "true"?$row["on_code"]:$row["off_code"]));
    }
} catch (Exception $e) {
    sendError($e, 3);
}

