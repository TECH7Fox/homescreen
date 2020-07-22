<?php

include "../scripts/connectdb.php";

$sql = "SELECT * FROM messages WHERE date = " . "'" . date("Y-m-d", strtotime('+2 hours')) . "'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if (empty($row["date"])) {
    $sql = "SELECT * FROM messages where permanent = 1 AND day(date) = " . date("d", strtotime('+2 hours')) . " AND month(date) = " . date("m", strtotime('+2 hours'));
    $sth = $db->prepare($sql); 
    $sth->execute();
    $row = $sth->fetch();
}

if (empty($row["date"])) {
    shell_exec("say 'welcome home'");
    $row["title"] = "Welcome home";
    $row["message"] = "No special message";
} else {
    shell_exec("say '" . $row["title"] . "'");
    shell_exec("say '" . $row["message"] . "'");
}

?>

<div class="h-100" style='background: url("<?php if (isset($row["background"])) { echo "assets/backgrounds/" . $row["background"]; } ?>"); background-position: 75% center; background-repeat: no-repeat; background-size: contain;'>
    <h2 id="title" class="display-4"><?php echo $row["title"]; ?></h2>
    <p id="message" class="lead"><?php echo $row["message"]; ?></p>
</div>
<script>

$(window).on('load', function() {
    $("#title").hide().delay(500).fadeIn(1500);
    $("#message").hide().delay(1000).fadeIn(1500);
});

</script>