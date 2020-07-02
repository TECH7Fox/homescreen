<?php include "templates/header.php"; ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <main class="container">
        <div class="row h-100 m-0">
            <div class="col card mr-0">
                <h3 class="card-header"><i class="fas fa-comment-dots"></i> Messages<button class="btn btn-primary btn-lg float-right"><i class="fas fa-plus"></i> Add new message</button></h3>
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