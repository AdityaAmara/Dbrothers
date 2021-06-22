<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>

<div class="wrapper-2">

    <header>
      <?php
          require 'header.php';
       ?>
    </header>

  <main>
        <section class="index-banner">
          <div class="vertical-center">
            <h2>“LIFE IS EITHER A DARING <br>ADVENTURE OR NOTHING AT ALL !!”</h2>
            <h1>Travel Now with your friends in our beautiful destinations and make more memories</h1>
          </div>
        </section>
</div>
<div class="wrapper">
        <section class="destinations-table">

          <?php

          require 'db_conn.php';

              $trips = array(1,2,3,4);
              for ($i=0; $i < count($trips) ; $i++) {
                $sql = "SELECT * FROM destinations where id='$trips[$i]'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<div class="gallery">
                  <div class="imgBx">
                    <img src="admin/destinations_img/D'.$row['id'].'_1.jpg">
                  </div>

                  <div class="desc">
                    <h3>'.$row['dname'].'</h3>';
                    if($row['duration']>1)
                    {
                      echo '<h4>Duration: '.$row['duration'].' Days</h4>';
                    }else{
                      echo '<h4>Duration: '.$row['duration'].' Day</h4>';
                    }
                    echo '<h2><span>₹ '.number_format($row['price']).'</span> per person</h2>
                    <a href="destination_x.php?page=2&id='.$row['id'].'">View details</a>
                  </div>
                </div>';
              }
           ?>




        </section>
      </main>

   </div>

   <div class="wrapper-2">
    <footer>
      <?php
          require 'footer.php';
       ?>
    </footer>
 </div>
  </body>
</html>
