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
    $sql = "SELECT l.url FROM loading_screens l, settings s WHERE s.value = l.name";
    $sth = $db->prepare($sql); 
    $sth->execute(); 
    $row = $sth->fetch();
    echo $row["url"]; 
    
    ?>) darkgray;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
    height: 20%;
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

::-webkit-scrollbar { display: none; }

.progress {
    height: 50px;
}
.card {
    padding: 0 !important;
    margin-left: 2vh;
    margin-right: 2vh;
    margin-bottom: 2vh;
}
.col {
    padding: 0 !important;
}
.row-50 {
    height: 44vh;
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
    margin-bottom: 2vh;
}
#message {
    margin-left: 0;
    margin-right: 0;
}
header {
    margin-bottom: 2vh;
}

</style>