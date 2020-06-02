<?php include "templates/header.php";
    include "connectdb.php";
    
?>
    <main class="container" style="margin-top: 1%;">
        <div class="card">
            <h4 class="card-header">Settings</h4>
            <form method="GET" action="saveSettings.php" class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h5>Loading screen</h5>
                            <select class="selectpicker" data-style="btn-primary" name="loading_screen">
                                <?php

                                $sql = "SELECT s.value, l.name FROM settings s, loading_screens l WHERE s.name = 'loading_screen'";
                                $sth = $db->prepare($sql); 
                                $sth->execute();
                                while($row = $sth->fetch()) {
                                    echo '<option' . (($row["name"] == $row["value"])?' selected':"") . ' value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <?php 

                            for ($i = 1; $i <= 4; $i++) { ?>
                                <h5>Camera <?php echo $i; ?></h5>
                            <select class="selectpicker" data-style="btn-primary" name="cam_<?php echo $i; ?>">
                                <?php
    
                                $sql = "SELECT settings.value, servers.name FROM settings, servers WHERE settings.name = 'cam_$i' AND servers.type LIKE '%cam%' ORDER BY settings.name";
                                $sth = $db->prepare($sql); 
                                $sth->execute();

                                while($row = $sth->fetch()) {  
                                         
                                    echo '<option' . (($row["name"] == $row["value"])?' selected':"") . ' value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                    if (empty($row["value"])) {
                                        echo '<option selected value="">None</option>';
                                    } else {
                                        echo '<option value="">None</option>';
                                    }
                                }   
                                
                                ?>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM settings WHERE name = 'vacation_mode'";
                    $sth = $db->prepare($sql); 
                    $sth->execute();
                    $row = $sth->fetch();
                    ?>
                    <div class="col">
                    <div class="form-group">
                        <h5>Vacation mode</h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-lg btn-primary <?php echo (($row["value"] == "off")?' active':""); ?>">
                                <input type="radio" name="vacation_mode" <?php echo (($row["value"] == "off")?' checked="" ':""); ?> value="off" autocomplete="off"> Off
                            </label>
                            <label class="btn btn-lg btn-primary <?php echo (($row["value"] == "on")?' active':""); ?>">
                                <input type="radio" name="vacation_mode" <?php echo (($row["value"] == "on")?' checked="" ':""); ?> value="on" autocomplete="off"> On
                            </label>
                        </div>
                        <small class="form-text text-muted">When vacation mode is on, some lights will stay active.</small>
                    </div>
                    <?php 

                    $sql = "SELECT * FROM settings";
                    $sth = $db->prepare($sql); 
                    $sth->execute();

                    while ($row = $sth->fetch()) {
                        if (strpos($row["name"], 'light') !== false) {
                            echo '
                                <div class="form-group">
                                    <h5>' . $row["name"] . '</h5>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-lg btn-primary' . (($row["value"] == "off")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "off")?' checked="" ':"") . 'value="off" autocomplete="off"> Off
                                        </label>
                                        <label class="btn btn-lg btn-primary' . (($row["value"] == "on")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "on")?' checked="" ':"") . 'value="on" autocomplete="off"> On
                                        </label>
                                        <label class="btn btn-lg btn-primary' . (($row["value"] == "auto")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "auto")?' checked="" ':"") . 'value="auto" autocomplete="off"> Auto
                                        </label>
                                        <label class="btn btn-lg btn-primary' . (($row["value"] == "auto_alarm")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "auto")?' checked="" ':"") . 'value="auto_alarm" autocomplete="off"> Auto Alarm
                                        </label>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    ?>
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-lg btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>