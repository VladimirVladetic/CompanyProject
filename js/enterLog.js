function enterLog() {
    let name = $("#login-name").val();

    let title = "Login information";
    let desc = name + " logged in";

    $.ajax({
        type: "post",
        url: 'http://127.0.0.1:8000/logs/',
        data: {
             title: title,
             desc: desc,
        }
    })
}