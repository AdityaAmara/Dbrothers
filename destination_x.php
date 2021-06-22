<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/destination_x.css">
  </head>
  <body>
    <header>
      <?php
          require 'header.php';
       ?>
    </header>
<main>

    <?php
      require 'db_conn.php';

      if(isset($_GET['id']))
      {
        $id = $_GET['id'];
      }
      else {
        $id = 1;
      }

      $sql = "SELECT * FROM destinations WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if($row>0)
      {
        switch ($row['dcategory'])
         {
          case 1: $category = 'North'; break;
          case 2: $category = 'East'; break;
          case 3: $category = 'West'; break;
          case 4: $category = 'South'; break; }

          echo '<div class="bg-modal">
            <h2 class="modal-heading">Destinations > '.$category.' India > </h2>
            <div class="modal-content">
            <h2>'.$row['dname'].'</h2>
            <p>₹ '.number_format($row['price']).' per person</p>
            <p>Rating:';for ($i=0; $i < $row['rating']; $i++) {echo '<img src="img/star.png">';}
            echo '</p>
              <p>Duration:';
              if($row['duration']>1){
                echo $row['duration'].' Days</p>
                     </div>
                     </div>';
              }
              else{
                echo $row['duration'].' Day</p>
                     </div>
                     </div>';
              }

        //content
        echo '<div class="destination-info">

          <div class="pictures">
            <img src="admin/destinations_img/D'.$row['id'].'_1.jpg">
          </div>

          <div class="package-heading">
            <h2>'.$row['dname'].'</h2>
            <p><span> ₹ '.number_format($row['price']).'</span>  per person</p>
            <a href="#" class="book-now">Book Now</a>
          </div>

          <div class="navigation-content">
            <a href="#overview">Overview</a>
            <a href="#photos">Photos</a>
            <a href="#package-det">Package Details</a>
          </div>

          <div class="inclusions-exclusions">

            <h3>Inclusions:</h3>
            <article>
              <div>
                <p>
                  1. &nbsp; Accommodation Guest house / Hotel in Leh on Day 1, day 2 and day 8 as per the itinerary Camping/Home stay during the trek.<br>
                  2. &nbsp; Meals while on trek (Veg + Egg)<br>
                  3. &nbsp; Trek equipments: Sleeping bag, mattress, tent (twin sharing), kitchen & dinning tent, toilet tent, utensils and crampon (if required).<br>
                  4. &nbsp; First aid medical kits, stretcher & oxygen cylinder.<br>
                  5. &nbsp; Mountaineering qualified & professional trek Leader, guide, cook and Support staff.<br>
                  6. &nbsp; Transport from Leh guest house to Zinchen and return from Chokdo as per the itinerary.<br>
                  7. &nbsp; Mules to carry the central luggage. <br>
                  8. &nbsp; Permits included.
              </div>
            </article>

            <h3>Exclusions:</h3>
            <a name="overview"></a>
            <article>
              <div>
                <p>
                  1. &nbsp; GST 5% <br>
                  2. &nbsp; Cost escalation due to change in itinerary Natural reason of unforeseen conditions like Landslides, Road Blockage, Bad Weather, Social or Political Unrest, Strikes, sudden shut down of any govt office etc <br>
                  3. &nbsp; Any kind of personal expenses. <br>
                  4. &nbsp; Airfare and pickup and drop from airport. <br>
                  5. &nbsp; Any kind of emergency evacuation charges. <br>
                  6. &nbsp; Necessary permits, entry fees and Foreigner peak booking charges.<br>
                  7. &nbsp; Mules or porter to carry personal luggage.<br>
                  8. &nbsp; Anything not specifically mentioned under the head.
              </div>
            </article>

          </div>


          <div class="destination-overview">

              <h3>Overview</h3>
              <a name="photos"></a>
              <article>
                <div>
                  <p>'.$row['overview'].'</p>
                </div>
              </article>
          </div>


          <a name="package-det"></a>
          <div class="destination-photos">
              <h3>Gallery</h3>
                ';

                //logic needed for showing less images

                for ($i=0; $i < 6; $i++) {
                  if(file_exists('admin/destinations_img/D'.$row['id'].'_'.($i+1).'.jpg')) {
                  echo'<img src="admin/destinations_img/D'.$row['id'].'_'.($i+1).'.jpg">';
                }
                }


                echo '</div>

          <div class="extra">

          </div>

          <div class="package-overview">
              <h3>Package Details</h3>
              <h4>'.$row['dname'].'</h4>
              <a href="admin/destinations_pdf/D_'.$row['id'].'.pdf"><img src="img/pdf.png"></a>
              <p>Price(Per Person): ₹ '.number_format($row['price']).'</p>';
              echo '</p>
                <p>Duration:';
                if($row['duration']>1){
                  echo $row['duration'].' Days</p>';
                }
                else{
                  echo $row['duration'].' Day</p>';
                }

              echo '<a href="destination_x.php?id='.$_GET['id'].'&policy=cancel"><label for="closecnc" class="open-cnc-box">Cancellation Policy</label></a>
          </div>';
        }
    ?>
    <?php
      if(isset($_GET['policy']))
      {
        if($_GET['policy']=="cancel"){
        echo '<div class="cancellationbox">
            <div class="cnc-content">
              <h2>Cancellation Policy</h2>

              <h3>CANCELLATION POLICY</h3>

              <p>Cancellation charges per person <br> <br>

              30 days or more before departure: 25% of total cost <br>
              29 - 20 days before departure: 50% of total cost <br>
              Less than 20 days before departure: 100% of total cost <br> </p>

              <h3>IF WE CHANGE OR CANCEL YOUR ADVENTURE HOLIDAY</h3>

               <p>We do plan the arrangements in advance. It is unlikely that we will have to make any changes to your travel arrangements. Occasionally, we may have to make changes due to Force Majeure Events and we reserve the right to do so at any time before or during the trip.<br>
              If there are any changes, we will advise you of them at the earliest possible date before or during the trip based on the Force Majeure Events.<br>
              We also reserve the right under Force Majeure Events to cancel your travel arrangements / offer alternative dates / revise the itinerary before or during the trip. Any additional cost incurred due to the above-mentioned reasons will have to be borne by the traveller himself. There shall be no refund to the traveller under Force Majeure Events.<br>

              Force Majeure Event shall mean and include any circumstance beyond the reasonable control of Adventure Nation, including without limitation, any act of nature or the public enemy, accident, explosion, fire, storm, earthquake, flood, drought, perils of the sea, casualty, strikes, lock-outs, labour troubles, riots, sabotage, terrorists acts, embargo, war (whether or not declared), governmental actions, delay in issuance or processing of Visa/permit, change of laws and regulations, orders, or decrees, or other causes of like or different character beyond the control of Adventure Nation. </p>

              <h3>IF YOU WANT TO CHANGE YOUR ADVENTURE HOLIDAY PLAN</h3>

              <p>After you make full or partial payment, if you wish to change your travel arrangements in any way (e.g. your chosen departure date or accommodation), we will do our utmost to make these changes but it may not always be possible. Any request for changes must be in writing from the person who made the booking. All cost incurred due to amendment will be borne by the traveller himself. </p>

              <a href="destination_x.php?id='.$_GET['id'].'"><label for="closecnc" class="close-cnc-box">Close</label></a>
            </div>
          </div>'; }
      }

     ?>
     <?php echo '</div>'; ?>
    </main>
    <footer>
      <?php
          require 'footer.php';
       ?>
    </footer>
  </body>
</html>
