<?php session_start(); ?>
 <!DOCTYPE html>
 
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>login form</title>
  </head>
  <body>
    <!-- <div class="navbar n">
        <?php 
          if(!isset($_SESSION['u_id'])){?>
          <li><a href="index.php">Home</a></li>
        <?php } ?>
    </div> -->
     
    <div id="image">
      <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>  
          <?php if (isset($_SESSION['u_id'])) {  ?>
            <form class="form-inline my-2 my-lg-0" action="include/logout.inc.php" method="POST">
              <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" >Logout</button>
            </form>  
          <?php } else {?>
        </div>
    </nav>
      <div class="container">
           <form action="include/login.inc.php" method="POST" class="signin">
            <h2 class="heading">Sign In </h2>
            <input type="text" name="uid" id="inputEmail" class="form-control" placeholder="enter name" required autofocus> <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="enter password" required> <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
          </form>
          <p>Don't have an account?</p><a href="#">Sign Up Here</a>

        <?php }?>
      </div>
  </div>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
