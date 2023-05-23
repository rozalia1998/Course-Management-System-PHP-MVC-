<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        a{
            text-decoration:none;
            font-size:18px;
        }
        button{
            color: white;
            padding: 5px 20px;
        }
        #edit{
            background-color: #04AA6D;
        }
        #delete{
            background-color: #f44336;
        }
        
    </style>
</head>
<body>
    <center>
<h1>Courses</h1>
<?php 
 session_start();
if ($_SESSION['user-type']=='employee') :?>
    <a href="/Darrebni/task/?action=addCourse">Create Course</a><br><br>
              
<?php endif?>
        <table>
            <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Course Price</th>
                <?php 
                
                if ($_SESSION['user-type']=='employee') :?>
                    <th cols="2">Actions</th>
                <?php endif?>
            </tr>
                </thead>
        <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->getId() ?></td>
                <td><?= $course->getCourseName() ?></td>
                <td><?= $course->getCoursePrice() ?></td>
                <?php if ($_SESSION['user-type']=='employee') :?>
                    <td cols="2">
                        <form method="POST" action="/Darrebni/task/?action=editCourse&id=<?= $course->getId() ?>">
                                <button id='edit'>Edit</button>
                        </form>
                        <form method="POST" action="/Darrebni/task/?action=deleteCourse&id=<?= $course->getId() ?>">
                                <button id='delete'>Delete</button>
                        </form>
                    </td>
                <?php endif?>
             </tr>
    <?php endforeach?>
    </tbody>
    </table><br>
    <a href="/Darrebni/task/?action=logout">Logout</a>
                </center>
</body>
</html>