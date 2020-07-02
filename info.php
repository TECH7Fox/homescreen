<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main>
        <div class="row h-100 m-0">
            <div class="col card mr-0">
                <h4 class="card-header"><i class="fas fa-network-wired"></i> Devices</h4>
                <div class="scrollable-table">
                    <table class="table text-center m-0">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">IP</th>
                            </tr>
                        </thead>
                        <tbody id="serverStatus"></tbody>
                    </table>
                </div>
            </div>

            <div class="col card mr-0">
                <h4 class="card-header"><i class="fas fa-scroll"></i> Scripts</h4>
                <div class="scrollable-table">
                    <table class="table text-center m-0">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">name</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody id="scripts">
                            <?php
    
                            include "../connectdb.php";
    
                            $sql = "SELECT name, status FROM scripts";
                            $sth = $db->prepare($sql); 
                            $sth->execute();
    
                            while ($row = $sth->fetch()) {
                                echo '<tr class="table-' . (($row["status"] == 1)?"success":"danger") . '">'; 
                                echo '<td>' . $row["name"] . '</td>';
                                echo '<td><input type="checkbox" ' . (($row["status"] == 1)?"checked":"") . ' data-onstyle="success" data-offstyle="danger" data-style="border" id="' . $row["name"] . '" data-toggle="toggle"/>';
                                echo '</tr>';
                            }
                        
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col card">
                <h4 class="card-header"><i class="fas fa-clipboard-list"></i> Notifications</h4>
                <div class="scrollable-table">
                    <table class="table table-responsive-sm text-center m-0">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Type</th>
                                <th scope="col">Notification</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody id="notifications"></tbody>
                    </table>
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
        url: 'api/updateScript.php?switch=' + this.id + '&status=' + $(this).prop("checked")
    });
    if ($(this).prop("checked")) {
        $(this).closest("tr").removeClass("table-danger").addClass("table-success");
    } else {
        $(this).closest("tr").removeClass("table-success").addClass("table-danger");
    }
});

</script>
</html>