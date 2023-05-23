<?php
require_once 'config/db.php';
require_once 'app/Controller/UserController.php';
require_once 'app/Controller/CourseController.php';
$controller=new App\Controller\UserController($conn);
$con=new App\Controller\CourseController($conn);

$action=isset($_GET['action']) ? $_GET['action'] : 'log';

switch ($action) {
    case 'log':
        $controller->index();
        break;
    case 'signup':
        $controller->register();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'edit':
        $controller->edit_priv();
        break;
    case 'update_pass':
        $controller->edit_pass();
        break;  
    case 'delete':
        $controller->delete();
        break; 
    case 'Dashboard':
        $controller->dashboard();
        break; 
    case 'Show':
        $con->index();
        break; 
    case 'addCourse':
        $con->create();
        break;
    case 'editCourse':
        $con->edit();
         break; 
    case 'UpdateCourse':
        $con->update();
        break;
    case 'deleteCourse':
        $con->delete();
        break;
    default:
        $controller->index();
}
