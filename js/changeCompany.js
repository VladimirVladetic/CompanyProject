function openChangeCompanyPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}

function submitChange() {
    //let companyName = document.getElementById("dropdown").value;
    //let id = document.getElementById("update-user-form").getAttribute("data-user-id");
    
    let companyName = $('#dropdown option:selected').val();
    let id = $('#user-holder').attr("data-value");

    // alert("Selected value: " + companyName + id);

    $.ajax({
        type: 'post',
        url: 'ajax_ChangeCompany.php',
        data: {
            id: id,
            companyName : companyName
        },
        success: function(response){
            window.location.href = 'user.php?id=' + id;
        }});

    closePopup();
}