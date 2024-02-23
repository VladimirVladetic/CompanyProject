function enterLog() {
    let name = $("#login-name").val();
    let password = $("#login-password").val();

    // alert(name + password);

    $.ajax({
        type: "post",
        url: '127.0.0.1/ajax/getLogs/',
        data: {
            name: name,
            password: password
        }
    })
}