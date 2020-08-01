function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}

function playAudio(type) {
    const origAudio = document.getElementById(type);
    const newAudio = origAudio.cloneNode()
    newAudio.play()
}

function UpdateProgressBar(location) {
    progress = parseInt($('#progress').attr('aria-valuenow')) + 1;
    if (progress >= 100) { setTimeout(function(){ window.location.href = location; }, 1000); }
    $('#progress').attr('aria-valuenow', progress).css('width', progress+'%');
}

function Dots() {
    temp = $('#dots').text();
    dots = (temp.match(/. /g) || []).length;

    switch(dots) {
        case 1: $('#dots').text(". . ");   break;
        case 2: $('#dots').text(". . . "); break;
        case 3: $('#dots').text(". ");     break;
        default: $('#dots').text(". ");
    }
}

function ClickedKey(key) {
    if (key == "backspace") {
        $("#keycode-input").val("");
    } else {
        $("#keycode-input").val($('#keycode-input').val() + key);
    }   
}

function showText(target, message, index, interval) {   
    if (index < message.length) {
        $(target).append(message[index++]);
        if (message[index] !== " " && message[index] !== undefined) {
            const origAudio = document.getElementById("letterAudio");
            const newAudio = origAudio.cloneNode()
            newAudio.play()
        }
        setTimeout(showText, interval, target, message, index, interval);
    } else {
        if (target !== "#message") {
            showText("#message", "<?php echo $message; ?>", 0, 75); 
        }
    }
}