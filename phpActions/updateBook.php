<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';

    $params = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'publication' => $_POST['publication'],
        'pages' => $_POST['pages'],
        'photo' => $_POST['photo'],
        'categori' => $_POST['category'],
    ];

    $functions = new Add();
    $response = $functions->updateBook($params);

    header('Location:../adminResurces/adminPage.php');


}

header('Location:../adminResurces/adminPage.php');

?>