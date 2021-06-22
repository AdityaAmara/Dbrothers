<?php

  if(isset($_POST['login_btn']))
  {
    require 'db_conn.php';

    $email = $_POST['email'];
    $pwd = $_POST['pass'];

    if(empty($email) || empty($pwd))
    {
      header("Location: login.php?error=emptyfields&page=3&email=".$email);
      exit();

    }else {
          $sql = "SELECT * FROM users WHERE email = '$email' ";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

          if($row > 0)
          {
            if($pwd != $row['password'])
            {
              header("Location: login.php?error=wrongpassword");
              exit();
            }
            else{
              session_start();
              $_SESSION['userid'] = $row['user_id'];

              header("Location: login.php?login=success&page=3");
              exit();
            }
          }
          else {
            header("Location: login.php?error=nouserexists");
            exit();
          }

    }

  }
  else {
    header("Location: login.php");
    exit();
  }
