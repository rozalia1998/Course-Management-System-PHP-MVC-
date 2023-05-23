<?php
namespace App\Model;


abstract class Model{
    protected $id;

    public function getId() {
        return $this->id;
    }

    abstract public function save($conn);
    abstract public function delete($conn);

}

class User extends Model{
    private $name,$email,$password,$type;

    public function setName($name){
        $this->name=$name;
    }

    public function getName(){
        return $this->name;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPass($password){
        $this->password=$password;
    }

    public function getPass(){
        return $this->password;
    }

    public function setType($type){
        $this->type=$type;
    }

    public function getType(){
        return $this->type;
    }

    public static function getUserByID($conn,$id){
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        $user->id = $row['id'];
        $user->setName($row['name']);
        $user->setEmail($row['email']);
        $user->setPass($row['password']);
        $user->setType($row['type']);
        return $user;
    }

    public static function getAllUsers($conn) {
        $query = "SELECT * FROM users where type='user' OR type='employee'";
        $result = mysqli_query($conn, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->id = $row['id'];
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $user->setType($row['type']);
            $users[] = $user;
        }
        return $users;
    }


    public function save($conn){
        if($this->id){
            $qry="UPDATE users SET password='$this->password' WHERE id='$this->id'";
            $stmt=mysqli_query($conn, $query);
        }
        else{
            $qry="SELECT * FROM users WHERE email='$this->email'";
            $stmt= mysqli_query($conn, $qry);
            if (mysqli_num_rows($stmt)==0){
                $query="INSERT INTO users (name,email,password,type) VALUES('$this->name', '$this->email' , '$this->password','user')";
                $result = mysqli_query($conn, $query);
            }
        }
    }

    public function delete($conn){
        $query="DELETE FROM users WHERE id='$this->id'";
        $result = mysqli_query($conn, $query);
    }

    public function login($conn){
        $query="SELECT * FROM users WHERE email='$this->email' AND password='$this->password'";
        $result = mysqli_query($conn, $query);
        $res=mysqli_fetch_assoc($result);
        if($res){
            session_start();
            $_SESSION['user-name']=$res['name'];
            $_SESSION['user-id']=$res['id'];
            $_SESSION['user-type']=$res['type'];
            return true;
        }
        else return false;
    }

    public function edit($conn){
        $qry="UPDATE users SET type='$this->type' WHERE id='$this->id'";
        $stmt=mysqli_query($conn, $qry);
    }

    // public function signup($conn){
    //     $qry="SELECT * FROM users WHERE email='$this->email'";
    //     $stmt= mysqli_query($conn, $qry);
    //     if (mysqli_num_rows($stmt)==0){
    //         $query="INSERT INTO users (name,email,password,type) VALUES('$this->name', '$this->email' , '$this->password','user')";
    //         $result = mysqli_query($conn, $query);
    //     }
    // }

    public function Signout(){
        session_start();
        session_destroy();
    }




}