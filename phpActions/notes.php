<?php
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $_POST['notess'];
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user'];

    $notes = new Add();
    $notes->setNewNote($note);
    $notes->setBookId($book_id);
    $notes->setUserId($user_id);

    $notes->note();
    header('Location:../singleBook.php?id='.$book_id.'&user='.$user_id.'');
}

?>