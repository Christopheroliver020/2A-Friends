<?php
class student{
    private $id;
    private $name;
    private $course;
    private $age;

    public function __construct($id, $name, $course, $age){
        $this -> id = $id;
        $this -> name = $name;
        $this -> course = $course;
        $this -> age = $age;
    }

    public function getId(){
        return $this -> id;
    }

    public function getName(){
        return $this -> name;
    }

    public function getCourse(){
        return $this -> course;
    }

    public function getAge(){
        return $this -> age;
    }
}
?>