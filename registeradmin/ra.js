var register = function() {
    document.getElementById("error").style = "display : none";
    var phone = document.getElementById("phone").value;
    var error = false;
    if (phone.length != 12 || phone.charAt(3) != '-' || phone.charAt(7) != '-') error = true;
    if (!error) for (var i = 0; i < 12; i++) if ('0123456789'.indexOf(phone.charAt(i)) === -1 && i != 3 && i != 7) error = true;
    if (error) {
        document.getElementById("error").style = "color: red";
        return;
    }
    $.ajax({
        url: '/registeradmin/reg.php',
        type: 'POST',
        data: {"phone" : phone},
        success: function(data) {
            alert("You are now registered as an admin user");
            window.location = "/createleague";
        },
        error: function() {
            alert("An unknown error occurred");
        }
    });
}
