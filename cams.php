<?php include "templates/header.php"; ?>
        <main class="container">
            <div class="row row-50"> 
                <?php

                $kartUrl = "assets/kartTrack.png";

                for ($i = 1; $i <= 4; $i++) { 
                    if ($i == 3) { echo '</div><div class="row row-50">';} ?>

                        <div class="col card mlr-1">
                            <h5 class="card-header"><?php echo empty($_ENV["cams"]["camera_$i"])?"None":$_ENV["cams"]["camera_$i"] ?></h5>
                            <?php
                            
                            $sql = "SELECT url FROM servers WHERE type = 'camera' AND name = '" . $_ENV["cams"]["camera_$i"] . "'";
                            $sth = $db->prepare($sql); 
                            $sth->execute();
                            $row = $sth->fetch();
                            
                            ?>
                            <<?php echo empty($_ENV["cams"]["camera_$i"])?"img":"iframe"; ?> class="card-img-bottom camera" src="<?php echo empty($row["url"])?$kartUrl:$row["url"]; ?>"><?php echo empty($_ENV["cams"]["camera_$i"])?"":"</iframe>"; ?>
                        </div>
                    
                <?php } ?>
            </div>
        </main>
    <footer>
    </footer>
</body>
</html>