<?php

  if(isset($_POST['signup_btn']))
  {
    require 'db_conn.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pass'];
    $confirm_pwd = $_POST['confirm_pass'];
    $phone = $_POST['phone'];

    if($pwd != $confirm_pwd)
    {
      header("Location: signup.php?error=passwordcheck&fname=".$fname."&lname=".$lname."&email=".$email."&phone=".$agree);
      exit();
    }

    if(empty($phone) || empty($fname) || empty($email) || empty($pwd) || empty($confirm_pwd))
    {
      header("Location: signup.php?error=emptyfields&fname=".$fname."&lname=".$lname."&email=".$email."&phone=".$phone);
      exit();
    }
    else {
      $sql = "SELECT email FROM users WHERE email=?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: signup.php?error=sqlerror");
        exit();
      }else {
          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if($resultCheck > 0)
          {
            header("Location: signup.php?error=usertaken&fname=".$fname."&lname=".$lname."&phone=".$phone);
            exit();
          }else
          {
            $sql = "INSERT INTO users(fname,lname,email,password,phone) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              header("Location: signup.php?error=inserterror");
              exit();
            } else {
              mysqli_stmt_bind_param($stmt, "sssss", $fname,$lname,$email,$pwd,$phone);
              mysqli_stmt_execute($stmt);
              header("Location: signup.php?page=3&signup=success");
              exit();
            }
          }
      }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else {
    header("Location: signup.php?page=3");
    exit();
  }
