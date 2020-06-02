<?php

include "../connectdb.php";

$sql = "SELECT * FROM messages WHERE date = " . "'" . date("Y-m-d") . "'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

?>

<h4 class="card-header">Main</h4>
<div style='padding: 25px; height: 100%;background: url("<?php echo $row["background"]; ?>"); background-position: 90% 100%; background-repeat: no-repeat; background-size: 50%;'>
    <h1 class="display-4"><?php echo $row["title"]; ?></h1>
    <div id="main-text">
        <p class="lead"><?php echo $row["message"]; ?></p>
        <hr class="my-4">
        <p><?php echo $row["details"]; ?></p>
    </div>
</div>
<div class="card-footer" style="height: 25%;">
    <a role="button" href="alarm.php" style="height: 100%; text-align: center;" class="btn btn-block btn-lg btn-danger">
        <i style="font-size: 400%; transform: translateY(-50%); margin-top: 8%;" class="fas fa-lock"></i>
    </a>
</div>