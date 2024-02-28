function enterLog() {
    let name = $("#login-name").val();

    let title = "Login information";
    let desc = name + " logged in";

    let attempts = 1;

    $.ajax({
        type: "post",
        url: 'http://127.0.0.1:8000/logs/',
        data: {
             title: title,
             desc: desc,
             attempts: attempts,
        }
    })
}