var endseason = function() {
    console.log("here");
    var winner = document.getElementById("winner").value;
    var data = {
        "winner" : document.getElementById("winner").value,
    };
    if (!data['winner']) {
        document.getElementById("error").innerHTML = "Please enter valid username";
        return;
    }
    document.getElementById("error").innerHTML = "";
	$.ajax({
        url: 'season/enterwinner.php',
        type: 'POST',
        dataType: "json",
        data: data
    }).done(function(data){
        if (data == "-1") alert("Invalid input. Please check that you entered the results correctly");
        else {
            alert("Successfully entered match results");
            window.location = "../league?id=8";
        }
    });
}
