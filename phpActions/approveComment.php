<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == "GET"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';

    $functions = new Add();

    $response = $functions->export($_GET['id']);
    
}
header('Location:../adminResurces/commentSection.php');
die();

?>