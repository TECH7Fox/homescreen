    <?php include "templates/header.php";
    
    if (hash('sha256', $_POST["keycode"]) == $_ENV["alarm"]["key"]) {
        echo "WAd";
        $_ENV["alarm"]["armed"] = 0;
        updateDotEnv($_ENV);
    
        if ($_ENV["discord"]["discord_sendby_unarm"] == 1) {
            shell_exec('python /var/www/html/scripts/discord.py "Alarm deactivated!"');
        }
    } else {
        echo $sefjsef;
        header("Location: alarm.php");
        die();
    }
    
    ?>
    <main class="container">
        <div class="jumbotron" style="margin-top: 15vh;">
            <h1 class="text-success text-center"><i class="fas fa-unlock"></i><br>Access granted</h1>
            <div class="progress" style="margin-top: 5vh">
                <div id="progress" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </main>
    <script>

    UpdateProgressBar("index.php");

    setInterval(function() {
        UpdateProgressBar("index.php");
    }, 25);

    </script>
</body>
</html>