


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
    <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="/Online News Portal/Admin/AdminHomepage.php">
            <b><i>Campus Connect</i></b>
          </a>
        </h1>
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
  		$sql = "SELECT * FROM news WHERE NewsId='$NewsId'";
      	$result = mysqli_query($conn, $sql);
      	if (mysqli_num_rows($result) > 0) {
      
        	while($row = mysqli_fetch_assoc($result)) {
          		$NewsHeadline=$row["NewsHeadline"];
          		$NewsCategory=$row["NewsCategory"];
          		$NewsDescription=$row["NewsDescription"];
          		$NewsReporterName=$row["NewsReporterName"];
          	}
        }
	?>

  
  <div class="container" style="margin-top: 50px;">
    
    <form action="/Online News Portal/News Management (Admin)/ConnectUpdateNews.php?var=<?php echo $NewsId;?>" method="Post">
      <center>
        <div class="row" style="width: 80%;">
          <div class="col-md-6">
             
            <select class="form-control form-control-sm bg-light" style="width: 35%;" name="NewsCategory" required>
              <option value="<?php echo $NewsCategory; ?>"><?php echo $NewsCategory; ?></option>
              <option value="Announcements">Announcements</option>
              <option value="Webinars">Webinars</option>
              <option value="Seminar">Seminar</option>
              <option value="Sports">Sports</option>
              <option value="Entertainment">Entertainment</option>
              <option value="Lifestyle">Lifestyle</option>
              <option value="News">News</option>
            </select>
          </div>
          <div class="col-md-6">
            <b style="padding-right: 15px;">Reporter Name</b><input type="" name="NewsReporterName" value="<?php echo $NewsReporterName; ?>" class="bg-light">
          </div>
        </div>

        <br><br>

      
        <table width="80%;" border="1px"; cellpadding="0px";>
          <tr>
            <td class="bg-light"><b><center><font size="5">Headline</font></center></b></td>
          </tr>
          <tr>
            <td><textarea name="NewsHeadline" style="height: 220px; width: 100%;" required><?php echo $NewsHeadline; ?></textarea></td>
          </tr>
        </table>

        <br><br>
     
        <table width="80%;" border="1px"; cellpadding="0px";>
          <tr>
            <td class="bg-light"><b><center><font size="5">Description</font></center></b></td>
          </tr>
          <tr>
            <td><textarea name="NewsDescription" style="height: 1000px; width: 100%;" required><?php echo $NewsDescription; ?></textarea></td>
          </tr>
        </table>
        <br>
        <button class="btn btn-outline-dark bg-light" style="width: 80%;";><b>POST</b></button>
      </center>
    </form>

    
   

    

  </div>


  















































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
        <a href="https://www.youtube.com"  target="_blank"><img src="/Online News Portal/Images/YoutubeIcon.PNG" style="height: 20px; width: 20px;"></a>      
    </div>
    
    <div class="row">
    <div class="col-md-2" style="text-align: right; padding-right: 0px; padding-top: 7px;">
      © 2024 Copyright:
    </div>
    <div class="col-md-10" style="text-align: left; padding-left: 0px;">
      <a class="nav-link" style="width: 2%;" href="/Online News Portal/Admin/AdminHomepage.php">CampusConnectNWU.com</a>
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