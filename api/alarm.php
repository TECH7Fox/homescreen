<?php

//fix this
$_ENV = parse_ini_file('../.env', true);

if (!$_ENV["alarm"]["armed"] == 0) {
    shell_exec("gpio mode 21 out");
    shell_exec("gpio write 21 0");
    echo "on";
} else {
    shell_exec("gpio mode 21 out");
    shell_exec("gpio write 21 1");
    echo "off";
}

?>