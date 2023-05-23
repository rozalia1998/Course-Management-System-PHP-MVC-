<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         button{
            display:inline-block;
            background-color:#04AA6D;
            padding:3px 10px;
            color:white;
        }
       
    </style>
</head>
<body>
    <h1>Edit Privileges</h1>
    <form method="POST" action='?action=edit'>
        <input type="checkbox" name="check" value="user">User</input>
        <input type="checkbox" name="check" value="employee">Employee</input><br><br>
        <input type="hidden" name="id" value="<?= $user->getId() ?>">
        <button>Edit</button>
    </form>
</body>
</html>