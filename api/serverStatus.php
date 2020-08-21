<?php

include "../scripts/connectdb.php";
include "../scripts/functions.php";

$sql = "SELECT * FROM servers ORDER BY type";
$sth = $db->prepare($sql); 
$sth->execute();

while ($row = $sth->fetch()) {
    if (empty(exec('fping -c1 -t50 ' . $row["ip"]))) {
        echo '<tr class="table-danger"><td>';
    } else {
        echo '<tr class="table-success"><td>';
    }
    echo '<i class="' . icon($row["type"]) . '"></i></td><td>' . $row["name"] .  '</td><td>' . $row["ip"] . '</td></tr>';
}

?>