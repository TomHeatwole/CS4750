var accept = function(clicked_id){
	var data = {
        "username" : clicked_id,
        "id" : window.location.href.slice(window.location.href.indexOf("=")+1)
    };
$.ajax({
        url: 'league/enter.php',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data != "pass") alert(data);
            else {
                alert("Successfully entered match results");
                window.location.reload(true);
            }
        },
        error: function(data) {
            alert("An unexpected error occurred. Check your internet connection.");
        }
    });
}