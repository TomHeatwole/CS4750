var create = function() {
    document.getElementById("error").style = "display: none";
    var n = document.getElementById("name").value.trim();
    if (n.length < 3) {
        document.getElementById("error").style = "color : red";
        return;
    }
    $.ajax({
        url: '/createleague/createleague.php',
        type: 'POST',
        data: {"n" : n},
        success: function(data) {
            alert("League: " + n + " has been created.");
            window.location = "/league?id=" + data; // TODO: Go to actual league
        },
        error: function() {
            alert("An unknown error occurred");
        }
    });
}
