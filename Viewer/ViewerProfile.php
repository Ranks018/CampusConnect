<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/Online News Portal/css/bootstrap.min.css">
  <title>Campus Connect</title>


  <style>
    a.nav-link {
      color: purple;
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

  $Date = date("<b>l,</b> j F Y") . "<br>";
  //echo $Date;

  include '../DatabaseConnection.php';
  session_start();
  if (isset($_SESSION['ViewerEmail'])) {
    $ViewerEmail = $_SESSION['ViewerEmail'];
    $sql = "SELECT * FROM viewer WHERE ViewerEmail='$ViewerEmail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $ViewerFirstName = $row["ViewerFirstName"];
        $ViewerLastName = $row["ViewerLastName"] . "<br>";
      }
    }
  } else {
    echo "
      <script>
        alert('You are not Logged In');
        location.href = '../Public/Homepage.php';
      </script>";
  }


  ?>



  <div class="container" style="margin-top: 50px;">


    <div class="row " style="background-color: #F5E6FF; margin-top: 20px; height: 150px;">
      <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="../Viewer/ViewerHomepage.php">
            <b><i>Campus Connect</i></b>
          </a>
        </h1>
        <font size="2"><?php echo $Date; ?></font>
      </div>
      <div class="col-md-1" style="margin-top: 8px; text-align: right; padding-right: 0px;">
        <div class="dropdown">
          <button class="btn" type="button" data-toggle="dropdown" style="width: 40px;"><img src="/Online News Portal/Images/UserIcon.PNG" alt="Image is not available" style="height: 20px; width: 20px;"></button>
          <ul class="dropdown-menu bg-light" style="text-align: center;">
            <li><a href="/Online News Portal/Viewer/ViewerProfile.php" class="nav-link">Profile</a></li>
            <li><a href="/Online News Portal/SignOut.php" class="nav-link">Sign Out</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2" style="margin-top: 15px; padding-left: 0px;">

        <?php echo "<b>" . $ViewerFirstName . " " . $ViewerLastName . "</b>"; ?>
      </div>
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
              <a class="dropdown-item" href="../Viewer/ViewerAnnouncementPage.php">Announcement</a>
              <a class="dropdown-item" href="../Viewer/ViewerWebinarsPage.php">Webinars</a>
              <a class="dropdown-item" href="../Viewer/ViewerSeminarPage.php">Seminar</a>
              <a class="dropdown-item" href="../Viewer/ViewerSportsPage.php">Sports</a>
              <a class="dropdown-item" href="../Viewer/ViewerEntertainmentPage.php">Entertainment</a>
              <a class="dropdown-item" href="../Viewer/ViewerLifestylePage.php">Lifestyle</a>
              <a class="dropdown-item" href="../Viewer/ViewerNewsPage.php">News</a>
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





  <?php
  if (isset($_SESSION['ViewerEmail'])) {
    $ViewerEmail = $_SESSION['ViewerEmail'];
    $sql = "SELECT * FROM viewer WHERE ViewerEmail='$ViewerEmail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $ViewerFirstName = $row["ViewerFirstName"];
        $ViewerLastName = $row["ViewerLastName"];
        $ViewerEmail = $row["ViewerEmail"];
      }
    }
  } else {
    echo "
      <script>
        alert('You are not Logged In');
        location.href = '/Online News Portal/Public/Homepage.php';
      </script>";
  }
  ?>



  <div class="container bg-light" style="width: 30%; margin-top: 70px; margin-bottom: 60px; border: 2px black solid; text-align: center; font-size: 25px; font-weight: bold;"><br>
    <?php
    echo $ViewerFirstName . "   " . $ViewerLastName . "<br>";
    echo $ViewerEmail;

    ?><br><br>

    <!-- For Button of Edit name and password -->

    <div class="row" style="font-size: 15px; font-weight: bold;">
      <div class="col-md-6">
        <button class="btn btn-outline-dark" style="border: none;" type="submit" data-toggle="modal" data-target="#ViewerEditNameModal"><b>Edit Name</b></button>
      </div>
      <div class="col-md-6">
        <button class="btn btn-outline-dark" style="border: none;" type="submit" data-toggle="modal" data-target="#ViewerEditPasswordModal"><b>Edit Password</b></button>
      </div>

    </div>

    <br>
  </div>






  <!--Edit Name Modal -->
  <div class="modal fade" id="ViewerEditNameModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button><br><br>

          <div class="container" style="width: 80%;">
            <center>
              <h5><b>Edit Profile</b></h5>
            </center>
            <form action="/Online News Portal/Viewer/ConnectEditViewerProfile.php" method="Post">
              <br>

              <div class="row">
                <div class="col-md-6" style="text-align: right; padding-right: 0px;">
                  <b>First Name:</b>
                </div>
                <div class="col-md-6">
                  <input name="ViewerFirstName" type="text" style="width: 100%;" required value="<?php echo $ViewerFirstName; ?>">
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-6" style="text-align: right; padding-right: 0px;">
                  <b>Last Name:</b>
                </div>
                <div class="col-md-6">
                  <input name="ViewerLastName" type="text" style="width: 100%;" required value="<?php echo $ViewerLastName; ?>">
                </div>
              </div>
              <br>
              <center>
                <button class="btn btn-outline-dark" style="width: 40%;" ;><b>Edit</b></button>
              </center>
              <br><br><br>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  -->





  <!--Edit Password Modal -->
  <div class="modal fade" id="ViewerEditPasswordModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button><br><br>

          <div class="container" style="width: 80%;">
            <center>
              <h5><b>Edit Password</b></h5>
            </center>
            <form action="/Online News Portal/Viewer/ConnectEditViewerProfile.php" method="Post">
              <br>

              <div class="row">
                <div class="col-md-6" style="text-align: right; padding-right: 0px;">
                  <b>Old Password:</b>
                </div>
                <div class="col-md-6">
                  <input name="ViewerOldPassword" type="password" required style="width: 100%;">
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-6" style="text-align: right; padding-right: 0px;">
                  <b>New Password:</b>
                </div>
                <div class="col-md-6">
                  <input name="ViewerNewPassword" type="password" required minlength="6" placeholder="At least 6 characters" style="width: 100%;">
                </div>
              </div>
              <br>
              <center>
                <button class="btn btn-outline-dark" style="width: 40%;" ;><b>Edit</b></button>
              </center>
              <br><br><br>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  -->
















  <!-- Footer -->
  <footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">


    <div style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
      <font size="6">
        <font color="grey"><b><i>know whats happening around your campus</i></b></font>
      </font>
    </div>

    <br><br>





    <hr>
    <!-- Copyright -->
    <div class="footer-copyright py-3">
      <div style="text-align: right; word-spacing: 10px; padding-right: 30px; margin-top: -30px;">
        <a href="https://facebook.com" target="_blank"><img src="/Online News Portal/Images/FacebookIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://twitter.com/" target="_blank"><img src="/Online News Portal/Images/TwitterIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="/Online News Portal/Images/InstaIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.youtube.com" target="_blank"><img src="/Online News Portal/Images/YoutubeIcon.PNG" style="height: 20px; width: 20px;"></a>
      </div>

      <div class="row">
        <div class="col-md-2" style="text-align: right; padding-right: 0px; padding-top: 7px;">
          © 2024 Copyright:
        </div>
        <div class="col-md-10" style="text-align: left; padding-left: 0px;">
          <a class="nav-link" style="width: 2%;" href="../Viewer/ViewerHomepage.php">CampusConnectNWU.com</a>
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