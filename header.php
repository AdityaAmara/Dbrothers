<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/header.css">
  </head>
  <body>
    <header>
          <a href="index.php?page=1" class="header-logo">Dhedped Brothers</a>
      <nav>
        <ul>
          <?php

              if(isset($_GET['page']))
              {
              switch ($_GET['page'])
              {
                case 1: echo '<li><a class= "active" href="index.php?page=1">Home</a></li>
                     <li><a href="destinations.php?page=2">Destinations</a></li>
                     <li><a href="login.php?page=3">My Account</a></li>';
                  break;
               case 2: echo '<li><a href="index.php?page=1">Home</a></li>
                       <li><a class= "active" href="destinations.php?page=2">Destinations</a></li>
                       <li><a href="login.php?page=3">My Account</a></li>';
                    break;
               case 3: echo '<li><a href="index.php?page=1">Home</a></li>
                         <li><a href="destinations.php?page=2">Destinations</a></li>

                         <li><a class= "active" href="login.php?page=3">My Account</a></li>';
                      break;

              } }
              else {
                echo '<li><a class= "active" href="index.php?page=1">Home</a></li>
                     <li><a href="destinations.php?page=2">Destinations</a></li>
                     <li><a href="login.php?page=3">My Account</a></li>';
              }

           ?>
        </ul>
        <?php
        if(isset($_GET['uid'])){
          echo '<a href="logout.php" class="header-login">Logout</a>';
        }else {
          echo '<a href="login.php?page=3" class="header-login">Login</a>';
        }

         ?>

      </nav>
    </header>
    <main>

    </main>
  </body>
</html>
