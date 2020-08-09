<?php include "templates/header.php"; ?>
    <main class="container">
        <form method="POST" action="scripts/saveSettings.php" class="card">
            <div class="card-header"><h3><i class="fas fa-cogs"></i> Settings</h3>
                <ul class="nav nav-tabs card-header-tabs" id="settings-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#lights" role="tab" aria-controls="description" aria-selected="true"><i class="fas fa-toggle-on"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#loading_screen" role="tab" aria-controls="history" aria-selected="false"><i class="fas fa-spinner"></i> Loading Screen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cams" role="tab" aria-controls="deals" aria-selected="false"><i class="fas fa-camera"></i> Camera's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#discord" role="tab" aria-controls="deals" aria-selected="false"><i class="fab fa-discord"></i> Discord</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content h-100">
                    <div class="tab-pane active h-100" id="lights" role="tabpanel">
                        <div class="form-row h-100">
                            <div class="col-3 h-100">
                                <h3 class="card-title"><i class="fas fa-toggle-on"></i> Switches</h3>
                                <small class="form-text text-muted">
                                    <b>Manual: </b>Toggle on switches page.<br>
                                    <b>Auto: </b>Automatically turn on on night.<br>
                                    <b>Auto Alarm: </b>Auto and alarm combined.<br>
                                </small>
                            </div>
                            <div class="col h-100 d-flex flex-wrap overflow-auto">
                                <?php 

                                $sql = "SELECT * FROM switches";
                                $sth = $db->prepare($sql); 
                                $sth->execute();

                                while ($row = $sth->fetch()) {
                                        echo '
                                            <div class="form-group mr-auto">
                                            <h5>' . (($row["type"] == "light")?'<i class="fas fa-lightbulb"></i> ':"") . $row["location"] . " " . $row["type"] . '</h5>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "manual")?' active':"") . '">
                                            <input type="radio" name="' . $row["location"] . '"' . (($row["value"] == "manual")?' checked="" ':"") . 'value="manual" autocomplete="off"> Manual
                                            </label>
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "auto")?' active':"") . '">
                                            <input type="radio" name="' . $row["location"] . '"' . (($row["value"] == "auto")?' checked="" ':"") . 'value="auto" autocomplete="off"> Auto
                                            </label>
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "auto_alarm")?' active':"") . '">
                                            <input type="radio" name="' . $row["location"] . '"' . (($row["value"] == "auto_alarm")?' checked="" ':"") . 'value="auto_alarm" autocomplete="off"> Auto Alarm
                                            </label></div></div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane h-100" id="loading_screen" role="tabpanel">  
                        <div class="form-row h-100">
                            <div class="col-4 h-100">
                                <h3 class="card-title"><i class="fas fa-spinner"></i> Loading Screen</h3>
                                <small class="form-text text-muted">Choose which loading animation to show when loading a page.</small>
                            </div>
                            <div class="col h-100">
                                <div class="form-group mr-auto">
                                <h5>Animation</h5>
                                <select class="selectpicker" data-style="btn-primary" name="loading_screen">
                                    <?php
 
                                    foreach(array_diff(scandir('assets/loadingScreens'), array('.', '..')) as $val)  {
                                        $arr = explode(".", $val, 2);
                                        echo '<option' . (($arr[0] == $_ENV["cosmetics"]["loading_screen"])?' selected':"") . ' value="' . $arr[0] . '">' . $arr[0] . '</option>';
                                        echo $arr[0] . $_ENV["cosmetics"]["loading_screen"];
                                    }

                                    ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="cams" role="tabpanel">
                        <div class="form-row h-100">
                            <div class=" col-3 h-100">
                                <h3 class="card-title"><i class="fas fa-camera"></i> Camera's</h3>
                                <small class="form-text text-muted">Select which camera's to show.</small>
                            </div>
                            <div class="col h-100 d-flex flex-wrap overflow-auto">
                                <?php 
                                    for ($i = 1; $i <= 4; $i++) { ?>
                                        <div class="form-group mr-auto">
                                            <h5>Camera <?php echo $i; ?></h5>
                                            <select class="selectpicker" data-style="btn-primary" name="camera_<?php echo $i; ?>">
                                                <?php

                                                $sql = "SELECT name FROM servers WHERE type = 'cam'";
                                                $sth = $db->prepare($sql); 
                                                $sth->execute();

                                                while($row = $sth->fetch()) {  
                                                    echo '<option' . (($row["name"] == $_ENV["cams"]["camera_$i"])?' selected':"") . ' value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                                    if (empty($_ENV["cams"]["camera_$i"])) { $none = true; }
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
                        </div>
                    </div>
                    <div class="tab-pane h-100" id="discord" role="tabpanel">  
                        <div class="form-row h-100">
                            <div class="col-4 h-100">
                                <h3 class="card-title"><i class="fab fa-discord"></i> Discord</h3>
                                <small class="form-text text-muted">Select when to send a message to the discord bot.</small>
                            </div>
                            <div class="col h-100 d-flex flex-wrap overflow-auto">
                                <div class="form-group mr-auto">
                                    <h5>Arm</h5>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_arm"] == 1)?' active':""; ?>">
                                            <input type="radio" name="sendby_arm" <?php echo ($_ENV["discord"]["sendby_arm"] == 1)?' checked="" ':""; ?> value="1" autocomplete="off"> On
                                        </label>
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_arm"] == 0)?' active':""; ?>">
                                        <input type="radio" name="sendby_arm" <?php echo ($_ENV["discord"]["sendby_arm"] == 0)?' checked="" ':""; ?> value="0" autocomplete="off"> Off
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mr-auto">
                                    <h5>Unarm</h5>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_unarm"] == 1)?' active':""; ?>">
                                            <input type="radio" name="sendby_unarm" <?php echo ($_ENV["discord"]["sendby_unarm"] == 1)?' checked="" ':""; ?> value="1" autocomplete="off"> On
                                        </label>
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_unarm"] == 0)?' active':""; ?>">
                                        <input type="radio" name="sendby_unarm" <?php echo ($_ENV["discord"]["sendby_unarm"] == 0)?' checked="" ':""; ?> value="0" autocomplete="off"> Off
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mr-auto">
                                    <h5>Tripped</h5>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_tripped"] == 1)?' active':""; ?>">
                                            <input type="radio" name="sendby_tripped" <?php echo ($_ENV["discord"]["sendby_tripped"] == 1)?' checked="" ':""; ?> value="1" autocomplete="off"> On
                                        </label>
                                        <label class="btn btn-lg btn-primary<?php echo ($_ENV["discord"]["sendby_tripped"] == 0)?' active':""; ?>">
                                        <input type="radio" name="sendby_tripped" <?php echo ($_ENV["discord"]["sendby_tripped"] == 0)?' checked="" ':""; ?> value="0" autocomplete="off"> Off
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-lg btn-primary"><i class="fas fa-save"></i> Save Settings</button>
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