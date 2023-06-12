function usernameAvailability(usernameInput) {
    $.ajax({
        method: "POST",
        url: "php-script.php",
        data: { username: usernameInput },
        success: function (data) {
            $("#usernameStatus").html(data);
        },
    });
}

$(document).on("input", "#username", function (e) {
    let usernameInput = $("#username").val();
    let msg;
    if (usernameInput.length == 0) {
        msg = "<span style='color:red'>Enter username</span>";
    } else if (/^$|\s+/.test(usernameInput)) {
        msg = "<span style='color:red'>username can't contain spaces</span>";
    } else if (
        usernameInput.length != 0 &&
        (usernameInput.length < 5 || usernameInput.length > 20)
    ) {
        msg = "<span style='color:red'>username must be between 5-20</span>";
    } else {
        usernameAvailability(usernameInput);
    }
    $("#usernameStatus").html(msg);
});
