<?php

include "connectdb.php";

$script = explode(".", $_GET["script"]);

switch($script[1]) {
    case "py": $type = "python3";
    case "sh": $type = "sh";
    default: 
        sendError("Not supported script type: $script.", 2); 
        die(); 
    break;
}

if ($_GET["status"] == "true") {
    shell_exec("nohup $type " . $_SERVER['DOCUMENT_ROOT'] . "/scripts/auto/" . $script . " >/dev/null 2>&1 &");
} else {
    shell_exec("pkill -f " . $script);
}