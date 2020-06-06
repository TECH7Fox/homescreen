<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeScreen Version 3</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
        crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <?php include "scripts/custom-style.php"; ?>
</head>
<body id="body" class="overflow-hidden" style="padding-top: 10vh;">
    <div class="se-pre-con"></div>
    <?php if (!strpos($_SERVER['PHP_SELF'], 'alarm.php') && !strpos($_SERVER['PHP_SELF'], 'arm.php') && !strpos($_SERVER['PHP_SELF'], 'unarm.php')) { ?>
        <script src="js/getData.js"></script>
        <header>
            <nav style="height: 10vh;" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between overflow-hidden">
                <h3><a href="index.php" class="navbar-brand"><i class="fas fa-home"></i> HomeScreen <small class="text-muted">Version 3</small></a></h3>
                <div id="weather" class="navbar-text mt-2">
                </div>
                <!-- <div id="load_error" class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i><strong> Error! </strong>failed to load the page within 5 seconds</div> -->
                <div>
                    <a role="button" href="settings.php" class="btn btn-outline-primary btn-lg ml-3"><i class="fas fa-cogs"></i></a>
                    <a role="button" href="cams.php" class="btn btn-outline-primary btn-lg ml-3"><i class="fas fa-camera"></i></a>
                    <a role="button" href="index.php" class="btn btn-outline-primary btn-lg ml-3"><i class="fas fa-home"></i></a>
                </div>
            </nav>
        </header>
    <?php } ?>
    <script>

    $("#load_error").hide();

    $(window).on('load', function() {
        loaded = true;
        $(".se-pre-con").fadeOut("slow");
        $("#main-text").hide();
        $(".jumbotron").hide().delay(300).fadeIn(1500);
        $("#main-text").delay(1000).fadeIn(1500);
    });

    setInterval(function() {
        if (loaded == false) {
            window.stop();
            $("#load_error").fadeIn();
        }
    }, 5 * 1000);
    </script>