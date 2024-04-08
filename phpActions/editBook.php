<?php
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';

$fun = new Add;
$authors = $fun->getDropdown('authors');
$categories = $fun->getDropdown('categories');
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
        <a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
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
            <h1>Add Book</h1>
            <form action="./updateBook.php" method="POST" class="m-4">
            <input type="text" name='id'  value="<?= $_GET['id'] ?>" hidden>
                <label for="title">Book title</label>
                <input type="text" placeholder="title" name="title" class="mb-4 border rounded pl-2 w-50" id="title"required><br>
                <label for="author">Author</label>
                <select name="author" id="author"required>
                  <option value="" selected disabled>Author</option>
                  <?php
                      foreach($authors as $author){
                        echo '<option value="'.$author['id'].'">'.$author['full_name'].'</option>';
                      }
                  ?>
                </select><br>
                <label for="publication">Year of publication</label>
                <input type="number" placeholder="Year of publication (ex.2001)" name="publication" class="mb-4 border rounded pl-2 w-50" id="publication"required><br>
                <label for="pages">Number of pages</label>
                <input type="number" placeholder="Number of pages" name="pages" class="mb-4 border rounded pl-2 w-50" id="pages"required><br>
                <label for="photo">Cover photo</label>
                <input type="url" placeholder="Photo url" name="photo" class="mb-4 border rounded pl-2 w-50" id="photo"required><br>
                <label for="category">Category</label>
                <select name="category" id="category"required>
                  <option value="" selected disabled>Category</option>
                  <?php
                      foreach($categories as $category){
                        echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
                      }
                  ?>
                </select><br>                
                <button type="submit" class="mt-3 btn btn-success">ADD</button>
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