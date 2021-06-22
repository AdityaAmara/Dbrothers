<?php
session_start();
 ?>
<html>
    <head>
        <title>
            Admin Login
        </title>
    </head>
    <body style="padding-top: 180pt">
        <fieldset>
            <h1 style="text-align: center">
                Welcome Admin </h1>
            <br>
            <form action="admin_check.php" method="post" style="text-align-last: center">
              <input type="text" name="admin" placeholder="Username">
              <br> <br>
              <input type="password" name="pass" placeholder="Password">
              <br> <br>
              <input type="submit" name="login" value="Login">
            </form>
         </fieldset>
    </body>
</html>
