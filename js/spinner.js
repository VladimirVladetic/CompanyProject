function showSpinner() {

    document.querySelector(".spinner-container").style.display = "flex";

    // let spinnercontainer = $(".spinner-container");
    // spinnercontainer.style.display = "flex";

    // let id = document.getElementById("id-number").value;

    let id = $("#id-number").val();

    setTimeout(function() {
        hideSpinner();
    }, 5000);

    // alert(id);

    $.ajax({
        type: 'post',
        url: 'ajax_SearchUserByID.php',
        data: {
            id: id
        },
        success: function(response){
            //alert(response);
            if (response.includes("success")) {
                window.location.href = 'user.php?id=' + id;
            } else {
                alert("No such user exists.");
                window.location.href = "searchUserByID.php"
            }
        }});
}

function hideSpinner() {
    document.querySelector(".spinner-container").style.display = "none";

    // let spinnercontainer = $(".spinner-container");
    // spinnercontainer.style.display = "none";
}