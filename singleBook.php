<?php
require_once __DIR__ . './classes/DB.php';
require_once __DIR__ . './classes/AdminWork.php';

$bookId = $_GET['id'];
$userId = $_GET['user'];

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
$notes = $fun->getNote();
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
        <style>
          footer {

  left: 0;
  bottom: 0;
  width: 100%;
}
        </style>
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
        <a class="nav-link" href="page.php?user=<?= $bookId ?>">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
        <a href="./index.php">Log out</a>
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-6">
                        <form action="./phpActions/comment.php" method="POST">
                            <input type="text" name="book_id" value="<?= $bookId ?>" hidden>
                            <input type="text" name="user" value="<?= $userId ?>" hidden>
                            <label for="comment">Add your comment</label>
                            <input type="text" placeholder="You can only leave one comment" name="comment" class="mb-4 border rounded pl-2 w-50" id="comment"required>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-6">
                    <form action="./phpActions/notes.php" method="POST">
                    <input type="text" name="book_id" value="<?= $bookId ?>" hidden>
                    <input type="text" name="user" value="<?= $userId ?>" hidden>
                    <label for="notes">Add your notes</label>
                    <input type="text" placeholder="Notes" name="notess" class="mb-4 border rounded pl-2 w-50" id="notes"required>
                    <button type="submit">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="container">
        <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book title</th>
      <th scope="col">Note</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($notes as $note){
        if($bookId === $note['book_id']){
          if($userId === $note['user_id']){
            if($note['is_deleted'] == 0){
          echo'<tr>
        <th>'.$note['id'].'</th>
        <td>'.$note['title'].'</td> 
        <td>'.$note['note'].'</td> 
        <td>
         <a href="./phpActions/editnote.php?id='.$note['id'].'&user='.$note['user_id'].'&book='.$bookId.'&userr='.$userId.'" class="btn btn-warning mx-1">Edit</a>
         <a href="./phpActions/deletenote.php?id='.$note['id'].'&user='.$note['user_id'].'&data=notes&book='.$bookId.'&userr='.$userId.'" class="btn btn-danger mx-1">Delete</a>
        </td>
        </tr>';
            }
             
        }
          }
          
      }
      
      ?>
  </tbody>
</table>

<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book title</th>
      <th scope="col">Comment</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($comments as $comment){
        if($bookId === $comment['book_id']){
          if($userId === $comment['user_id']){
            if($comment['is_deleted']==0){
              if($comment['sett']==0){
            echo'
            <tr class="text-warning">
        <th>'.$comment['id'].'</th>
        <td>'.$comment['title'].'</td> 
        <td>'.$comment['comment'].'</td> 
        <td>
         <a href="./phpActions/deletecomment.php?id='.$comment['id'].'&user='.$comment['user_id'].'&data=comments&book='.$bookId.'&userr='.$userId.'" class="btn btn-danger mx-1">Delete</a>
        </td>
        <td> 
        <p>Waiting for approval</p>
        </td>
        </tr>';
          }
            }
            if($comment['is_deleted']==0){
              if($comment['sett']==1){
            echo'<tr">
        <th>'.$comment['id'].'</th>
        <td>'.$comment['title'].'</td> 
        <td>'.$comment['comment'].'</td> 
        <td>
        <a href="./phpActions/deletenote.php?id='.$comment['id'].'&user='.$comment['user_id'].'&data=comments&book='.$bookId.'&userr='.$userId.'" class="btn btn-danger mx-1">Delete</a>
        </td>
        </tr>';
          }
            }
          
          }}
         
      }
      
      ?>
  </tbody>
</table>
        </div>
        </main>

        <footer id="myFooter" class="bg-dark text-center p-4 text-white"></footer>

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
    fetch('http://api.quotable.io/random')
      .then(response => response.json())
      .then(data => {
        const footer = document.createElement('footer');

        footer.textContent = `"${data.content}" - ${data.author}`;

        document.getElementById('myFooter').appendChild(footer);
      })
      .catch(error => {
        console.log('Error fetching quote:', error);
      });
  </script>
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>