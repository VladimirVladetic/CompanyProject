<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./js/spinner.js" defer></script>
    <title>Search User</title>
</head>
<body>
    
    <div class="container">

    <div class="spinner-container">
            <div class="spinner"></div>
    </div>

    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 

    <input class="margins-needed" type="number" placeholder="Enter ID" id="id-number">
    <input class="margins-needed" id="searchbtn" type="submit" placeholder="Search" onclick="showSpinner()">

    <form class="margins-needed" id="go-to-userlist" method="post" action="userList.php"> 
        <tr><td><input type='submit' name='userlist' value='Go to user list'/></td></tr>
    </form>
    </div>

</body>



</html>