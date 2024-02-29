<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="./js/enterLog.js" defer></script>
    <title>User List</title>
</head>
<body onload="enterLog({$logsent},{$attempts})">

    <p id="sessionname" data-value="{$sessionname}">Hello {$sessionname}</p>

    <div class="container">
    <img class="logo" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
    <table>
        <thead class="margins-needed">
            <tr>
                {* <th>ID</th> *}
                <th>First name</th>
                <th>Last name</th>
                <th>Year of birth</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody class="margins-needed">
        {foreach from=$data item=user} 
            {if !($sessionrole=="user" && $user.role=="admin")}
            <tr> 
            {foreach from=$companydata item=company}
                {if $company.id == $user.companyid}
                    {$companyname = $company.name}
                {/if}
            {/foreach}
                {* <td><a href="http://localhost/smarty-4.3.4/CompanyProject/user.php?id={$user.id}">{$user.id}</td>  *}
                <td><a href="http://localhost/smarty-4.3.4/CompanyProject/user.php?id={$user.id}">{$user.name}</td> 
                <td><a href="http://localhost/smarty-4.3.4/CompanyProject/user.php?id={$user.id}">{$user.surname}</td> 
                <td>{$user.yearofbirth}</td> 
                <td>{$companyname}</td>
                {if $sessionrole=="admin"}<td><input type="checkbox" form="delete-selected-users" name="checkbox{$user.id}"/></td>{/if}
            <tr> 
            {/if}
        {/foreach}
        </tbody>
    </table>
    {if $sessionrole=="admin"}<form class="margins-needed" id="go-to-newuser" method="post" action="newUser.php"> 
        <input type='submit' name='newuserbtn' value='Enter new user.'/>
    </form>{/if}
    <form class="margins-needed" id="go-to-search" method="post" action="searchUserByID.php">
        <input type="submit" name='gotosearchbtn' value="Search by ID"/>
    </form>
    {if $sessionrole=="admin"} <form class="margins-needed" id="delete-selected-users" method="post" action="userList.php">
        <input type="submit" name='deleteusersbtn' value="Delete selected users"/>
    </form>{/if}
    <form class="margins-needed" id="logout" method="post" action="userList.php">
        <input type="submit" name='logoutbtn' value="Log out"/>
    </form>
    </div>
    
</body>
</html>