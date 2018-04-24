var id = window.location.href.slice(window.location.href.indexOf("=")+1);

$.ajax({
    url: 'league/show_request_button.php',
    type: 'POST',
    data: { "id" : id },
    success: function(data) {
        if (data.trim() == "pass") document.getElementById("req").style = "display: lol";
    },
    error: function() {
        console.log("error occurred with request button");
    }
});



var accept = function(clicked_id) {
    var data = {
        "username" : clicked_id,
        "id" : id    
    };
    $.ajax({
        url: 'league/enter.php',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data.trim() != "pass") alert(data);
            else {
                alert("Successfully added player");
                window.location.reload(true);
            }
        },
        error: function(data) {
            alert("An unexpected error occurred. Check your internet connection.");
        }
    });
}

var request = function(clicked_id) {
    $.ajax({
        url: 'league/request_join.php',
        type: 'POST',
        data: { "id" : id },
        success: function(data) {
            if (data.trim() != "pass") alert(data);
            else {
                alert("Your request has been made and will be reviewed by the league admin");
                window.location.reload(true);
            }
        },
        error: function() {
            alert("An unknown error occurred while processing the request");
        }
    });
}
