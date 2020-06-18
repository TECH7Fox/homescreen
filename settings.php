<?php include "templates/header.php"; ?>
    <main class="container">
        <form method="POST" action="saveSettings.php" class="card">
            <div class="card-header"><h3>Settings</h3>
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
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content h-100">
                    <div class="tab-pane active h-100" id="lights" role="tabpanel">
                        <div class="form-row h-100">
                            <div class="col-3 h-100">
                                <h3 class="card-title"><i class="fas fa-toggle-on"></i> Switches</h3>
                                <br>
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
                                <br>
                                <small class="form-text text-muted">Choose which loading animation to show when loading a page.</small>
                            </div>
                            <div class="col h-100">
                                <div class="form-group mr-auto">
                                <h5>Animation</h5>
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
                        </div>
                    </div>
                    <div class="tab-pane" id="cams" role="tabpanel">
                        <div class="form-row h-100">
                            <div class=" col-3 h-100">
                                <h3 class="card-title"><i class="fas fa-camera"></i> Camera's</h3>
                                <br>
                                <small class="form-text text-muted">Select which camera's to show.</small>
                            </div>
                            <div class="col h-100">
                                <div class="col d-flex flex-wrap overflow-auto">
                                    <?php 
                                        for ($i = 1; $i <= 4; $i++) { ?>
                                            <div class="form-group mr-auto">
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