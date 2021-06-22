<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/destinations.css">
  </head>
  <body>
    <header>
      <?php
          require 'header.php';
       ?>
    </header>
<main>

  <div class="bg-modal">
    <h2 class="modal-heading">Home > Destinations</h2>
  </div>

  <div class="destinations-list">

    <section class="pictures-banner">
      <div class="vertical-center">

      </div>
    </section>

    <div class="wrapper">
        <div class="sidebar">
            <h2>Destinations</h2>
            <ul>
                <li><a href="destinations.php?page=2&cat=1"></i>North</a></li>
                <li><a href="destinations.php?page=2&cat=4"></i>South</a></li>
                <li><a href="destinations.php?page=2&cat=2">East</a></li>
                <li><a href="destinations.php?page=2&cat=3">West</a></li>
            </ul>

            <?php for ($i=0; $i < 3 ; $i++) {
              echo '<div class="remaining-space">
                </div>';
            } ?>


        </div>

        <div class="dest-boxes">

          <?php

            require 'db_conn.php';

            if(isset($_GET['cat'])){
              $cat = $_GET['cat'];
            }else {
              $cat = 1;
            }

            $sql = "SELECT * FROM destinations where dcategory='$cat'";
            $result = mysqli_query($conn, $sql);
            $no_of=0;
            while($row = mysqli_fetch_assoc($result))
            {
                $no_of++;
                echo '<div class="box">
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
          <?php
          if($no_of==0)
          {
            echo '<h1 class="noofresults"> No Results :( </h1>';
          }
         ?>

        </div>
          </div>
  </div>

    </main>

    <footer>
      <?php
          require 'footer.php';
       ?>
    </footer>
  </body>
</html>
