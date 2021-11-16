<?php
// Intégration des class

require_once("pdo.php");
require_once('class/Student.php');
require_once('Studentrepository.php');

$id = $_GET['id'];
if(Studentrepository::deletestudent($id));
    header('Location: add_user.php');