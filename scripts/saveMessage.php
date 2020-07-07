<?php

include "connectdb.php";

$sql = "INSERT INTO messages (
    permanent, 
    title, 
    message, 
    date, 
    background
) VALUES (
    :permanent,
    :title,
    :message,
    :date,
    :background
)";
$sth = $db->prepare($sql); 
$params = array(
    ":permanent"  => (isset($_POST["permanent"])?$_POST["permanent"]:0),
    ":title"      => $_POST["title"],
    ":message"    => $_POST["message"],
    ":date"       => date("Y-m-d", strtotime($_POST["date"])),
    ":background" => $_POST["background"]
);

try {
    $sth->execute($params);
} catch (Exception $e) {
    //send error
    header("location: ../messages.php");
    die();
}

header("location: ../messages.php");