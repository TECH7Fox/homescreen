<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main class="container">
        <div class="card">
            <div class="card-header">
                <h3>Switches</h3>
            </div>
            <div class="card-body h-100">
                <div class="h-100 d-flex flex-wrap overflow-auto">
                    <?php

                    $sql = "SELECT location, type, status, value FROM switches";
                    $sth = $db->prepare($sql);
                    $sth->execute();

                    while ($row = $sth->fetch()) { ?>
                        <div class="form-group mr-5 ml-5">
                            <h6><?php echo (($row["type"] == "light")?'<i class="fas fa-lightbulb"></i> ':"") . $row["location"] . " " . $row["type"]; ?></h6>
                            <input type="checkbox" id="<?php echo $row["location"] . "_" . $row["type"]; ?>" <?php echo $row["status"] == 1?"checked ":""; echo $row["value"] !== "manual"?"disabled checked ":'data-onstyle="success"'; ?> data-toggle="toggle" data-on="<?php echo $row["value"] !== "manual"?"Automatic":""; ?>" data-offstyle="danger" data-height="80" data-width="110"/>
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
        url: 'api/switch.php?switch=' + this.id + '&status=' + $(this).prop("checked")
    });
}); 

</script>
</html>