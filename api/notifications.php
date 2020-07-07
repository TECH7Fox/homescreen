<?php

include "../scripts/connectdb.php";

$sql = "SELECT * FROM notifications ORDER by timestamp";
$sth = $db->prepare($sql); 
$sth->execute();

while ($row = $sth->fetch()) {
    switch($row["level"]) {
        case 1: echo '<tr class="table-success"><td><i class="fas fa-check"></i>';                break;
        case 2: echo '<tr class="table-warning"><td><i class="fas fa-exclamation-triangle"></i>'; break;
        case 3: echo '<tr class="table-danger"><td><i class="fas fa-times"></i>';                 break;
        default: echo'<tr class="table-active"><td><i class="fas fa-skull-crossbones"></i>';      break;
    }
    echo '</td><td>' . $row["notification"] .  '</td><td>' . $row["timestamp"] . '</td></tr>';
}

?>