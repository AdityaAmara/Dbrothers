<?php

  if(isset($_POST['admin']) && isset($_POST['pass']))
   {
     $name = $_POST['admin'];
     $pass = $_POST['pass'];
    if($name =='admin' && $pass=='dhedped')
    {
        session_start();

        $_SESSION['adminid'] = 999;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "Hi";
    }
  }
  else
  {
    header("Location: admin.php");
    exit();
  }

?>
