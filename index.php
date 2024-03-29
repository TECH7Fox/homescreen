<?php include "templates/header.php"; ?>
    <main class="container">
        <div class="card">
            <h3 class="card-header"><i class="fas fa-home"></i> Main <div class="float-right"><?php echo date("l j F Y"); ?></div></h3>
            <div id="messageContainer" class="card-body overflow-hidden" style="height: 85%;">
                <?php

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
                    $title = "Welcome home!";
                    $message = "No special messages today.";
                } else {
                    $title = $row["title"];
                    $message = $row["message"];
                }

                ?>

                <div class="h-100" style='background: url("<?php if (isset($row["background"])) { echo "assets/backgrounds/" . $row["background"]; } ?>"); background-position: 75% center; background-repeat: no-repeat; background-size: contain;'>
                    <h2 id="title" class="display-4"></h2>
                    <p id="message" class="lead"></p>
                </div>
                <script>

                // make sync function and move function to functions.js

                function showText(target, message, index, interval) {   
                    if (index < message.length) {
                        $(target).append(message[index++]);
                        if (message[index] !== " " && message[index] !== undefined) {
                            const origAudio = document.getElementById("letterAudio");
                            const newAudio = origAudio.cloneNode()
                            newAudio.play()
                        }
                        setTimeout(showText, interval, target, message, index, interval);
                    } else {
                        if (target !== "#message") {
                            showText("#message", "<?php echo $message; ?>", 0, 75); 
                        }
                    }
                }

                $(window).on('load', function() {
                    showText("#title", "<?php echo $title; ?>", 0, 150);
                });
            
                </script>
            </div>
            <div class="card-footer" style="height: 25%;">
                <a role="button" href="arm.php" style="height: 100%; display: flex; align-items: center;" class="btn btn-block btn-danger">
                    <i class="fas fa-lock" style="font-size: 3em; margin-left: auto; margin-right: auto;"></i>
                </a>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>