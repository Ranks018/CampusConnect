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

            include 'DatabaseConnection.php';
            session_start();

            //Admin Header Start
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
        ?>   
            	
        	<!-- Admin Header -->
          <div class="container" style="margin-top: 50px;">
            
            
          <div class="row " style="background-color: #F5E6FF; margin-top: 20px; height: 150px;">
      <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="/Online News Portal/Public/AdminHomepage.php">
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
            }
            //Admin Header Finished


            //Super Admin Header Start

            else if(isset($_SESSION['SuperAdminEmail'])){
              $SuperAdminEmail=$_SESSION['SuperAdminEmail'];
              $sql = "SELECT * FROM super_admin WHERE SuperAdminEmail='$SuperAdminEmail'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $SuperAdminFirstName=$row["SuperAdminFirstName"];
                  $SuperAdminLastName=$row["SuperAdminLastName"] . "<br>";
                }
              }
               
          ?>
            <!-- Super Admin Header -->
          <div class="container" style="margin-top: 50px;">
            
            
            <div class="row bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="/Online News Portal/Super Admin/SuperAdminHomepage.php">
            <b><i>Campus Connect</i></b>
          </a>
        </h1>
        <font size="2"><?php echo $Date; ?></font>
      </div>
                    <div class="col-md-1" style="margin-top: 8px; text-align: right; padding-right: 0px;">
                      <div class="dropdown">
                        <button class="btn" type="button" data-toggle="dropdown" style="width: 40px;"><img src="/Online News Portal/Images/UserIcon.PNG" alt="Image is not available" style="height: 20px; width: 20px;"></button>
                          <ul class="dropdown-menu bg-light" style="text-align: center;">
                            <li><a href="/Online News Portal/Super Admin/SuperAdminProfile.php" class="nav-link">Profile</a></li>
                            <li><a href="/Online News Portal/SignOut.php" class="nav-link">Sign Out</a></li>
                          </ul>
                      </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 15px; padding-left: 0px;">

                        <?php echo "<b>".$SuperAdminFirstName." ".$SuperAdminLastName."</b>"; ?>
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
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminAnnouncementPage.php">Announcement</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminWebinarsPage.php">Webinars</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminSeminarsPage.php">Seminar</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminSportsPage.php">Sports</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminEntertainmentPage.php">Entertainment</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminLifestylePage.php">Lifestyle</a>
              <a class="dropdown-item" href="/Online News Portal/Super Admin/SuperAdminNewsPage.php">News</a>
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
            }
            //Super Admin Header Finished


            //Viewer Header Start
            else if(isset($_SESSION['ViewerEmail'])){
              $ViewerEmail=$_SESSION['ViewerEmail'];
              $sql = "SELECT * FROM viewer WHERE ViewerEmail='$ViewerEmail'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $ViewerFirstName=$row["ViewerFirstName"];
                  $ViewerLastName=$row["ViewerLastName"];
                  $ViewerId=$row["ViewerId"];  //For matching with commentators id in later.
                }
              }
          ?>

            <!-- Viewer Header -->
          <div class="container" style="margin-top: 50px;">
            
            
            <div class="row bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;" ><a class="nav-link"  href="/Online News Portal/Viewer/ViewerHomepage.php">
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

                        <?php echo "<b>".$ViewerFirstName." ".$ViewerLastName."</b>"; ?>
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
            }
            //Viewer Header Finished


            //Public Header Start
            else{
        ?>

          <!-- Public Header -->
          <div class="container" style="margin-top: 50px;">
            
            
            <div class="row  bg-light" style="margin-top: 20px; height: 150px;">
            <div class="col-md-9 " style="margin-top: 5px;">
        <h1 style="color: purple;"><a class="nav-link" href="/Online News Portal/Viewer/Public/Homepage.php">
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
       
        <?php
            }
            //Public Header Finished
        ?>



        <!-- Finding the path for going to single page news view module -->

        <?php
          if(isset($_SESSION['AdminEmail'])){
            $path_single_page_news_view="/Online News Portal/Admin/AdminSinglePageNewsViewModule.php";
          }
          
          else if(isset($_SESSION['SuperAdminEmail'])){
            $path_single_page_news_view="/Online News Portal/Super Admin/SuperAdminSinglePageNewsViewModule.php";
          }

          else if(isset($_SESSION['ViewerEmail'])){
            $path_single_page_news_view="/Online News Portal/Viewer/ViewerSinglePageNewsViewModule.php";
          }
          else{
            $path_single_page_news_view="/Online News Portal/Public/PublicSinglePageNewsViewModule.php";
          }

          //echo $path_single_page_news_view;
        ?>




        <div class="container" style="margin-top: 80px; width: 60%; font-size: 50px;">
          <b>Search: <font color="DimGray"><?php echo $_POST['SearchNews']; ?></font></b>
        </div>



        <!-- Search -->

    <div class="container" style="margin-top: 80px; width: 60%;">

      <?php
        $SearchInfo=$_POST['SearchNews'];
        $SearchInfo=preg_replace("#[^0-9a-z/$@.,;:()\|&*^!?-{}]#i", " ", $SearchInfo);


        $sql = "SELECT * FROM news WHERE NewsHeadline LIKE '%$SearchInfo%' OR NewsDescription LIKE '%$SearchInfo%' OR NewsCategory LIKE '%$SearchInfo%' OR NewsReporterName LIKE '%$SearchInfo%' OR NewsDate LIKE '%$SearchInfo%' OR NewsTime LIKE '%$SearchInfo%'  order by NewsDate desc, NewsTimeForSort desc";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        
          while($row = mysqli_fetch_assoc($result)) {
            $NewsId=$row["NewsId"];
            $NewsHeadline=$row["NewsHeadline"];
            $NewsTime=$row["NewsTime"];
            $NewsDescription=$row["NewsDescription"];
            $NewsDate=$row["NewsDate"];



            $Image_sql = "SELECT * FROM news_image WHERE NewsId='$NewsId'";
            $Image_result = mysqli_query($conn, $Image_sql);
            while($Image_row = mysqli_fetch_assoc($Image_result)) {
              $NewsImage=$Image_row["NewsImage"];
              break;

            }
      ?>

            

            <div class="card">
              <div class="card-body bg-light">
                <div class="row">
                  <div class="col-md-3">
                    <?php
                      if (isset($NewsImage)) {
                    ?>
                        <a href="<?php echo$path_single_page_news_view; ?>?var=<?php echo $NewsId;?>"><img src="/Online News Portal/Images/<?php echo$NewsImage; ?>"  alt="Image is not available"  style=" width: 100%; height: 200px;"></a>
                    <?php
                        unset($NewsImage);
                      }
                    ?>
                  </div>
                  <div class="col-md-8 bg-white" style="margin-left: 1px;">
                    <a class="nav-link" href="<?php echo$path_single_page_news_view; ?>?var=<?php echo $NewsId;?>" style="padding-left: 0px;">
                      <font size="4px"><b><?php echo $NewsHeadline; ?></b></font><br>
                      <font size="3px"><font color="DimGray"><?php echo substr($NewsDescription,0,138); ?>...</font></font><br>
                    </a>
                    <font size="1px"><font color="Darkgray"><b>Published :  <?php echo $NewsTime." ,  ". $NewsDate; ?></b></font></font><br><br>             
                  </div>
                </div>                
              </div>
            </div>

            <br>

      

      <?php

          }
        } 
        else {
      ?>
      <div class="container bg-light" style="width: 70%; margin-top: 80px; margin-bottom: 60px; text-align: center; border: 2px black solid; font-size: 50px; padding-top: 20px; padding-bottom: 20px;">
          <b>No stories found !!</b>
        
      </div>
        
      <?php
        }
      ?>


      
    </div>


    

































       
      <?php

        //Admin footer start

        if(isset($_SESSION['AdminEmail'])){
      ?>

     <!-- Admin Footer Start -->

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

      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->


      <?php
        }
        //Admin footer finished

        //Super Admin footer start
        else if(isset($_SESSION['SuperAdminEmail'])){
      ?>


    <!-- Super Admin Footer Start -->

    <!-- Footer --> 
    <footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

            <div class="row">   
              <div class="col-md-6" style="padding-top: 15px;">
                <font size="4"><a class="nav-link" style="width: 43%;" href="/Online News Portal/Super Admin/SuperAdminManageAdminPannel.php"><b>Manage Admin Pannel</b></a></font> 
              </div>
              <div class="col-md-6" style="text-align: right; padding-top: 10px;
              padding-right: 30px;">
    <font size="6">
      <font color="grey"><b><i>know whats happening around your campus</i></b></font>
    </font>     
              </div>
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
          <a class="nav-link" style="width: 2%;" href="/Online News Portal/Super Admin/SuperAdminHomepage.php">CampusConnectNWU.com</a>
        </div>
        </div> 

      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->



      <?php
        }
        //Super Admin footer finished

        //Viewer footer start 
        else if(isset($_SESSION['ViewerEmail'])){
      ?>





    <!-- Viewer Footer Start -->

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
      <a class="nav-link" style="width: 2%;" href="http://localhost/Online%20News%20Portal/Viewer/ViewerHomepage.php">CampusConnectNWU.com</a>
    </div>
        </div> 

      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->






      <?php
        }
        //Viewer footer finished

        //Public footer start
        else{
      ?>


    <!-- Public Footer Start -->

    <!-- Footer --> 
    <footer class="page-footer container bg-light" style="margin-top: 70px; margin-bottom: 30px;">

            <div class="row">   
              <div class="col-md-6" style="padding-top: 15px;">
                <font size="4"><a class="nav-link" style="width: 30%;" href="/Online News Portal/Admin/AdminSignIn.php"><b>Admin Pannel</b></a></font> 
              </div>
              <div class="col-md-6" style="text-align: right; padding-top: 10px;
              padding-right: 30px;">
    <font size="6">
      <font color="grey"><b><i>know whats happening around your campus</i></b></font>
    </font>     
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
          <a class="nav-link" style="width: 2%;" href="http://localhost/Online%20News%20Portal/Public/Homepage.php">CampusConnectNWU.com</a>

        </div>
        </div> 

      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->




      <?php
        }
        //Public footer finished
      ?>















<script src="../jquery-3.5.1.slim.min.js"></script>
  <script src="../popper.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
        </body>

        </html>