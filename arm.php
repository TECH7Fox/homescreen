<?php include "templates/header.php";

$_ENV["alarm"]["armed"] = 1;
updateDotEnv($_ENV, ".env");

if ($_ENV["discord"]["discord_sendby_arm"] == 1) {
    shell_exec('python /var/www/html/scripts/discord.py "Alarm activated!"');
}

?>
    <main class="container">
        <div class="jumbotron" style="margin-top: 25vh;">
            <h1>Arming alarm <i id="dots">. . . </i></h1>
            <div class="progress">
                <div id="progress" class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <script>

            UpdateProgressBar("alarm.php");
            Dots();
        
            setInterval(function() {
                UpdateProgressBar("alarm.php");
            }, 100);
        
            setInterval(function() {
                Dots();
            }, 750);
        
            </script>
        </div>
    </main>
</body>
</html>