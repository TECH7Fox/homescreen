function GetData() {
    $.ajax({                                      
        url: 'api/serverStatus.php'
    }).done(function( table ) {
        document.getElementById('serverStatus').innerHTML = table;
    });

    $.ajax({                                      
        url: 'api/notifications.php'
    }).done(function( table ) {
        document.getElementById('notifications').innerHTML = table;
    });

    $.ajax({                                      
        url: 'api/message.php'
    }).done(function( table ) {
        document.getElementById('message').innerHTML = table;
    });
}

GetData();

setInterval(function() {
    GetData();
}, 30 * 1000);