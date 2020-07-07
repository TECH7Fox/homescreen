<?php

include "../scripts/connectdb.php";

$sql = "SELECT * FROM messages WHERE date = " . "'" . date("Y-m-d") . "'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if (empty($row["date"])) {
    shell_exec("say 'welcome home'");
    $row["title"] = "Welcome home";
    $row["message"] = "No special message";
} else {
    shell_exec("say '" . $row["title"] . "'");
    shell_exec("say '" . $row["message"] . "'");
}

?>

<div class="h-100" style='background: url("<?php echo "assets/backgrounds/" . $row["background"]; ?>"); background-position: center center; background-repeat: no-repeat; background-size: contain;'>
    <h2 class="display-4"><?php echo $row["title"]; ?></h2>
    <p class="lead"><?php echo $row["message"]; ?></p>
    <hr class="my-4 bg-white">
    <div id="main-text">
        <p class="lead"><?php echo date("l j F Y"); ?></p>
    </div>
</div>
