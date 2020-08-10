<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main class="container">
        <div class="card">
            <h3 class="card-header"><i class="fas fa-toggle-on"></i> Switches<button type="button" data-toggle="modal" data-target="#createSwitch" class="btn btn-success btn-lg float-right"><i class="fas fa-plus"></i> Add new switch</button></h3>
            <div class="modal fade" id="createSwitch" tabindex="-1" role="dialog" aria-labelledby="createNewMessage" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <form class="modal-content" method="POST" action="scripts/createMessage.php">
                        <div class="modal-header">
                            <h5 class="modal-title">Create new switch</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Work in progress
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body h-100">
                <div class="h-100 d-flex flex-wrap overflow-auto">
                    <?php

                    $sql = "SELECT name, type, status, value FROM switches";
                    $sth = $db->prepare($sql);
                    $sth->execute();

                    while ($row = $sth->fetch()) { ?>
                        <div class="form-group mr-5 ml-5">
                            <h6><?php echo (($row["type"] == "light")?'<i class="fas fa-lightbulb"></i> ':"") . $row["name"] . " " . $row["type"]; ?></h6>
                            <input type="checkbox" id="<?php echo $row["name"] . "_" . $row["type"]; ?>" 
                            <?php echo $row["status"] == 1?"checked ":""; echo $row["value"] !== "manual"?"disabled checked ":'data-onstyle="success"'; ?> 
                            data-toggle="toggle" data-on="<?php echo $row["value"] !== "manual"?"Automatic":""; ?>" 
                            data-offstyle="danger" data-height="80" data-width="110"/>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
<script>

$('input[type=checkbox]').change(function() {
    $.ajax({                                
        url: 'scripts/updateSwitch.php?switch=' + this.id + '&status=' + $(this).prop("checked")
    });
}); 

</script>
</html>