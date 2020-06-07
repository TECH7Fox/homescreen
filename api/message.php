<?php

include "../connectdb.php";

$sql = "SELECT * FROM messages WHERE date = " . "'" . date("Y-m-d") . "'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if (empty($row["date"])) {
    shell_exec("say 'welcome home'");
    $row["title"] = "Welcome home";
    $row["message"] = "Today is: " . date("l");
} else {
    shell_exec("say '" . $row["title"] . "'");
    shell_exec("say '" . $row["message"] . "'");
}

?>

<div style='height: 100%; background: url("<?php echo $row["background"]; ?>"); background-position: 90% 100%; background-repeat: no-repeat; background-size: 50%;'>
    <h1 class="display-4"><?php echo $row["title"]; ?></h1>
    <hr class="my-4 bg-white">
    <div id="main-text">
        <p class="lead"><?php echo $row["message"]; ?></p>
    </div>
</div>
