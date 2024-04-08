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
        <style>
          footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
        </style>
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
        <a class="nav-link" href="./index.php">Home<span class="sr-only">(current)</span></a>
      </li> -->
    </ul>
    <span class="navbar-text">
        <a href="./index.php">Log out</a>
    </span>
  </div>
</nav>
</header>

<main>  
            <!-- ADMINISTRATOR -->
        <!-- analadeva - bakik9aja -->
        
        <div class="container bg-light d-flex flex-column text-center p-5 mt-5">
            <h1>Login Form</h1>
            <span class="text-danger">
                <?php
                   if(isset($_GET['errorMessage'])){
                     echo $_GET['errorMessage'];
                   }
                  ?>
                </span>
            <span class="text-danger">
                <?php
                   if(isset($_GET['emptyMessage'])){
                     echo $_GET['emptyMessage'];
                   }
                  ?>
                </span>
            <form action="./phpActions/loginAction.php" method="POST" class="m-4">
                <label for="username">Enter your username</label>
                <input type="text" placeholder="@username" name="username" class="mb-4 border rounded pl-2 w-50" id="username"><br>
                <label for="password">Enter your password</label>
                <input type="text" placeholder="password" name="password" class="mb-4 border rounded pl-2 w-50" id="password"><br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="./signin.php">Don't have an account? <br> Sign in</a>

        </div>
       </main>
       <footer id="myFooter" class="bg-dark text-center p-4 text-white"></footer>
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
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>