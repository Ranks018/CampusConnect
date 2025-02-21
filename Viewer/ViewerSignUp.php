<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Campus Connect</title>
    <style>
        
        div.SignUpBox
        {
        border-radius: 5px;
        border: 2px solid black;
        padding: 20px;            
        box-shadow: 5px 10px 8px 10px gray; 
        }


        a.nav-link {color:black;}
        a.nav-link:hover {color:DimGray;
        text-decoration:none;}
    
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

?>


  <div class="container" style="margin-top: 50px;">
    
    
  <div class="row " style="background-color: #F5E6FF; margin-top: 20px; height: 150px;">
      <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;" ><a class="nav-link"  href="../Public/Homepage.php">
        <b><i>Campus Connect</i></b>
        </a>
      </h1>
      <font size="2"><?php echo $Date; ?></font>
      </div>
            <div class="col-md-3" style="margin-top: 20px; text-align: right;">

              <button class="btn btn-outline-dark" type="submit" data-toggle="modal" data-target="#ViewerSignInModal">Sign In</button>
              <a href="/Online News Portal/Viewer/ViewerSignUp.php"><button class="btn btn-outline-dark" type="submit" style="margin-left: 15px;">Sign Up</button></a>
       
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




        <!--Sign In Modal -->
        <div class="modal fade" id="ViewerSignInModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button><br><br>
                        <center><h5>Sign In</h5></center>
                        <div class="container" style="width: 50%;">
                            <form action="/Online News Portal/Viewer/ConnectViewerSignIn.php" method="Post">
                            <br>                                
                            <input name="ViewerEmail" placeholder="Email" type="email" required style="width: 100%;"><br><br>
                            <input name="ViewerPassword"  placeholder="Password" minlength="6" type="password" required  style="width: 100%;"><br><br>
                            <button class="btn btn-outline-dark" style="width: 40%;";>Sign In</button>
                            <br><br><br>

                            <a href="/Online News Portal/Viewer/ViewerSignUp.php" style="text-decoration: none; color: black; font-size: 3;">Create an account?</a>
                            <br><br><br>
                            </form>                            
                        </div>
                    </div>                 
                </div>
            </div>
        </div>

        <!--  -->          
    
  </div>


    <br><br><br>


    <div class="SignUpBox container" style="width: 30%; border: 2px solid black;">
        <div class="container" style="width: 60%;">
        <br>
            <center><h5>Sign Up</h5></center>
            <br>  
            <form action="ViewerSignUpProcess.php" method="Post" style="font-weight: bold;">
                First Name<br>
                <input name="ViewerFirstName" placeholder="First Name" type="text"required><br><br>
                Last Name<br>
                <input name="ViewerLastName" placeholder="Last Name" type="text" required><br><br>
                Email<br>
                <input name="ViewerEmail" placeholder="@email.com" type="email" required><br><br>
                Password<br>
                <input name="ViewerPassword" placeholder="At least 6 characters" minlength="6" type="password" required><br><br>
                Confirm Password<br>
                <input name="ViewerConfirmPassword" placeholder="At least 6 characters" minlength="6" type="password" required><br><br>
                <button class="btn btn-outline-dark" style="width: 60%;";>Sign Up</button>
            </form>
            <br><br>

        </div>
    </div>
   















<!-- Footer --> 
<footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

        <div class="row">   
          <div class="col-md-6" style="padding-top: 15px;">
            <font size="4"><a class="nav-link" style="width: 30%;" href="/Online News Portal/Admin/AdminSignIn.php"><b>Admin Pannel</b></a></font> 
          </div>
          <div class="col-md-6" style="text-align: right; padding-top: 10px;
          padding-right: 30px;">
            <font size="6"><font color="grey"><b><i>know whats happening around your campus</i></b></font></font>      
          </div>
        </div>
        <br><br>

        


        <center><font size="4"><a class="nav-link" style="width: 2%;" href="/Online News Portal/Super Admin/SuperAdminSignIn.php"><b>Administrator</b></a></font></center>   
        
    
  
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