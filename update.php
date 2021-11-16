<?php

require_once("pdo.php");
require_once('class/Student.php');
require_once('Studentrepository.php');

$page = file_get_contents("views/update.html");

$id = $_GET['id'];

$recupstudent = Studentrepository::GetStudent($id);

$prenom = $recupstudent[0]->Prenom;
$Age = $recupstudent[0]->Age;
$Id = $recupstudent[0]->Id;

$page = str_replace('$prenom', $prenom, $page);
$page = str_replace('$age', $Age, $page);
$page = str_replace('$id', $Id, $page);

if (isset($_POST["submit"])) {
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $id = $_POST["id"];

    Studentrepository::updateData($prenom, $age, $id);
}

echo $page;
?>