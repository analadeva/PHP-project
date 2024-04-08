<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';

    $params = [
        'id' => $_POST['id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'biography' => $_POST['biography'],
    ];

    $functions = new Add();
    $response = $functions->edit($params);

    header('Location:../adminResurces/addAuthor.php');


}

header('Location:../adminResurces/addAuthor.php');

?>