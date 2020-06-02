    <?php include "templates/header.php"; ?>
        <main class="container">
            <div class="row row-50"> 
                <?php

                $kartUrl = "assets/kartTrack.png";
                $sql = "SELECT servers.url, servers.name FROM settings INNER JOIN servers ON servers.name = settings.value";
                $sth = $db->prepare($sql); 
                $sth->execute();

                for ($i = 1; $i <= 4; $i++) { 
                    $row = $sth->fetch();
                    if ($i == 3) { echo '</div><div class="row row-50">';} ?>

                        <div class="col card mlr-1" style="">
                            <h5 class="card-header"><?php echo empty($row["name"])?"None":$row["name"]; ?></h5>
                            <<?php echo empty($row["name"])?"img":"iframe"; ?> class="card-img-bottom camera" src="<?php echo empty($row["url"])?$kartUrl:$row["url"]; ?>"><?php echo empty($row["name"])?"":"</iframe>"; ?>
                        </div>
                    
                <?php } ?>
            </div>
        </main>
    <footer>
    </footer>
</body>
</html>