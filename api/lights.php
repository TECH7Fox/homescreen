<?php

include "../scripts/connectdb.php";
include "../scripts/dotEnv.php";

$sql = 'SELECT * FROM switches WHERE type = "light" AND value = "auto" OR value = "auto_alarm"';
$sth = $db->prepare($sql);
$sth->execute();

while ($row = $sth->fetch()) {
    $switches[] = $row;
}

if (!empty($switches)) {
    $json = json_encode($switches);
    echo $json;
}