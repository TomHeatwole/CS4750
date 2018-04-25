var create = function(){
	var data = {
        "u1" : document.getElementById("u1").value.trim(),
        "id" : window.location.href.slice(window.location.href.indexOf("=")+1)
    };
    $.ajax({
        url: 'seasons/create.php',
        type: 'POST',
        data: data,
        success: function(data) {
            if (data != "pass") alert(data);
            else {
                alert("Successfully created new season");
                window.location = window.location.href;
                // window.location = "../seasons/create.php"
            }
        },
        error: function(data) {
            alert("An unexpected error occurred. Check your internet connection.");
        }
    });

}
