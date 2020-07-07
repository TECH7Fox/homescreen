<?php

include "../scripts/connectdb.php";

$sql = "SELECT value FROM settings WHERE name = 'alarm'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if ($row["value"] == "on") {
    shell_exec("gpio mode 21 out");
    shell_exec("gpio write 21 0");
    echo "on";
} else {
    shell_exec("gpio mode 21 out");
    shell_exec("gpio write 21 1");
    echo "off";
}

?>