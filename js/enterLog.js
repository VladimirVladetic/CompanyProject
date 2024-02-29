function enterLog(logsent, attempts) {
    let name = $("#sessionname").attr("data-value");
    // alert(name);
    // alert(attempts);
    // alert(logsent);
    if(logsent < 2){
        let title = "Login information";
        let desc = name + " logged in";
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
}