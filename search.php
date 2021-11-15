<?php
// Intégration des class

require_once('class/Student.php');

// Vérification de $_POST 

if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
    $student_name = $_POST['student_name'];

    // Création de l'objet

    $student = new Student($student_name);

    // Appel de la fonction Search student

    $result = $student->search_student();

    // Message d'erreur

    if (!$result) {
        $displayError = 'danger';
        $infoError = 'Aucun étudiant a été trouvé';
    } else {
        $displayError = 'success';
        $infoError = "L'étudiant " . $student_name . ' a ' . $result . ' ans';
    }
}

// Récupération search.html

$page = file_get_contents("views/search.html");

// Vérification de $_POST 
if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
    // Si valeur vide :
    $page = str_replace('$typeError', $displayError, $page);
    $page = str_replace('$infoError', $infoError, $page);
} else {
    // Si valeur non vide :
    $page = str_replace('$typeError', 'info', $page);
    $page = str_replace('$infoError', 'Entrez un nom d\'étudiant correct', $page);
}

// Affichage search.html
echo $page;
