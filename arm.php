<?php 

include "scripts/connectdb.php";

$sql = "UPDATE settings SET value='on' WHERE name='alarm'";
$sth = $db->prepare($sql); 
$sth->execute();

$sql = "SELECT value FROM settings WHERE name = 'discord_arm'";
$sth = $db->prepare($sql); 
$sth->execute();
$row = $sth->fetch();

if ($row["value"] == "on") {
    shell_exec('python /var/www/html/scripts/discord.py "Alarm activated!"');
}

include "templates/header.php";

?>
    <main class="container">
        <div class="jumbotron" style="margin-top: 25vh;">
            <h1>Arming alarm <i id="dots">. . . </i></h1>
            <div class="progress">
                <div id="armingProgress" class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <script>

            function UpdateProgressBar() {
                progress = parseInt($('#armingProgress').attr('aria-valuenow')) + 1;
                if (progress >= 100) { setTimeout(function(){ window.location.href = "alarm.php"; }, 1000); }
                $('#armingProgress').attr('aria-valuenow', progress).css('width', progress+'%');
            }
        
            function Dots() {
                temp = $('#dots').text();
                dots = (temp.match(/. /g) || []).length;
            
                switch(dots) {
                    case 1: $('#dots').text(". . ");   break;
                    case 2: $('#dots').text(". . . "); break;
                    case 3: $('#dots').text(". ");     break;
                    default: $('#dots').text(". ");
                }
            }
        
            UpdateProgressBar();
            Dots();
        
            setInterval(function() {
                UpdateProgressBar();
                
            }, 100);
        
            setInterval(function() {
                Dots();
            }, 750);
        
            </script>
        </div>
    </main>
</body>
</html>