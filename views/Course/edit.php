<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display:inline-block;
            width:70px;
            font-size:20px;
            
        }
        button{
            color:white;
            background-color:#04AA6D;
            padding: 5px 20px;
            margin: 8px 0;
        }
        input{
            width:300px;
        }
    </style>
</head>
<body>
    <h1>Edit Course</h1>
    <form method="Post" action="?action=UpdateCourse">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $course->getCourseName() ?>">
        </div></br>
        <div>
            <label for="price">Price:</label>
            <input type="Number" name="price" id="price" value="<?= $course->getCoursePrice() ?>">
        </div></br>
        <input type="hidden" name="id" value="<?= $course->getId() ?>">
        <button>Edit</button>
    </form>
</body>
</html>
