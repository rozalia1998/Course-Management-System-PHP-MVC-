<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Privileges</h1>
    <form method="POST" action='?action=update_pass'>
        <input type="hidden" name="id" value="<?$user->getId()?>">
        <label for="pass">Password:</label>
        <input type="password" name="pass" required>
        <button>Update Password</button>
    </form>
</body>
</html>