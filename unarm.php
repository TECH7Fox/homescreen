<?php 

include "connectdb.php";

$sql = "SELECT value FROM settings WHERE name = 'keycode'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if (hash('sha256', $_POST["keycode"]) == $row["value"]) {
    $sql = "UPDATE settings SET value='off' WHERE name='alarm'";
    $sth = $db->prepare($sql); 
    $sth->execute();
} else {
    header("location: arm.php");
}

include "templates/header.php"; ?>
    <main class="container">
        <div class="jumbotron" style="margin-top: 25vh;">
            <h1 class="text-success text-center"><i class="fas fa-unlock"></i><br>Access granted</h1>
            <div class="progress" style="margin-top: 5vh">
                <div id="armingProgress" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </main>
    <script>

    function UpdateProgressBar() {
        progress = parseInt($('#armingProgress').attr('aria-valuenow')) + 1;
        if (progress >= 100) { setTimeout(function(){ window.location.href = "index.php"; }, 1000); }
        $('#armingProgress').attr('aria-valuenow', progress).css('width', progress+'%');
    }

    UpdateProgressBar();

    setInterval(function() {
        UpdateProgressBar();
    }, 50);

    </script>
</body>
</html>