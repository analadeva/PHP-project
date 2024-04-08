<?php
$book = $_GET['book'];
$userr = $_GET['userr'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- CSS script -->
        <link rel="stylesheet" href="style.css">
        <!-- Latest Font-Awesome CDN -->
        <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Brainster Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="../singleBook.php?id=<?= $book?>&user=<?= $userr ?>">Home<span class="sr-only">(current)</span></a>

      </li>
    </ul>
    <span class="navbar-text">
        <a href="./index.php">Log out</a>
    </span>
  </div>
</nav>
</header>

<main>
<div class="container bg-light d-flex flex-column text-center p-5 mt-5">
            <h1>Edit Note</h1>
            <form action="../phpActions/updateNote.php" method="POST" class="m-4">
            <input type="text" name='book'  value="<?= $_GET['book'] ?>" hidden>
            <input type="text" name='userr'  value="<?= $_GET['userr'] ?>" hidden>
                <input type="text" name='id'  value="<?= $_GET['id'] ?>" hidden>
                <input type="text" name='user'  value="<?= $_GET['user'] ?>" hidden>
                <label for="note">Edit note</label>
                <input type="text" placeholder="Note" name="note" class="mb-4 border rounded pl-2 w-50" id="note"required><br>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
</main>
        
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>