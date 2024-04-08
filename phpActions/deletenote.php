<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "GET"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';


    $functions = new Add();

    $response = $functions->deleted($_GET['id'],$_GET['user'],$_GET['data']);
    
}

header('Location:../singleBook.php?id='.$_GET['book'].'&user='.$_GET['userr'].'');
die();

?>