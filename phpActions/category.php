<?php

if($_SERVER['REQUEST_METHOD']!== 'POST'){
    header("Location:/../adminResurces/addCategory.php");
}

require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';


$categoryy = $_POST['category'];
//echo $category;

$categories = new Add(); 
$categories->setNewCategory($categoryy);
$categories->category();

header('Location:../adminResurces/addCategory.php');
?>