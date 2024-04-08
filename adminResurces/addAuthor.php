<?php
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/AdminWork.php';

$aut = new Add;
$authors = $aut->getAuthor();

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
  position: fixed;
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
  <a class="navbar-brand" href="../index.php">Brainster Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./adminPage.php">Home<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
        <a href="../login.php">Log out</a>
    </span>
  </div>
</nav>
</header>
<main>          
        <div class="container bg-light d-flex flex-column text-center p-5 mt-5">
            <h1>Add Author</h1>
            <form action="../phpActions/author.php" method="POST" class="m-4">
                <label for="first_name">First Name</label>
                <input type="text" placeholder="first_name" name="first_name" class="mb-4 border rounded pl-2 w-50" id="first_name"required><br>
                <label for="last_name">Last Name</label>
                <input type="text" placeholder="last_name" name="last_name" class="mb-4 border rounded pl-2 w-50" id="last_name"required><br>
                <label for="biography">Short Biography</label>
                <input type="text" placeholder="short biography(40)" name="biography" class="mb-4 border rounded pl-2 w-50" id="biography"required><br>
                <button type="submit" class="btn btn-success">ADD</button>
            </form>
        </div>

        <div class="container">
        <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Bio</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($authors as $autor){
        if($autor['is_deleted'] == 0){
          echo'<tr>
        <th>'.$autor['id'].'</th>
        <td>'.$autor['full_name'].'</td>
        <td>'.$autor['biography'].'</td> 
        <td>
         <a href="../phpActions/editAuthor.php?id='.$autor['id'].'" class="btn btn-warning mx-1">Edit</a>
         <a href="../phpActions/delete.php?id='.$autor['id'].'&data=authors" class="btn btn-danger mx-1">Delete</a>
        </td>
        </tr>';
        }
        
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