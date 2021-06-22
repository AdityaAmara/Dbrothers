<html lang="en" dir="ltr">
  <head>
    <meta charset="utf8">
    <title>Admin Panel</title>
  </head>
  <body>
   <?php
    require 'dashboard_header.php';
     session_start();
     if(isset($_SESSION['adminid']))
     {
       if($_SESSION['adminid']==999)
       {
         require 'admin_conn.php';

         echo 'Hi Admin';
         echo '<form action=" " method="post" style="text-align-last: left">
           Destination Name: <input type="text" name="dname"> <br> <br>
           Destination Category: <select name="dcategory"> <br> <br>
                        <option value="1" name="North">North</option>
                        <option value="2" name="East">East</option>
                        <option value="3" name="West">West</option>
                        <option value="4" name="South">South</option>
                     </select> <br> <br>
            Price (per person): <input type="text" name="price"> <br> <br>
            Rating: <select name="rating"> <br> <br>
                         <option value="1" name="1">1</option>
                         <option value="2" name="2">2</option>
                         <option value="3" name="3">3</option>
                         <option value="4" name="4">4</option>
                         <option value="5" name="5">5</option>
                      </select> <br> <br>
            Duration: <input type="text" name="duration"> <br> <br>
            Overview: <textarea name="overview" rows="20" cols="100"></textarea> <br>
            ';
            if(isset($_GET['dest']))
            {
                if($_GET['dest']==='success' && !isset($_GET['photos']))
                {
                  echo '</form>';
                  echo '<h3> Please Upload Photos for the updated DESTINATION !! <br> </h3>';
                  echo '<form action="" method="POST" enctype="multipart/form-data">
                      <input type="file" name="image[]" multiple>
                      <input type="submit" name="photo_submit" value="upload">
                    </form>';
                }else if(isset($_GET['photos'])){
                  echo '</form>';
                  echo '<h3> Please Upload PDF for the updated DESTINATION !! <br> </h3>';
                  echo '<form action="" method="POST" enctype="multipart/form-data">
                      <input type="file" name="pdf">
                      <input type="submit" name="pdf_submit" value="upload">
                    </form>';
                }
            }
            else
            {
                echo '<br> <input type="submit" name="add_dest" value="ADD DESTINATION DETAILS">
             </form>';
            }

         if(isset($_POST['add_dest']))

         {

           $dname = $_POST['dname'];
           $dcategory = $_POST['dcategory'];
           $price = $_POST['price'];
           $rating = $_POST['rating'];
           $duration = $_POST['duration'];
           $overview = $_POST['overview'];

               if(empty($dname) || empty($dcategory) || empty($price) || empty($duration) || empty($overview) || empty($rating))
               {
                 echo '<script> alert("Empty Fields !! All fields are mandatory") </script>';
               }
               else
               {
                 $sql = "INSERT INTO destinations(dname,dcategory,price,rating,duration,overview) VALUES (?,?,?,?,?,?)";
                 $stmt = mysqli_stmt_init($conn);
                     if(!mysqli_stmt_prepare($stmt,$sql))
                     {
                       header("Location: dashboard.php?error=inserterror");
                       exit();
                     }
                     else
                     {
                       mysqli_stmt_bind_param($stmt, "siiiis", $dname,$dcategory,$price,$rating,$duration,$overview);
                       mysqli_stmt_execute($stmt);
                       header("Location: dashboard.php?dest=success");
                       exit();
                     }
               }

           }
         echo '<form action="admin_logout.php" method="post">
           <input type="submit" name="logout" value="Logout">
         </form>';
       }
     }
     else {
        header("Location: admin.php");
         exit();
     }
    ?>
  </body>
</html>
<?php
  if(isset($_POST['photo_submit'])){

    $fileCount = count($_FILES['image']['name']);
    if($fileCount != 0 && $fileCount <= 6)
    {
      $sql = "SELECT * FROM destinations WHERE id=(SELECT max(id) FROM destinations)";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $id = $row['id'];
      for ($i=0; $i < $fileCount ; $i++)
      {
        $allowed_ext = array('jpg','jpeg','png');
        $ext = explode(".",$_FILES['image']['name'][$i]);
        if(in_array(end($ext),$allowed_ext))
        {
            $name = 'D'.$id.'_'.($i+1).'.'.end($ext);
            $path = 'destinations_img/'.$name;
            move_uploaded_file($_FILES['image']['tmp_name'][$i], $path);
            header("Location: dashboard.php?dest=success&photos=success");
        }
        else
        {
              echo '<script> alert("Invalid Image File!! Only .jpg/jpeg/png is allowed") </script>';
        }

      }
      exit();
    }else {
      echo '<script> alert("Please Select Photos (MAX = 6)!!") </script>';
    }
  }
 ?>
 <?php
   if(isset($_POST['pdf_submit'])){

     if($_FILES['pdf']['name'])
     {
       $sql = "SELECT * FROM destinations WHERE id=(SELECT max(id) FROM destinations)";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
       $id = $row['id'];
       $allowed_ext = 'pdf';
       $ext = explode(".",$_FILES['pdf']['name']);
         if(end($ext) == $allowed_ext)
         {
             $name = 'D_'.$id.'.'.end($ext);
             $path = 'destinations_pdf/'.$name;
             move_uploaded_file($_FILES['pdf']['tmp_name'], $path);
             header("Location: dashboard.php");
         }
         else
         {
               echo '<script> alert("Invalid PDF File!! Only .pdf is allowed") </script>';
         }
       exit();
     }else {
       echo '<script> alert("Please Select PDF (MAX = 1)!!") </script>';
     }
   }
  ?>
