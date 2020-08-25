<?php include "templates/header.php"; ?>
        <main class="container">
                <div class="card">
                    <h3 class="card-header"><i class="fas fa-table"></i> Calender</h3>
                    <div class="card-body h-100">
                        <div class="h-100 d-flex flex-wrap overflow-auto">
                            <div id="calender" class="ml-auto mr-auto mt-auto mb-auto">
                                <h2 class="position-fixed ml-n5 mt-n5">Loading <i id="dots">. . . </i></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <a class="btn btn-lg btn-primary" href="table.php?week=previous">Previous week</a>
                        <a class="btn btn-lg btn-primary" href="table.php">Current week</a>
                        <a class="btn btn-lg btn-primary" href="table.php?week=next">Next week</a>
                    </div>
                </div>
            </div>
        </main>
    <footer>
    </footer>
</body>
<script>

<?php 

?>

Dots()

setInterval(function() {
    Dots();
}, 750);

$.ajax({   
    url: 'scripts/getCalender.php<?php echo week(); ?>'
}).done(function( table ) {
    $('#calender').html(table);
});

</script>
</html>