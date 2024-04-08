<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';


    if(isset($_POST['id'], $_POST['note'], $_POST['user'])) {
        $params = [
            'id' => $_POST['id'],
            'note' => $_POST['note'],
            'user_id' => $_POST['user']
        ];
    
        $functions = new Add();
        $response = $functions->updateNote($params);
    }
    
//header('Location:../singeBook.php?id='.$_POST['id'].'&user='.$_POST['user'].'');


}

header('Location:./editnote.php?id='.$_POST['id'].'&user='.$_POST['user'].'&book='.$_POST['book'].'&userr='.$_POST['userr'].'');

?>