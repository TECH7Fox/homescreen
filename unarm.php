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
        </div>
    </main>
    <script>

    setTimeout(function() {
        window.location.href = "index.php";
    }, 5000);

    </script>
</body>
</html>