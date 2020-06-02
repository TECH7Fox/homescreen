<?php include "templates/header.php"; ?>
    <main class="container" style="margin-top: 1%;">
        <form method="GET" action="saveSettings.php" class="card" style="height: 85vh;">
            <div class="card-header"><h4>Settings</h4>
                <ul class="nav nav-tabs card-header-tabs" id="settings-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#lights" role="tab" aria-controls="description" aria-selected="true">Lights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#loading_screen" role="tab" aria-controls="history" aria-selected="false">Loading Screen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cams" role="tab" aria-controls="deals" aria-selected="false">Camera's</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="lights" role="tabpanel">
                        <h4 class="card-title">Lights</h4>
                        <br>
                        <div class="form-row">
                            <?php
                            $sql = "SELECT * FROM settings WHERE name = 'vacation_mode'";
                            $sth = $db->prepare($sql); 
                            $sth->execute();
                            $row = $sth->fetch();
                            ?>
                            <div class="col">
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
                            <div class="col">
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
                                        </label></div></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="loading_screen" role="tabpanel">  
                    <h4 class="card-title">Loading Screen</h4>
                    <br>
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
                    <small class="form-text text-muted">Choose which loading icon to show when loading a page.</small>
                </div>

                <div class="tab-pane" id="cams" role="tabpanel">
                    <h4 class="card-title">Camera's</h4>
                    <br>
                    <div class="form-row">
                        <?php 

                        for ($i = 1; $i <= 4; $i++) { ?>
                            <div class="col">
                            <h5>Camera <?php echo $i; ?></h5>
                            <select class="selectpicker" data-style="btn-primary" name="cam_<?php echo $i; ?>">
                            <?php

                            $sql = "SELECT settings.value, servers.name FROM settings, servers WHERE settings.name = 'cam_$i' AND servers.type LIKE '%cam%' ORDER BY settings.name";
                            $sth = $db->prepare($sql); 
                            $sth->execute();

                            while($row = $sth->fetch()) {  
                                        
                                echo '<option' . (($row["name"] == $row["value"])?' selected':"") . ' value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                if (empty($row["value"])) { $none = true; }
                            }   
                            if ($none) {
                                echo '<option selected value="">None</option>';
                            } else {
                                echo '<option value="">None</option>';
                            }
                            ?>
                        </select>
                        </div>
                        <?php } ?>
                    </div>
                    <small class="form-text text-muted">Select which camera's to show.</small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-block btn-lg btn-primary">Save Changes</button>
        </div>
        </form>
    </main>
    <script>
        $('#settings-list a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>
</body>
</html>