<?php

if($_SERVER['REQUEST_METHOD']!== 'POST'){
    header("Location:/../adminResurces/addAuthor.php");
}

require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$full_name = "$first_name $last_name";
$biography = $_POST['biography'];


$authors = new Add(); 
$authors->setNewAuthorName($full_name);
// $authors->setNewAuthorSurname($last_name);
$authors->setNewAuthorBio($biography);
$authors->authores();

header('Location:../adminResurces/addAuthor.php');
?>