<?php
$errors = [];
$firstname = '';
$lastname = '';
$f_email = '';
$f_text = '';
$f_theme = '';
$abgeschickt = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
    //echo '<hr>';
    $firstname = trim($_POST['f_firstname']) ?? '';
    $lastname = trim($_POST['f_lastname']) ?? '';
    $f_email = trim($_POST)['f_email'];
    $f_text = trim($_POST['f_text']) ?? '';
    $f_theme = trim($_POST['f_theme']) ?? '';
  if ($firstname === '') {
    array_push($errors, "Bitte geben Sie Ihren Vornamen ein.");
  }
  if ($lastname === '') {
    array_push($errors, "Bitte geben Sie Ihren Nachnamen ein.");
  }
  if ($f_theme === '') {
    array_push($errors, "Bitte geben Sie ein Thema ein.");
  }
  if ($f_text === '') {
    array_push($errors, "Bitte geben Sie etwas ein.");
  }
    if (empty($errors)) {
        $dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $dbConnection->exec("INSERT INTO beitraege (first_name, last_name, email, theme, text, creation_date) VALUES ('$firstname', '$lastname', '$f_email', '$f_theme', '$f_text', now())");
        $abgeschickt = true; 
    }
}

?>
