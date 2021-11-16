<?php

// Intégration des classes
require_once('class/Student.php');
require_once("studentRepository.php");

// Je récupère le contenu de la page add_user
$page = file_get_contents("views/add_user.html");

// Vérification de l'existance de $_POST et vérification non vide 
if (isset($_POST['submit'])) {
    // Stockages des données
    $nom_etudiant = $_POST['student_name'];
    $age_etudiant = $_POST['age_etudiant'];
    // Je vérifie si rien n'est vide
    if (!empty($nom_etudiant) && !empty($age_etudiant)) {
        // Si il existe des étudiants
        $student = new Student($nom_etudiant, $age_etudiant);
        StudentRepository::AddStudent($student);
        $displayError = 'success';
        $infoError = 'Utilisateur crée avec succès';
    } 

} 

echo $page;