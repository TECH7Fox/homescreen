function GetData() {
    
    $.ajax({   
        url: 'api/alarm.php'
    }).done(function( table ) {
        if (table !== "off") {
            window.location.href = "alarm.php?esd=awd";
        }
    }); 

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

    //$.ajax({                                
    //    url: 'api/message.php'
    //}).done(function( table ) {
    //    $('#messageContainer').html(table);
    //});

    $.ajax({                                
        url: 'api/weather.php'
    }).done(function( table ) {
        $('#weather').html(table);
    });
}

GetData();

setInterval(function() {
    GetData();
}, 30 * 1000);