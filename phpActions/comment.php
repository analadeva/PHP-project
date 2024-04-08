<?php
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user'];
    $set = 0;

    $comments = new Add();
    $comments->setNewComment($comment);
    $comments->setBookId($book_id);
    $comments->setUserId($user_id);
    $comments->setter($set);


    $comments->coment();
    header('Location:../singleBook.php?id='.$book_id.'&user='.$user_id.'');
}

?>