var recover = function() {
    var str = document.getElementById("data").value;
    $.ajax({
        url: '/data/execute_recovery.php',
        type: 'POST',
        data: { "str" : str },
        success: function(data) {
            alert("Data has been recovered");
            window.location="/";
        },
        error: function() {
            alert("An unknown error occurred.");
        }
    });
}


var clearDatabase = function() {
    $.ajax({
        url: '/data/execute_clear.php',
        type: 'POST',
        success: function(data) {
            console.log(data);
            alert("Data has been cleared");
            window.location="/";
        },
        error: function() {
            alert("An unknown error occurred.");
        }
    });
}

