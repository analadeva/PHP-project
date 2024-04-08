<?php
require_once __DIR__ . './classes/DB.php';
require_once __DIR__ . './classes/AdminWork.php';

$bookId = $_GET['id'];
$conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $bookss = $connection->prepare('SELECT books.title, books.publication, books.pages, books.photo, authors.full_name AS author, categories.category AS categori
        FROM books 
        JOIN authors ON books.author = authors.id 
        JOIN categories ON books.categori = categories.id 
        WHERE books.id = :id');
$bookss->bindParam(':id', $bookId, PDO::PARAM_INT);
$bookss->execute();
$book = $bookss->fetch();

$fun = new Add;
$comments = $fun->getComment();

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
      <!-- <li class="nav-item active">
        <a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
      </li> -->
    </ul>
    <span class="navbar-text">
        <a href="./login.php">Log in</a>
    </span>
  </div>
</nav>
        </header>
        <main>
            <div class="container text-center mt-5">
                <h1><?= $book['title']?></h1>
                <h4>By <?= $book['author']?></h4>
                <img src="<?= $book['photo']?>" alt="" class="mb-3 w-25">
                <p><b>Category: <?= $book['categori']?></b></p>
                <p>Year of publication: <?= $book['publication']?></p>
                <p>Number of pages: <?= $book['pages']?></p>
            </div>

            <div class="container">
        <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book title</th>
      <th scope="col">Comment</th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($comments as $comment){ 
        if($comment['book_id']===$bookId) {
          if($comment['sett']==1){
            if($comment['is_deleted']==0){
              echo'<tr">
      <th>'.$comment['id'].'</th>
      <td>'.$comment['title'].'</td> 
      <td>'.$comment['comment'].'</td> 
      </tr>';
            }
          
        }
        }   
        
          }
      
      ?>
  </tbody>
</table>
    </div>
            
        </main>
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>