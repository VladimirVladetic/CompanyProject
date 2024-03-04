<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    {* <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> *}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="./js/changeCompany.js" defer></script>
    <title>User page</title>
</head>
<body>

    <div class="container">
    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
    <table>

        <div id="user-holder" data-value="{$id}"></div>

        {if $sessionrole=="admin"}
            <form class="margins-needed" id="update-user-form" method="post" action="http://localhost/smarty-4.3.4/CompanyProject/user.php?id={$id}">
                <tr><td>Name: <input id="info-name" type="text" name="name" placeholder="Enter your name." {if isset($name)} value="{$name}" {/if}></td></tr>
                <tr><td>Surname: <input id="info-surname" type="text" name="surname" placeholder="Enter your surname."{if isset($surname)} value="{$surname}" {/if}></td></tr>
                <tr><td>Year of birth: <input id="info-yearofbirth" type="number" name="yearofbirth" placeholder="Enter your year of birth."{if isset($yearofbirth)} value="{$yearofbirth}" {/if}></td></tr>
                <tr><td>Password: <input id="info-password" type="text" name="password" placeholder="Enter your password."{if isset($password)} value="{$password}" {/if}></td></tr>
                <tr><td>Company: {if isset($companyname)} {$companyname} {/if}</td></tr>
                <tr><td>{if isset($role)} Role: {$role} {/if} </td></tr>
                <tr><td><button id="update-info-button">Update user information</button></td></tr>
            </form>
            <tr><td><button onclick="openChangeCompanyPopup()">Change company</button></td></tr>
            <form class="margins-needed" id="delete-this-user" method="post" action="http://localhost/smarty-4.3.4/CompanyProject/user.php?id={$id}">
                <tr><td><input type='submit' name='deleteuserbtn' value="Delete user"/></td></tr>
            </form>
        {/if}
        {if $sessionrole=="user"}
            <tr><td>Name: {if isset($name)} {$name} {/if}</td></tr>
            <tr><td>Surname: {if isset($surname)} {$surname} {/if}</td></tr>
            <tr><td>Year of birth: {if isset($yearofbirth)} {$yearofbirth} {/if}</td></tr>
            {* <tr><td>Password: Hidden</td></tr> *}
            <tr><td>Company: {if isset($companyname)} {$companyname} {/if}</td></tr>
            <tr><td>{if isset($role)} Role: {$role} {/if} </td></tr>
        {/if}
            <form class="margins-needed" id="go-to-userlist" method="post" action="userList.php"> 
            <tr><td><input type='submit' name='userlist' value='Go to user list'/></td></tr>
            </form>
    </table>
    </div>

    <div class="overlay" id="overlay"></div>
        <div class="popup-container" id="popup">
            <h2>Change Company</h2>
            <label for="dropdown">Select a company:</label>
            <select id="dropdown">
                {foreach from=$companies item=company} 
                <option value="{$company.name}">{$company.name}</option>
                {/foreach}
            </select>
            <button onclick="submitChange()">Submit</button>
            <button onclick="closePopup()">Close</button>
        </div>

</body>
</html>