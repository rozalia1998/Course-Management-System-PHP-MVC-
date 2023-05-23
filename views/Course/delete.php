<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            font-size:20px;
        }
        button{
            color: white;
            padding: 5px 20px;
        }
        #yes{
            background-color: #04AA6D;
        }
        #no{
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Delete Course</h1>
    <p>Do you really want to delete this course ?</p>
    <form method="Post" action="?action=deleteCourse">
        <input type="hidden" name="id" value="<?= $course->getId() ?>">
        <button type="submit" id='yes' name="yes">Yes</button>
        <button type="submit" id='no' name="no">No</button>
    </form>
</body>
</html>