<?php

function icon($icon) {
    switch($icon) {
        case "light": return "fas fa-lightbulb";
        case "server": return "fas fa-server";
        case "camera": return "fas fa-video";
        case "tv": return "fas fa-tv";
        default: return "fas fa-plug";
    }
}

function week() {
    if (isset($_GET["week"])) {
        switch($_GET["week"]) {
            case "previous": return "?week=previous";
            case "next"    : return "?week=next";
            default: continue;
        }
    }
}

?>