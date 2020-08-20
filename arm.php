<?php include "templates/header.php";

$_ENV["alarm"]["armed"] = 1;
updateDotEnv($_ENV);

shell_exec("gpio mode 21 out");
shell_exec("gpio write 21 0");

if ($_ENV["discord"]["sendby_arm"] == 1) {
    shell_exec('python3 /var/www/html/scripts/discord.py "Alarm activated!"');
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