<?php

include "../scripts/connectdb.php";

$sql = "SELECT * FROM servers ORDER BY type";
$sth = $db->prepare($sql); 
$sth->execute();

while ($row = $sth->fetch()) {
    if (strpos(exec('ping -n 1 -w 1 ' . $row["ip"]), "100%") !== false) {
        echo '<tr class="table-danger"><td>';
    } else {
        echo '<tr class="table-success"><td>';
    }
    switch($row["type"]) {
        case "modem": echo '<i class="fas fa-server"></i>';  break;
        case "cam": echo '<i class="fas fa-video"></i>';     break;
        case "cctv": echo '<i class="fas fa-server"></i>';   break;
        case "alarm": echo '<i class="fas fa-bell"></i>';    break;
        default: echo'<i class="fas fa-server"></i>';        break;
    }
    echo '</td><td>' . $row["name"] .  '</td><td>' . $row["ip"] . '</td></tr>';
}

?>