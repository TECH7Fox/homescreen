<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main class="container">
        <div class="row h-100 m-0">
            <div class="col card mr-0">
                <h3 class="card-header"><i class="fas fa-comment-dots"></i> Messages<button type="button" data-toggle="modal" data-target="#createMessage" class="btn btn-primary btn-lg float-right"><i class="fas fa-plus"></i> Add new message</button></h3>
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
                <div class="scrollable-table">
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
                            echo '<td>' . (($row["permanent"] == 1)?'<i class="fas fa-check-circle"></i>':'<i class="fas fa-times-circle"></i>') . '</td>';
                            echo '<td><a class="btn btn-lg btn-danger" href="scripts/deleteMessage.php?id=' . $row["id"] . '">Delete</a></td>';
                            echo '</tr>';
                        }

                        ?>
                        
                        </tbody>
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