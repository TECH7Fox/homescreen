<?php

$script = $_GET["script"];

if (strpos($script, "py")) {
    $type = "python3";
} elseif (strpos($script, "sh")) {
    $type = "bash";
} else {
    die();
}

if ($_GET["status"] == "true") {
    shell_exec("nohup $type /var/www/html/scripts/auto/" . $script . " >/dev/null 2>&1 &");
} else {
    shell_exec("pkill -f " . $script);
}