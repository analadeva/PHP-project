<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';

    $params = [
        'id' => $_POST['id'],
        'category' => $_POST['category'],
    ];

    $functions = new Add();
    $response = $functions->update($params);

    header('Location:../adminResurces/addCategory.php');


}

header('Location:../adminResurces/addCategory.php');

?>