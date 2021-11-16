<?php
// Intégration des class

require_once("pdo.php");
require_once('class/Student.php');
require_once('Studentrepository.php');
/*
// Récupération add_user.html

$page = file_get_contents("views/add_user.html");

// Vérification de $_POST

if (isset($_POST['submit'])) {

    // Stockages des données

    $nom_etudiant = $_POST['student_name'];
    $age_etudiant = $_POST['age_etudiant'];

    // Vérification

    if (!empty($nom_etudiant) && !empty($age_etudiant)) {

        // Récupération fichier Json

        if (file_exists("src/public/assets/json/students.json"))
            $students = json_decode(file_get_contents("src/public/assets/json/students.json"));
        else
            $students = array();
        if ($students) {
            foreach ($students as $student) {
                $add_student = new Student($nom_etudiant, $age_etudiant);
                $students = $add_student->add_student($students);
            }
            unlink("src/public/assets/json/students.json");
        } else
            $students = $add_student->add_student($students, true);
        file_put_contents("src/public/assets/json/students.json", json_encode($students));
        $displayError = 'success';
        $infoError = "L'étudiant a bien été créé";
    } else {
        $displayError = 'danger';
        $infoError = 'Les champs ne sont pas remplis';
    }
    // Vérification 

    $page = str_replace('$typeError', $displayError, $page);
    $page = str_replace('$infoError', $infoError, $page);
} else {
    $page = str_replace('$typeError', 'info', $page);
    $page = str_replace('$infoError', 'Entrez les informations de l\'étudiant', $page);
}

// Affichage add_user.html

echo $page; */

if (!empty($_GET['create'])) {
    $student = new Student("Antoine", 19, 1);

Studentrepository::addstudent($student);
}

$students = StudentRepository::DisplayData();
foreach ($students as $student) {
    echo $student->Prenom . ' ';
    echo $student->Age . ' <a href="update.php?id=' . $student->Id . '">MODIFIER</a> <a href="delete.php?id=' . $student->Id . '">SUPPRIMER</a><br />';
}
?>
