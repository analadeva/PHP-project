<?php

if($_SERVER['REQUEST_METHOD']!== 'POST'){
    header("Location:/../adminResurces/addCategory.php");
}

require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';


$title = $_POST['title'];
$author = $_POST['author'];
$publication = $_POST['publication'];
$pages = $_POST['pages'];
$photo = $_POST['photo'];
$categori = $_POST['category'];
//echo "$title $author $publication $pages $photo $category";

$books = new Add(); 
$books->setTitle($title);
$books->setAuthor($author);
$books->setPublication($publication);
$books->setPages($pages);
$books->setPhoto($photo);
$books->setCategory($categori);
$books->book();

 header('Location:../adminResurces/adminPage.php');

?>