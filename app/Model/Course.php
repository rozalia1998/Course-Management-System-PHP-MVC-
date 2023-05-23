<?php
namespace App\Model;

class Course extends Model{
    private $CourseName,$CoursePrice;

    public function setCourseName($CourseName){
        $this->CourseName=$CourseName;
    }

    public function getCourseName(){
        return $this->CourseName;
    }

    public function setCoursePrice($CoursePrice){
        $this->CoursePrice=$CoursePrice;
    }

    public function getCoursePrice(){
        return $this->CoursePrice;
    }

    public static function getCourses($conn){
        $query="SELECT * FROM courses";
        $stmt=mysqli_query($conn,$query);
        $courses=array();
        while($row = mysqli_fetch_assoc($stmt)){
            $course=new Course();
            $course->id=$row['id'];
            $course->setCourseName($row['c_name']);
            $course->setCoursePrice($row['c_price']);
            $courses[]=$course;
        }
        return $courses;
    }

    public static function getCourseById($conn, $id){
        $query = "SELECT * FROM courses WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $course=new Course();
        $course->id = $row['id'];
        $course->setCourseName($row['c_name']);
        $course->setCoursePrice($row['c_price']);
        return $course;
    }

    public function save($conn) {
        if ($this->id) {
            $query = "UPDATE courses SET c_name = '$this->CourseName', c_price = '$this->CoursePrice' WHERE id = '$this->id'";
            $stmt = mysqli_query($conn, $query);

        } else {
            $query = "INSERT INTO courses (c_name, c_price) VALUES ('$this->CourseName','$this->CoursePrice')";
            $stmt = mysqli_query($conn, $query);
            
            $this->id = mysqli_insert_id($conn);
        }
    }

    public function delete($conn) {
        $query = "DELETE FROM courses WHERE id = '$this->id' ";
        $stmt = mysqli_query($conn, $query);
       
    }
}