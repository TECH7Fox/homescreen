<?php

include "connectdb.php";

if (isset($_GET["outdoor_lights"])) {
    $sql = "UPDATE settings SET value = " . "'" . $_GET["outdoor_lights"] . "' WHERE name = 'outdoor_lights'";
    $sth = $db->prepare($sql); 
    $sth->execute();
}
if (isset($_GET["vacation_mode"])) {
    $sql = "UPDATE settings SET value = " . "'" . $_GET["vacation_mode"] . "' WHERE name = 'vacation_mode'";
    $sth = $db->prepare($sql); 
    $sth->execute();
}
if (isset($_GET["loading_screen"])) {
    $sql = "UPDATE settings SET value = " . "'" . $_GET["loading_screen"] . "' WHERE name = 'loading_screen'";
    $sth = $db->prepare($sql); 
    $sth->execute();
}
    $sql = "UPDATE settings SET value = " . "'" . $_GET["cam_1"] . "' WHERE name = 'cam_1'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_GET["cam_2"] . "' WHERE name = 'cam_2'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_GET["cam_3"] . "' WHERE name = 'cam_3'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_GET["cam_4"] . "' WHERE name = 'cam_4'";
    $sth = $db->prepare($sql); 
    $sth->execute();


header("location: settings.php");