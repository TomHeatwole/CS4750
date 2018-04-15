var endSeason = function() {
	var winner = document.getElementById("winner").value;
	var data = {
		"winner" : document.getElementById("winner").value,
        "sn" : getQueryVariable("num"),
        "leagueId" : getQueryVariable("id")
	};
	if (!data['winner']) {
		document.getElementById("error").innerHTML = "Please enter valid username";
		return;
	} else {
	    document.getElementById("error").innerHTML = "";
    }
	$.ajax({
		url: 'season/enterwinner.php',
		type: 'POST',
		data: data,
        success: function(data) {
            if (data != "pass") alert(data);
            else {
                alert("Successfully ended season");
                window.location = "../season?id=" + getQueryVariable("id");
            }
        },
        error : function(data) {
            alert("Something went wrong.");
        }
	});
}

function getQueryVariable(variable) {
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		if(pair[0].toLowerCase() == variable){return pair[1];}
	}
	return(false);
}
