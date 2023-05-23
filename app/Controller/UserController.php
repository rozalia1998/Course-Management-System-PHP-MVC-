<?php
namespace App\Controller;
require_once 'MainController.php';
// require_once 'CourseController.php';
require_once __DIR__ . '/../Model/User.php';
use App\Model\User;
use App\Model\Course;

class UserController extends MainController{
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $user=new User();
            $user->setEmail($_POST['email']);
            $user->setPass($_POST['pass']);
            $res=$user->login($this->conn);
            if($res){
                if($_SESSION['user-type']=='Admin'){

                    header('Location: /Darrebni/task/?action=Dashboard');
                    exit;
                }
                else{
                    header('Location: /Darrebni/task/?action=Show');
                    exit;
                }
            }
            else{
                header('Location: /Darrebni/task/');
            }
        }
        else{
            $this->render('User/login');
        }
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $user=new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPass($_POST['pass']);
            $user->save($this->conn);
            header('location: /Darrebni/task/');
            exit;
        }
        else{
            $this->render('User/signup');
        }
    }
    public function dashboard(){
        $users=User::getAllUsers($this->conn);
        $this->render('User/dashboard',compact('users'));
    }

    public function logout(){
        $user=new User();
        $user->Signout();
        header('location: /Darrebni/task/');
        exit;
    }

    public function delete(){
        if(isset($_POST['yes'])){
            $id = $_POST['id'];
            $user = User::getUserByID($this->conn, $id);
            $user->delete($this->conn);
            header('Location: /Darrebni/task/?action=Dashboard');
            exit;
        }
        else if(isset($_POST['no'])){
            header('Location: /Darrebni/task/?action=Dashboard');
            exit;
        }
        else{
            $id = $_GET['id'];
            $user = User::getUserByID($this->conn, $id);
            $this->render('User/delete',compact('user'));
        }
    }

    public function edit_priv(){
        if(isset($_POST['check'])){
            $id = $_POST['id'];
            $user = User::getUserByID($this->conn, $id);
            $user->setType($_POST['check']);
            $user->edit($this->conn);
            header('Location: /Darrebni/task/?action=Dashboard');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = User::getUserByID($this->conn, $id);
            $this->render('User/edit_priv',compact('user'));
        }
    }

    public function edit_pass(){
        if(isset($_POST['pass'])){
            $id = $_POST['id'];
            $user = User::getUserByID($this->conn, $id);
            $user->setPass($_POST['pass']);
            $user->save($this->conn);
            header('Location: /Darrebni/task/');
            exit;
        }
        else{
            $id=$_GET['id'];
            $user = User::getUserByID($this->conn, $id);
            $this->render('User/edit',compact('user'));
        }
    }
}