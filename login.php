<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css">
    <title></title>
  </head>
  <body>
    <header>
      <?php
          require 'header.php';
       ?>
    </header>
      <main>
        <?php
         if (isset($_SESSION['userid'])) {
          header("Location: myaccount.php?page=3");
          exit();
         }else
         {
           echo '<div class="main-header">
          <div class="logo card">
            <h1>Dhedpad <span class="border-bro"> Brothers</span> </h1>
          </div>
          <div class="form card">
            <h1>Welcome to Dhedpad Brothers</h1>
            <h3>Login to your account to continue</h3>
            <form action="login_check.php" method="post">
            <p><input type="text" name="email" placeholder="Your Email"></p>
            <p><input type="password" name="pass" placeholder="Your Password"></p>
            <p><button type="submit" name="login_btn">Login</button></p>
            <p>New to Dhedpad Brothers? <a href="signup.php?page=3">Sign up!</a></p>
            </form>
          </div>
        </div>'; }?>

      </main>
      <footer>
        <?php
            require 'footer.php';
         ?>
      </footer>
  </body>
</html>
