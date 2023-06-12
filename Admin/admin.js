function btnclick(_url) {
    $.ajax({
        url: _url,
        type: "post",
        success: function (data) {
            $("#function").html(data);
        },
        error: function () {
            $("#function").text("An error occurred");
        },
    });
}

