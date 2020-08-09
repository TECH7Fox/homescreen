<?php

include "../scripts/connectdb.php";

$sql = 'SELECT * FROM switches WHERE type = "light" AND value = "auto" OR value = "auto_alarm"';
$sth = $db->prepare($sql);
$sth->execute();

while ($row = $sth->fetch()) {
    $switches[] = $row;
}

echo json_encode($switches);