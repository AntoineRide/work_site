<?php

require_once("pdo.php");
require_once('class/Student.php');

class Studentrepository {

    public static function addstudent(student $student) {
        $query = GetPDO()-> prepare("INSERT INTO `students`(`Prenom`,`Age`) VALUES (?, ?)");
        $query->execute([
            $student->Prenom,
            $student->Age,
        ]);
    }

    public static function displayData() {
        $query = GetPDO()->prepare("SELECT * FROM students");
        $query->execute();
        
        while ($student = $query->fetch(PDO::FETCH_ASSOC)) {
            $new_student = new Student($student['Prenom'], $student['Age'],  $student['Id']);
            $datas[] = $new_student;
        }
        
        return $datas;
    }

    public static function updateData($prenom, $age, $id) {
        $query = GetPDO()->prepare("UPDATE `students` SET `Prenom`=:prenom,`Age`=:age WHERE id=:id");
        $query->execute([
            ':id' => $id,
            ':prenom' => $prenom,
            ':age'=> $age,
        ]);
        

        
    }

    public static function GetStudent($id)
    {

        $query = GetPDO()->prepare("SELECT * FROM students WHERE id =:id LIMIT 0,1");
        $query->execute([
            ':id' => $id
        ]);
        $datas = [];
        $student = $query->fetch(PDO::FETCH_ASSOC);
        $datas[] = new Student($student['Prenom'], $student['Age'], $student['Id']);
        
        return $datas;
    }

    public static function deletestudent($id)
    {
        var_dump($id);
        $query = GetPDO()->prepare("DELETE FROM students WHERE id=:id");
        $query->execute([
            ':id' => $id
        ]);

        
        return true;
    }


}

?>