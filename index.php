<?php
// Intégration des class

require_once("pdo.php");
require_once("class/Student.php");

// Création de l'objet

$name_student = 'Nicolas';
$age_student = 10;
$student = new Student($name_student, $age_student);

// Récupération page.html

$page = file_get_contents("views/page.html");

// Remplacement des valeurs Prénom et Nom

$page = str_replace('$prenom', $student->Prenom, $page);
$page = str_replace('$age', $student->Age, $page);

// Affichage page.html

echo $page;
