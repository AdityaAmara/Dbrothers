<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/myaccount.css">
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
        if (isset($_SESSION['userid']))
        {
                 echo "Hi USER ID = ".$_SESSION['userid']."<br> <br>" ;
                 echo "You are Logged in !!!";
        }
      ?>

        

      </main>
      <footer>
        <?php
            require 'footer.php';
         ?>
      </footer>
  </body>
</html>
