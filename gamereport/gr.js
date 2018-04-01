var submit = function() {
    var u1 = document.getElementById("u1").value;
    var u2 = document.getElementById("u2").value;
    var data = {
        "u1" : document.getElementById("u1").value,
        "u2" : document.getElementById("u2").value,
        "winner" : (document.getElementById("winner").value == "Yes") ? u1 : u2,
        "league" : document.getElementById("id").value,
        "season" : document.getElementById("sn").value
    };
    if (!data['u1'] || !data['u2']) {
        document.getElementById("error").innerHTML = "Please enter valid usernames";
        return;
    }
    document.getElementById("error").innerHTML = "";
	$.ajax({
        url: 'gamereport/enter.php',
        type: 'POST',
        dataType: "json",
        data: data
    }).done(function(data){
        alert(JSON.stringify(data));
    });
}
