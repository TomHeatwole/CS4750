var submit = function() {
    var data = {
        "u2" : document.getElementById("u2").value,
        "winner" : (document.getElementById("winner").value == "Yes") ? true : false,
        "score" : document.getElementById("score").value,
        "league" : document.getElementById("id").value,
        "season" : document.getElementById("sn").value
    };
    if (!data['u2']) {
        document.getElementById("error").innerHTML = "Please enter a valid opponent username";
        return;
    }
    var check_score = /^[0-9][-][0-9]$/g;
    if (!check_score.test(data["score"])){
        document.getElementById("error").innerHTML = "Please enter a valid score of form (ex: P1 score-P2 score)";
        return;
    }
    document.getElementById("error").innerHTML = "";
	$.ajax({
        url: '/gamereport/enter.php',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data.trim() !== "pass") alert(data);
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

var getSeasons = function() {
    var selectSeason = document.getElementById("sn");
    for ( ; selectSeason.firstChild; selectSeason.removeChild(selectSeason.firstChild));
    var noSeason = document.createElement("option");
    noSeason.value = "";
    noSeason.appendChild(document.createTextNode("N/A"));
    selectSeason.append(noSeason);
    var league = document.getElementById("id").value;
    if (!league) return;
    $.ajax({
        url: '/gamereport/get_seasons.php',
        type: 'POST',
        data: {"id" : league},
        success: function(data) {
            var seasons = data.split("\n");
            for (var i = 0; i < seasons.length - 1; i+= 2) {
                var option = document.createElement("option");
                option.value = seasons[i]; 
                option.appendChild(document.createTextNode(seasons[i + 1]));
                selectSeason.appendChild(option);
            }
        }
    });
}
