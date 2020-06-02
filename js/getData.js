function GetData() {
    $.ajax({                                      
        url: 'api/serverStatus.php'
    }).done(function( table ) {
        $('#serverStatus').html(table);
    });

    $.ajax({                                      
        url: 'api/notifications.php'
    }).done(function( table ) {
        $('#notifications').html(table);
    });

    $.ajax({                                      
        url: 'api/message.php'
    }).done(function( table ) {
        $('#message').html(table);
    });

    $.ajax({                                      
        url: 'api/alarm.php'
    }).done(function( table ) {
        if (table !== "off") {
            window.location.href = "arm.php";
        }
    });
   
}

GetData();

setInterval(function() {
    GetData();
}, 30 * 1000);