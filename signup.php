<?php
  session_start();
 ?>
<html lang="en">

<head>
    <title>Sign up Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
  <header>
    <?php
        require 'header.php';
     ?>
  </header>
<?php
  if(isset($_GET['signup']))
 {
      if($_GET['signup']=='success')
      {
        echo '<div class="bg-modal">
          <div class="modal-content">
            <img src="img/Tick.png">
            <p>You are Registered in Dhedpad Brothers DataBase !!!</p>
            <br>
            <p>Please Login and Book your travel. Have a nice day :)</p>
            <br> <br>
            <form action="login.php?page=3" method="post">
              <button type="Submit" name="login">Login</button>
            </form>
          </div>
        </div>';
      }
 }
  ?>
  <main>
    <div class="main-header">
      <div class="logo card">
        <h1>Dhedpad <span class="border-bro"> Brothers</span> </h1>
      </div>
      <div class="form card">
        <h1>Welcome to Dhedpad Brothers</h1>
        <h3>Sign up to create your account</h3>
        <form action="signup_check.php" method="post">
        <p><input type="text" name="fname" placeholder="First Name"></p>
        <p><input type="text" name="lname" placeholder="Last Name"></p>
        <p><input type="text" name="email" placeholder="Email"></p>
        <p><input type="password" name="pass" placeholder="Password"></p>
        <p><input type="password" name="confirm_pass" placeholder="Confirm Password"></p>
        <p><input type="text" name="phone" placeholder="Phone Number"></p>
        <p><button type="submit" name="signup_btn">Signup</button></p>
        <p>Already have account? <a href="login.php?page=3">Login</a></p>
        </form>
      </div>
    </div>
</form>
</main>
<footer>
  <?php
      require 'footer.php';
   ?>
</footer>
</body>
</html>
