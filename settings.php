<?php include "templates/header.php"; ?>
    <main class="container">
        <div class="modal fade" id="createSwitch" tabindex="-1" role="dialog" aria-labelledby="createNewSwitch" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form class="modal-content" method="POST" action="scripts/createSwitch.php">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new switch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="NameInput">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" id="nameInput" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="backgroundInput">Type</label>
                            <select class="selectpicker form-control form-control-lg" data-style="btn-primary" name="type" id="typeInput">
                                <option value="light">Light</option>
                                <option value="server">Server</option> 
                                <option value="camera">Camera</option>
                                <option value="tv">Tv</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="on_codeInput">On code</label>
                            <input type="text" class="form-control form-control-lg" name="on_code" id="on_codeInput" placeholder="1234" required>
                        </div>
                        <div class="form-group">
                            <label for="off_codeInput">Off code</label>
                            <input type="text" class="form-control form-control-lg" name="off_code" id="off_codeInput" placeholder="1234" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-lg btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="createMessage" tabindex="-1" role="dialog" aria-labelledby="createNewMessage" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form class="modal-content" method="POST" action="scripts/createMessage.php">
                    <div class="modal-header">
                        <h5 class="modal-title">Create new message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titleInput">Title</label>
                            <input type="text" class="form-control form-control-lg" name="title" id="titleInput" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="messageInput">Message</label>
                            <input type="text" class="form-control form-control-lg" name="message" id="messageInput" placeholder="Message">
                        </div>
                        <div class="form-group">
                            <label for="datepicker">Date</label>
                            <input type="text"class="form-control form-control-lg" id="datepicker" name="date" placeholder="Date" required>
                        </div>
                        <script>

                        $('#datepicker').datepicker({
                            format: "dd/mm/yyyy",
                            maxViewMode: 0,
                            todayHighlight: true
                        });

                        </script>
                        <div class="form-group">
                            <label for="backgroundInput">Background</label>
                            <select class="selectpicker form-control form-control-lg" data-style="btn-primary" name="background" id="backgroundInput">
                                <option selected value="">None</option>
                                <?php

                                foreach(array_diff(scandir('assets/backgrounds'), array('.', '..')) as $val)  {
                                    echo '<option value="' . $val . '">' . $val . '</option>';
                                }
                                // FIX BUG CHECKBOX ASKS updateScript
                                ?>
                            </select>
                        </div>
                        <div class="custom-control custom-checkbox checkbox-xl">
                            <input class="custom-control-input" type="checkbox" id="permanentInput" name="permanent">
                            <label class="custom-control-label" for="permanentInput">Permanent message?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-lg btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <form method="POST" action="scripts/saveSettings.php" class="card">
            <div class="card-header"><h3><i class="fas fa-cogs"></i> Settings</h3>
                <ul class="nav nav-tabs card-header-tabs" id="settings-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#switches" role="tab" aria-controls="switches" aria-selected="true"><i class="fas fa-toggle-on"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#messages" role="tab" aria-controls="messages" aria-selected="false"><i class="fas fa-comment-dots"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#loading_screen" role="tab" aria-controls="loading_screen" aria-selected="false"><i class="fas fa-spinner"></i> Loading Screen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cams" role="tab" aria-controls="cameras" aria-selected="false"><i class="fas fa-camera"></i> Camera's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#discord" role="tab" aria-controls="discord" aria-selected="false"><i class="fab fa-discord"></i> Discord</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content h-100">
                    <div class="tab-pane active h-100" id="switches" role="tabpanel">
                        <div class="form-row h-100">
                            <div class="col-3 h-100">
                                <h3 class="card-title"><i class="fas fa-toggle-on"></i> Switches</h3>
                                <small class="form-text text-muted">
                                    <b>Manual: </b>Toggle on switches page.<br>
                                    <b>Auto: </b>Automatically turn on on night.<br>
                                    <b>Auto Alarm: </b>Auto and alarm combined.<br>
                                </small>
                                <button type="button" data-toggle="modal" data-target="#createSwitch" class="btn btn-success btn-lg mt-3"><i class="fas fa-plus"></i> Add new switch</button>
                            </div>
                            <div class="col h-100 d-flex flex-wrap overflow-auto">
                            
                                <?php 

                                $sql = "SELECT * FROM switches";
                                $sth = $db->prepare($sql); 
                                $sth->execute();

                                while ($row = $sth->fetch()) {
                                        echo '
                                            <div class="form-group mr-auto ml-auto">
                                            <h5><i class="' . icon($row["type"]) . '"></i> ' . $row["name"] . " " . $row["type"] . '</h5>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "manual")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "manual")?' checked="" ':"") . 'value="manual" autocomplete="off"> Manual
                                            </label>
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "auto")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "auto")?' checked="" ':"") . 'value="auto" autocomplete="off"> Auto
                                            </label>
                                            <label class="btn btn-lg btn-primary' . (($row["value"] == "auto_alarm")?' active':"") . '">
                                            <input type="radio" name="' . $row["name"] . '"' . (($row["value"] == "auto_alarm")?' checked="" ':"") . 'value="auto_alarm" autocomplete="off"> Auto Alarm
                                            </label>
                                            
                                            </div><a class="btn btn-lg btn-danger ml-2" href="scripts/deleteSwitch.php?id=' . $row["id"] . '">Delete</a></div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane h-100" id="messages" role="tabpanel">
                        <div class="h-100 d-flex flex-wrap overflow-auto">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Title</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Background</th>
                                        <th scope="col">Permanent</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="messages">
                                <?php

                                $sql = "SELECT * FROM messages WHERE permanent = 1 OR date >= CURDATE() ORDER BY permanent, date DESC";
                                $sth = $db->prepare($sql); 
                                $sth->execute();

                                while ($row = $sth->fetch()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["title"] . '</td>';
                                    echo '<td>' . $row["message"] . '</td>';
                                    echo '<td>' . $row["date"] . '</td>';
                                    echo '<td>' . $row["background"] . '</td>';
                                    echo '<td><i class="' . (($row["permanent"] == 1)?'fas fa-check-circle':'fas fa-times-circle') . '"></i></td>';
                                    echo '<td><a class="btn btn-lg btn-danger" href="scripts/deleteMessage.php?id=' . $row["id"] . '">Delete</a></td>';
                                    echo '</tr>';
                                }
                            
                                ?>
                                </tbody>
                            </table>
                            <button type="button" data-toggle="modal" data-target="#createMessage" class="btn btn-success btn-block btn-lg"><i class="fas fa-plus"></i> Add new message</button>
                        </div>
                    </div>
                    <div class="tab-pane h-100" id="loading_screen" role="tabpanel">  
                        <div class="form-row h-100">
                            <div class="col-5 h-100">
                                <h3 class="card-title"><i class="fas fa-spinner"></i> Loading Screen</h3>
                                <small class="form-text text-muted">Choose which loading animation to show when loading a page.</small>
                            </div>
                            <div class="col h-100">
                                <div class="form-group mr-auto ml-auto">
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
                                        <div class="form-group mr-auto ml-auto">
                                            <h5>Camera <?php echo $i; ?></h5>
                                            <select class="selectpicker" data-style="btn-primary" name="camera_<?php echo $i; ?>">
                                                <?php

                                                $sql = "SELECT name FROM servers WHERE type = 'camera'";
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
                                <div class="form-group mr-auto ml-auto">
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
                                <div class="form-group mr-auto ml-auto">
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
                                <div class="form-group mr-auto ml-auto">
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