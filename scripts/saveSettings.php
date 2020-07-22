<?php

include "connectdb.php";

    $sql = "UPDATE settings SET value = " . "'" . $_POST["loading_screen"] . "' WHERE name = 'loading_screen'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    // Make loop for all cam settings.

    $sql = "UPDATE settings SET value = " . "'" . $_POST["cam_1"] . "' WHERE name = 'cam_1'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_POST["cam_2"] . "' WHERE name = 'cam_2'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_POST["cam_3"] . "' WHERE name = 'cam_3'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "UPDATE settings SET value = " . "'" . $_POST["cam_4"] . "' WHERE name = 'cam_4'";
    $sth = $db->prepare($sql); 
    $sth->execute();

    $sql = "SELECT location FROM switches";
    $sth = $db->prepare($sql);
    $sth->execute();

    while ($row = $sth->fetch()) {
        $sql = "UPDATE switches SET value = " . "'" . $_POST[$row["location"]] . "' WHERE location = '" . $row["location"] . "'";
        $sth2 = $db->prepare($sql);
        $sth2->execute();
    }

    $sql = "SELECT * FROM settings WHERE name LIKE '%discord%'";
    $sth = $db->prepare($sql);
    $sth->execute();

    while ($row = $sth->fetch()) {
        $sql = "UPDATE settings SET value = " . "'" . $_POST[$row["name"]] . "' WHERE name = '" . $row["name"] . "'";
        $sth2 = $db->prepare($sql);
        $sth2->execute();
    }

header("location: ../settings.php");