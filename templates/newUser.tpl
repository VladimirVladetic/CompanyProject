<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    <title>New user</title>
</head>
<body>

    <div class="container">
    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
    <table>
        <form class="margins-needed" id="insert-user" method="post" action="newUser.php">
            <tr><td><input id="info-name" type="text" name="name" placeholder="Enter your name." {if isset($name)} value="{$name}" {/if}></td></tr>
            <tr><td><input id="info-surname" type="text" name="surname" placeholder="Enter your surname."{if isset($surname)} value="{$surname}" {/if}></td></tr>
            <tr><td><input id="info-yearofbirth" type="number" name="yearofbirth" placeholder="Enter your year of birth."{if isset($yearofbirth)} value="{$yearofbirth}" {/if}></td></tr>
            <tr><td><input id="info-password" type="text" name="password" placeholder="Enter your password."{if isset($password)} value="{$password}" {/if}></td></tr>
            <tr><td>
            <select name="company" id="info-company">
                {foreach from=$companies item=company} 
                <option value="{$company.name}">{$company.name}</option>
                {/foreach}
            </select>
            </td></tr>
            <tr><td><button id="enter-info-button">Enter Information</button></td></tr>
        </form>
        <form class="margins-needed" id="go-to-userlist" method="post" action="userList.php"> 
            <tr><td><input type='submit' name='userlist' value='Go to user list'/></td></tr>
        </form>
    </table>
    </div>

</body>
</html>