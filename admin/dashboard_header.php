<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/dashboard_header.css">
  </head>
  <body>
    <header>
          <h2 class="header-logo">Admin Panel</h2>
      <nav>
        <ul>
          <?php
              if(isset($_GET['nav']))
              {
              switch ($_GET['nav'])
              {
                case 1: echo '<li><a class = "active" href="dashboard.php?nav=1">Home</a></li>
                <li><a href="alldestinations.php?nav=2">View Destinations</a></li>
                <li><a href="dashboard.php?nav=3">View Bookings</a></li>
                <li><a href="dashboard.php?nav=4">View Transactions</a></li>';
                  break;
               case 2: echo '<li><a href="dashboard.php?nav=1">Home</a></li>
               <li><a class = "active" href="alldestinations.php?nav=2">View Destinations</a></li>
               <li><a href="dashboard.php?nav=3">View Bookings</a></li>
               <li><a href="dashboard.php?nav=4">View Transactions</a></li>';
                    break;
               case 3: echo '<li><a href="dashboard.php?nav=1">Home</a></li>
               <li><a href="alldestinations.php?nav=2">View Destinations</a></li>
               <li><a class = "active" href="dashboard.php?nav=3">View Bookings</a></li>
               <li><a href="dashboard.php?nav=4">View Transactions</a></li>';
                      break;
               case 4: echo '<li><a href="dashboard.php?nav=1">Home</a></li>
               <li><a href="alldestinations.php?nav=2">View Destinations</a></li>
               <li><a href="dashboard.php?nav=3">View Bookings</a></li>
               <li><a class = "active" href="dashboard.php?nav=4">View Transactions</a></li>';

              } }
              else {
                echo '<li><a class = "active" href="dashboard.php?nav=1">Home</a></li>
                <li><a href="alldestinations.php?nav=2">View Destinations</a></li>
                <li><a href="dashboard.php?nav=3">View Bookings</a></li>
                <li><a href="dashboard.php?nav=4">View Transactions</a></li>';
              }

           ?>
       </ul>
     </nav>
   </header>
  </body>
</html>
