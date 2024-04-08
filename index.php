<?php

require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/AdminWork.php';



$fun = new Add;
$authors = $fun->getDropdown('authors');
$categories = $fun->getDropdown('categories');
$books = $fun->getBook();
$categoris = $fun->getCategory();

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
        <style>
          <?php include 'style.css'; ?>
        </style>
        <!-- Latest Font-Awesome CDN -->
        <script src="https://kit.fontawesome.com/3257d9ad29.js" crossorigin="anonymous"></script>
    </head>
    <body>

    <!-- NAVBAR -->
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

        <!-- FILTER -->
<h4 class="text-center m-3">Filter area</h4>
<div class="filters text-center">
    <input type="checkbox" class="filter-checkbox" value="all" checked hidden>
    <?php
    foreach ($categoris as $category) {
        echo '<label><input type="checkbox" class="filter-checkbox" value="' . $category['category'] . '">' . $category['category'] . '</label>';
    }
    ?>
</div>

    <hr>
    <h1 class="text-center m-5">BOOKS</h1>
  <div class="container">
    <?php
    $counter = 0;
    foreach($books as $book){
      if($book['is_deleted']==0){
        if ($counter % 3 == 0) {
        echo '<div class="row">';
      }
      
      echo '<div class="col-md-4 mb-4 book '.$book['category'].' ">
              <div class="border">
                <img class="w-100" src="'.$book['photo'].'" alt="">
                <h2>'.$book['title'].'</h2>
                <p>By '.$book['full_name'].'</p>
                <p>'.$book['category'].'</p>
                <a href="./book.php?id='.$book['id'].'">Learn more...</a>
              </div>
            </div>';
      $counter++;
      
      if ($counter % 3 == 0) {
        echo '</div>';
      }
      }
      
    }
    if ($counter % 3 != 0) {
      echo '</div>';
    }
    ?>
  </div>
  
        </main>

        <footer id="myFooter" class="bg-dark text-center p-4 text-white"></footer>
        
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script>
  $(document).ready(function(){
  $('.filter-checkbox').on('change', function(){
    let selectedCategories = [];
    $('.filter-checkbox:checked').each(function(){
      let category = $(this).val();
      if(category !== 'all') {
        selectedCategories.push('.' + category);
      }
    });

    if(selectedCategories.length > 0) {
      $('.book').hide();
      $(selectedCategories.join(',')).show();
    } else {
      $('.book').show();
    }
  });
});

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