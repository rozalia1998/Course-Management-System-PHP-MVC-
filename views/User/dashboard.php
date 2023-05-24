<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document1</title>
    <style>
        table,th,td{
            border:1px solid black;
            text-align:center;
        }
        th,td{
            padding:5px;
        }
        form{
            display:inline;
        }
        button{
            display:inline-block;
            background-color:#bbb;
            padding:3px 10px;
            color:white;
        }

        #edit{
            background-color: #04AA6D;
        }
        #delete{
            background-color: #f44336;
        }
        a{
            text-decoration:none;
            font-size:18px;
        }
    </style>
</head>
<body>
    <center>
    <h1>Admin Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Type</th>
                <th cols="2">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getName() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getType() ?></td>
                <td cols="2">
                <form method="POST" action="/Darrebni/task/?action=edit&id=<?= $user->getId() ?>">
                        <button id='edit'>Edit</button>
                </form>
                <form method="POST" action="/Darrebni/task/?action=delete&id=<?= $user->getId() ?>">
                    <button id='delete'>Delete</button>
                </form>
                </td>
             </tr>
    <?php endforeach?>
        </tbody>
    </table><br>
    <a href="/Darrebni/task/?action=logout">Logout</a>
    </center>
</body>
</html>