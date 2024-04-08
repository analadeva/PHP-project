 <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once __DIR__ . '/../classes/DB.php';
    require_once __DIR__ . '/../classes/AdminWork.php';

    $functions = new Add();

    if (isset($_GET['id'])) {
        echo "<script>
                if (confirm('You want to delete this book? With deleting this book, you are deleting all comments and notes related with this book.')) {
                    window.location.href = 'deleteItem.php?id={$_GET['id']}';
                } else {
                    window.location.href = '../adminResurces/adminPage.php';
                }
            </script>";
        die();
    }
}

header('Location:../adminResurces/adminPage.php');
die();
?>