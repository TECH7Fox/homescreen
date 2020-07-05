<style>

body {
    height: 100vh;
}
img {
    object-fit: contain;
}
video {
    object-fit: cover;
}
.alert {
    margin: 0 !important;
}


.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(
    <?php 
    
    include "connectdb.php"; 
    $sql = "SELECT value FROM settings WHERE name = 'loading_screen'";
    $sth = $db->prepare($sql); 
    $sth->execute(); 
    $row = $sth->fetch();
    echo "assets/loadingScreens/" . $row["value"] . ".gif"; 
    
    ?>) darkgray;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
main {
    height: 86vh;
    overflow: hidden;
    margin-bottom: 2vh;
}

.filter-option-inner-inner {
    font-size: 1.171875rem !important;
    padding: 0.10rem 1rem !important;
}
.jumbotron {
    margin: 0;
}
table {
    overflow-y: scroll;
    margin: 0;
}

.scrollable-table {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 100%;
    width: 100%;
}

.weather {
    width: 9vh;
    height: 9vh;
    filter: invert(72%) sepia(0%);
    -webkit-filter: invert(72%) sepia(0%));
}

thead th {
    position: sticky;
    top: 0;
    border-top: 0px solid black !important;
}

::-webkit-scrollbar {
    width: 7.5px;
    height: 7.5px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: #444444;
}

::-webkit-scrollbar-corner {
    background: rgba(0,0,0,0);
}

.progress {
    height: 50px;
}
.card {
    height: 100%;
    padding: 0 !important;
    margin-left: 2vh;
    margin-right: 2vh;
}
.col {
    padding: 0 !important;
}
.row-50 {
    height: 42vh;
    margin-bottom: 2vh;
}
.camera {
    border: none; 
    height: 37vh;
}
.col-np {
    padding: 0 !important;
}
.mlr-1 {
    margin-right: 1vh; 
    margin-left: 1vh;
}
#message {
    margin-left: 0;
    margin-right: 0;
}
header {
    margin-bottom: 2vh;
}

</style>