<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    label{
        display:inline-block;
        width:100px;
        font-size:20px;
        }
        #log{
            color:white;
            font-size:18px;
            background-color:#04AA6D;
            padding: 5px 20px;
            margin: 8px 0;
        }
        input{
            width:300px;
        }
    a{
        text-decoration:none;
        margin-right:10px;
    }

</style>
<body>
    <center>
    <h1>Login Form</h1>
<form method="POST" action="?action=log">
        <label for="email"><b>Email </b></label>
        <input type="email" placeholder="Enter Email" name="email" required><br><br>

        <label for="pass"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required><br><br>

        <a href="http://localhost/Darrebni/task/?action=signup">Sign Up</a>
        <button type="submit" name="login" id="log" class="signin">Login</button>
</form>
</center>
</body>
</html>