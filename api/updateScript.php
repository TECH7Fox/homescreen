<?php

include "../connectdb.php";

$sql = "UPDATE scripts SET status = " . ($_GET["status"] == "true"?1:0) . " WHERE name = '" . $_GET["switch"] . "'";
$sth = $db->prepare($sql);
$sth->execute();

$sql = "SELECT type, path, name FROM scripts WHERE name = " . "'" . $_GET["switch"] . "'";
$sth = $db->prepare($sql);
$sth->execute();
$row = $sth->fetch();

if ($_GET["status"] == "true") {
    shell_exec("nohup " . $row["type"] . " " . $row["path"] . " >/dev/null 2>&1 &");
} else {
    shell_exec("killall -9 " . $row["name"]);
}