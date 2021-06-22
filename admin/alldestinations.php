<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Destinations</title>
    <style>
      table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
      if($_SESSION['adminid']==999)
      {
        require 'dashboard_header.php';
      }
    }else {
        header("Location: admin.php");
        exit();
     }
    ?>
    <form action="" method="post" align="center">
      Destinations of: <select name="dcat"> <br>
                   <option value="1" name="North">North</option>
                   <option value="2" name="East">East</option>
                   <option value="3" name="West">West</option>
                   <option value="4" name="South">South</option>
                </select> <br>
          <input type="submit" name="search" value="SEARCH">
    </form>

          <?php
          if(isset($_POST['search']))
          {
            switch ($_POST['dcat']) {
              case 1: $dest_cat='North';break;
              case 2: $dest_cat='East';break;
              case 3: $dest_cat='West';break;
              case 4: $dest_cat='South';break;

              default: $dest_cat='';break;
            }
            echo '<h2 align="center">'.$dest_cat.' Destinations in the Database</h2>
            <table style="width:90%" align="center">
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>DURATION</th>
                    <th>RATING</th>
                    <th>OVERVIEW</th>
                    <th>PHOTOS</th>
                    <th>PDF</th>
                  </tr>';

            $dcat = $_POST['dcat'];
            require 'admin_conn.php';

            $sql = "SELECT * FROM destinations WHERE dcategory='$dcat'";
            $result = mysqli_query($conn, $sql);
            //multiple rows
            while($row = mysqli_fetch_assoc($result))
            {
              echo '<tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['dname'].'</td>
                  <td>'.$row['price'].'</td>
                  <td>'.$row['rating'].'</td>
                  <td>'.$row['duration'].'</td>
                  <td>'.$row['overview'].'</td>
                  <td>destinations_img/D'.$row['id'].'_1/2/3/.. </td>
                  <td>destinations_pdf/D_'.$row['id'].'.pdf </td>
                </tr>';
            }

          }
           ?>
     </table>
  </body>

</html>
