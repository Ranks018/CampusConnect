<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Online News Portal/css/bootstrap.min.css">
    <title>Campus Connect</title>
  <style>
    a.nav-link {
      color: gray;
      text-align: left;
    }

    a.nav-link:hover {
      color: darkorchid;
      text-decoration: none;
    }

    .dropdown-item:hover {
      background-color: gray;
      transform: scale(1.05);
    }
  </style>

</head>

<body>





  <?php
  date_default_timezone_set("Africa/Johannesburg");
  $Time = date("h:i:sa");
  //echo $Time;

$Date=date("<b>l,</b> j F Y") . "<br>";
//echo $Date;

?>


  <div class="container" style="margin-top: 50px;">
    
    
  <div class="row " style="background-color: #F5E6FF; margin-top: 20px; height: 150px;">
      <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="../Public/Homepage.php">
            <b><i>Campus Connect</i></b>
          </a>
        </h1>
        <font size="2"><?php echo $Date; ?></font>
      </div>
    
    <nav class="navbar navbar-expand-lg navbar-light">
          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>


            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style=" font-size: 1.2em; font-weight: bold; color: purple;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MENU <span style="font-size: 1.2em; color: purple;">&downarrow;</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../Public/PublicAnnouncementPage.php">Announcement</a>
              <a class="dropdown-item" href="../Public/PublicWebinarsPage.php">Webinars</a>
              <a class="dropdown-item" href="../Public/PublicSeminarPage.php">Seminar</a>
              <a class="dropdown-item" href="../Public/PublicSportsPage.php">Sports</a>
              <a class="dropdown-item" href="../Public/PublicEntertainmentPage.php">Entertainment</a>
              <a class="dropdown-item" href="../Public/PublicLifestylePage.php">Lifestyle</a>
              <a class="dropdown-item" href="../Public/PublicNewsPage.php">News</a>
            </div>

          </li>

        </ul>


                <a class="btn" data-toggle="collapse" href="#myContent" style="margin-top: -7px;"><img src="/Online News Portal/Images/SearchIcon.PNG" style="height: 25px; width: 25px;"></a>
                <div class="collapse" id="myContent">
                  <div>
                    <form action="/Online News Portal/ConnectSearch.php" method="Post">
                      <input type="Text" required name="SearchNews" placeholder=" Search..." style="width: 150px; margin-right: 1px; margin-left: 10px;">
                      <button class="btn btn-sm btn-outline-dark bg" style="margin-top: -7px;">Search</button>
                    </form>

                  </div>
                </div>
               
            </div>
    </nav>
    <hr style="margin-top: -10px;">


 
    
  </div>


    <br><br><br>


    <div class="SignUpBox container" style="width: 30%; border: 2px solid black;">
        <div class="container" style="width: 60%;">
        <br>
            <center><h4>Admin Pannel</h4></center><br>
            <center><h5>Sign In</h5></center>
            <br>  
            <form action="/Online News Portal/Admin/ConnectAdminSignIn.php" method="Post" style="font-weight: bold;">
                Email<br>
                <input name="AdminEmail" placeholder="@email.com" type="email" required><br><br>
                Password<br>
                <input name="AdminPassword" placeholder="At least 6 characters" minlength="6" type="password" required><br><br>
                <button class="btn btn-outline-dark" style="width: 60%;";>Sign In</button>
            </form>
            <br><br><br>

        </div>
    </div>






















   
  <!-- Footer -->
  <footer class="page-footer container " style="background-color: #F5E6FF; margin-top: 70px; margin-bottom: 30px;">

    <div class="row">
      <div class="col-md-6" style="padding-top: 15px;">
        <font size="4"><a class="nav-link" style="width: 30%;" href="../Admin/AdminSignIn.php"><b>Admin Pannel</b></a></font>
      </div>
      <div class="col-md-6" style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
        <font size="6">
          <font color="grey"><b><i>know whats happening around your campus</i></b></font>
        </font>
      </div>
    </div>
    <br><br>

    <center>
      <font size="2"><a class="nav-link" style="width: 20%;" href="../Super Admin/SuperAdminSignIn.php"><b>Super Administrator</b></a> </font>
    </center>






    <hr>
    <!-- Copyright -->
    <div class="footer-copyright py-3">
      <div style="text-align: right; word-spacing: 10px; padding-right: 30px; margin-top: -30px;">

        <a href="https://facebook.com" target="_blank"><img src="../Images/FacebookIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://twitter.com/" target="_blank"><img src="../Images/TwitterIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="../Images/InstaIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.youtube.com" target="_blank"><img src="../Images/YoutubeIcon.PNG" style="height: 20px; width: 20px;"></a>

      </div>

      <div class="row">


        <div class="col-md-2" style="text-align: right; padding-right: 0px; padding-top: 7px;">
          © 2024 Copyright:
        </div>
        <div class="col-md-10" style="text-align: left; padding-left: 0px;">
          <a class="nav-link" style="width: 2%;" href="../Public/Homepage.php">CampusConnectNWU.com</a>

        </div>


      </div>


    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->





  <script src="../jquery-3.5.1.slim.min.js"></script>
  <script src="../popper.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>


</body>

</html>