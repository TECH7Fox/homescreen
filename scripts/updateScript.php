<?php

//fix this to auto choose a program to run with.

if ($_GET["status"] == "true") {
    shell_exec("nohup python3 /var/www/html/scripts/auto/" . $_GET["script"] . " >/dev/null 2>&1 &");
} else {
    shell_exec("pkill -f " . $_GET["script"]);
    //fix security problem.
}