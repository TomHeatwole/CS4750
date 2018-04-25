var id = window.location.href.slice(window.location.href.indexOf("=")+1);

$.ajax({
    url: '/league/show_request_button.php',
    type: 'POST',
    data: { "id" : id },
    success: function(data) {
        if (data.trim() == "pass") document.getElementById("req").style = "display: lol";
    },
    error: function() {
        alert("An unknown error occurred with request button");
    }
});

$.ajax({
    url: '/league/show_request_table.php',
    type: 'POST',
    data: { "id" : id },
    success: function(data) {
        if (data.trim() == "pass") document.getElementById("reqListDiv").style = "display: lol";
    },
    error: function() {
        alert("An unknown error occurred with request table");
    }
});

var accept = function(clicked_id) {
    var data = {
        "username" : clicked_id,
        "id" : id    
    };
    $.ajax({
        url: '/league/accept.php',
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

var decline = function(clicked_id) {
    var data = {
        "n" : clicked_id,
        "id" : id    
    };
    $.ajax({
        url: '/league/decline.php',
        type: 'POST',
        data: data,
        success: function(data){(data);},
        error: function() {
            alert("An unknown error occurred while declining the request");
        }
    });
    var list = document.getElementById("reqList");
    var rows = list.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].id == clicked_id + "ROW") rows[i].parentElement.removeChild(rows[i]);
    }
    if (rows.length == 1) document.getElementById("reqListDiv").style = "display: none";
    alert("Request declined for user: " + clicked_id);
}

var request = function(clicked_id) {
    $.ajax({
        url: '/league/request_join.php',
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
