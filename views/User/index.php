<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <?php if(!isset($_SESSION['user-name'])){
        header('location: /Darrebni/task/');
        exit;
    }
        ?>
    Hello <?php echo $_SESSION['user-name'];?>
    <br><br>
    <a href="http://localhost/Darrebni/task/?action=logout">Logout</a>
</body>
</html>