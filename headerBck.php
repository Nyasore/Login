
<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
  <header>
    <nav>
      <div class="main-wrapper">
        <ul>

          <?php 
            if(!isset($_SESSION['u_id'])){?>
            <li><a href="index.php">Home</a></li>
          <?php } ?>

        </ul>

        <div class="nav-login">
          <?php
            if (isset($_SESSION['u_id'])) {
              echo '<form action="include/logout.inc.php" method="POST">
                    <button type="submit" name="submit">logout</button>
                    </form>';
            }else{
              echo  '<form action="include/login.inc.php" method="POST">
                       <input type="text" name="uid" placeholder="Username/e-mail">
                       <input type="password" name="pwd" placeholder="password">
                       <button type="submit" name="submit">Login</button>
                    </form>

                    <a href="signup.php">Sign Up</a>';
            }

          ?>
        </div>  
            
      </div>
    </nav>
  </header>

