function enterLog() {
    let name = $("#login-name").val();

    let title = name + " logged in";
    let desc = name + " logged in";

    alert(title);

    $.ajax({
        type: "post",
        url: '127.0.0.1/ajax/storeLogs/',
        data: {
             title: title,
             desc: desc,
        }
    })
}