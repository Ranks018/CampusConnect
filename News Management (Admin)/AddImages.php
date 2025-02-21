<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/Online News Portal/css/bootstrap.min.css">
    <title>Daily Bulletin</title>

    <style>
      a.nav-link {color:black;}
      a.nav-link:hover {color:DimGray;
        text-decoration:none;}
    </style>
    
</head>


<body>


  <?php

    date_default_timezone_set("Africa/Johannesburg");
    $Time=date("h:i:sa");
    //echo $Time;

    $Date=date("<b>l,</b> j F Y") . "<br>";
    //echo $Date;

    include '../DatabaseConnection.php';
    session_start();
    if(isset($_SESSION['AdminEmail'])){
      $AdminEmail=$_SESSION['AdminEmail'];
      $sql = "SELECT * FROM admin WHERE AdminEmail='$AdminEmail'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $AdminFirstName=$row["AdminFirstName"];
          $AdminLastName=$row["AdminLastName"] . "<br>";
        }
      }
    } 
    else {
      echo "
      <script>
        alert('You are not Logged In');
        location.href = '/Online News Portal/Admin/AdminSignIn.php';
      </script>";
    }

    
  ?>



  <div class="container" style="margin-top: 50px;">
    
    
    <div class="row bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9" style="margin-top: 5px;">
                <h1><b><i>Daily Bulletin</i></b></h1>
                <font size="2"><?php echo $Date; ?></font>
            </div>
            <div class="col-md-1" style="margin-top: 8px; text-align: right; padding-right: 0px;">
              <div class="dropdown">
                <button class="btn" type="button" data-toggle="dropdown" style="width: 40px;"><img src="/Online News Portal/Images/UserIcon.PNG" alt="Image is not available" style="height: 20px; width: 20px;"></button>
                  <ul class="dropdown-menu bg-light" style="text-align: center;">
                    <li><a href="/Online News Portal/Admin/AdminProfile.php" class="nav-link">Profile</a></li>
                    <li><a href="/Online News Portal/SignOut.php" class="nav-link">Sign Out</a></li>
                  </ul>
              </div>
            </div>
            <div class="col-md-2" style="margin-top: 15px; padding-left: 0px;">

                <?php echo "<b>".$AdminFirstName." ".$AdminLastName."</b>"; ?>
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
            <a class="nav-link dropdown-toggle" style=" font-size: 1.2em; font-weight: bold; color: black;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MENU <span style="font-size: 1.2em; color: black;">&downarrow;</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminAnnouncementPage.php">Announcement</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminWebinarsPage.php">Webinars</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminSeminarPage.php">Seminar</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminSportsPage.php">Sports</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminEntertainmentPage.php">Entertainment</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminLifestylePage.php">Lifestyle</a>
              <a class="dropdown-item" href="/Online News Portal/Admin/AdminNewsPage.php">News</a>
            </div>

          </li>
          <nav class="navbar navbar-expand-lg navbar-light">
            <div>
              <h2>UPLOAD</h2>
            </div>
          </nav>
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
$NewsId= $_GET['var'];
?>

<div class="container" style="margin-top: 50px;">

  <form method="Post" action="/Online News Portal/News Management (Admin)/ConnectAddImages.php?var=<?php echo $NewsId;?>" enctype='multipart/form-data'>
    
    <center>
    <table border="2" cellpadding="15px" width="50%" style="text-align: center;">
      <tr>
        <td class="bg-light">
          <b><font size="6">Add Picture</font></b>
        </td>
      </tr>
      <tr> 
        <td>
          <b><font size="5">Picture</font></b><br><br>
            <input type='file' name='NewsImage'/>           
        </td>
      </tr>
      <tr>
        <td><button class="btn btn-outline-dark bg-light" style="width: 40%;";><b>UPLOAD</b></button></td>
      </tr> 
    </table> 
    </center>  
  
  </form>
 
</div>























<!-- Footer --> 
<footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

         
          <div style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
            <font size="6"><font color="DimGray"><b><i>A part of your everyday life</i></b></font></font>      
          </div>
        
        <br><br>

        


  
  <hr>
  <!-- Copyright -->
  <div class="footer-copyright py-3">
    <div style="text-align: right; word-spacing: 10px; padding-right: 30px; margin-top: -30px;">
        <a href="https://facebook.com" target="_blank"><img src="/Online News Portal/Images/FacebookIcon.PNG" style="height: 20px; width: 20px;"></a>   
        <a href="https://twitter.com/" target="_blank"><img src="/Online News Portal/Images/TwitterIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="/Online News Portal/Images/InstaIcon.PNG" style="height: 20px; width: 20px;"></a>
        <a href="https://www.youtube.com"  target="_blank"><img src="/Online News Portal/Images/YoutubeIcon.PNG" style="height: 20px; width: 20px;"></a>      
    </div>
    
    <div class="row">
      <div class="col-md-2" style="text-align: right; padding-right: 0px; padding-top: 7px;">
        © 2020 Copyright:  
      </div>
      <div class="col-md-10" style="text-align: left; padding-left: 0px;">
        <a class="nav-link" style="width: 2%;" href="/Online News Portal/Admin/AdminHomepage.php">DailyBulletin.com</a>        
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