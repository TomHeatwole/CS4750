var submit = function() {
    var u2 = document.getElementById("u2").value;
    var data = {
        "u2" : document.getElementById("u2").value,
        "winner" : (document.getElementById("winner").value == "Yes") ? true : false,
        "league" : document.getElementById("id").value,
        "season" : document.getElementById("sn").value
    };
    if (!data['u2']) {
        document.getElementById("error").innerHTML = "Please enter a valid opponent username";
        return;
    }
    document.getElementById("error").innerHTML = "";
	$.ajax({
        url: 'gamereport/enter.php',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data != "pass") alert(data);
            else {
                alert("Successfully entered match results");
                window.location = "../players/";
            }
        },
        error: function(data) {
            alert("An unexpected error occurred. Check your internet connection.");
        }
    });
}

