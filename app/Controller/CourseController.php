<?php
namespace App\Controller;
require_once 'MainController.php';
require_once __DIR__ . '/../Model/Course.php';
use App\Model\Course;

class CourseController extends MainController{
    public function index(){
        $courses=Course::getCourses($this->conn);
        $this->render('Course/index',compact('courses'));
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $course=new Course();
            $course->setCourseName($_POST['name']);
            $course->setCoursePrice($_POST['price']);
            $course->save($this->conn);
            header('location: /Darrebni/task/?action=Show');
            exit;
        }
        else{
            $this->render('Course/create');
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $course = Course::getCourseById($this->conn, $id);
        $this->render('Course/edit',compact('course'));
    }

    public function update() {
        $id = $_POST['id'];
        $course = Course::getCourseById($this->conn, $id);
        $course->setCourseName($_POST['name']);
        $course->setCoursePrice($_POST['price']);
        $course->save($this->conn);
        header('Location: /Darrebni/task/?action=Show');
        exit;
    }

    // public function update() {
    //     $id = $_POST['id'];
    //     $product = Product::getProductByID($this->conn, $id);
    //     $product->setName($_POST['name']);
    //     $product->setPrice($_POST['price']);
    //     $product->save($this->conn);
    //     header('Location: /Darrebni/new-mvc/?action=ShowProducts');
    //     exit;
    // }

    public function delete() {
            if(isset($_POST['yes'])){
                $id = $_POST['id'];
                $course = Course::getCourseById($this->conn, $id);
                $course->delete($this->conn);
                header('Location: /Darrebni/task/?action=Show');
                exit;
            }
            else if(isset($_POST['no'])){
                header('Location: /Darrebni/task/?action=Show');
                exit;
            }
            else{
                $id = $_GET['id'];
                $course = Course::getCourseById($this->conn, $id);
                $this->render('Course/delete',compact('course'));
            }
                
    }
}