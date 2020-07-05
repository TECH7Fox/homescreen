<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main class="container">
        <div class="row h-100 m-0">
            <div class="col card mr-0">
                <h3 class="card-header"><i class="fas fa-comment-dots"></i> Messages<button type="button" data-toggle="modal" data-target="#createMessage" class="btn btn-primary btn-lg float-right"><i class="fas fa-plus"></i> Add new message</button></h3>
                <div class="modal fade" id="createMessage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <form class="modal-content" method="POST" action="scripts/saveMessage.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="titleInput">Title</label>
                                    <input type="text" class="form-control form-control-lg" name="title" id="titleInput" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="messageInput">Message</label>
                                    <input type="text" class="form-control form-control-lg" name="message" id="messageInput" placeholder="Message">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="permanent" name="permanent">
                                    <label class="form-check-label" for="permanent">
                                      Permanent message?
                                      <?php print_r(scandir('assets/loadingScreens')); 
                                        foreach(scandir('assets/loadingScreens') as $val)  {
                                            $arr = explode(".", $val, 2);
                                            echo $arr[0];
                                        } ?>
                                    </label>
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
                                <th scope="col">Timestamp</th>
                                <th scope="col">Permanent</th>
                            </tr>
                        </thead>
                        <tbody id="messages"></tbody>
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