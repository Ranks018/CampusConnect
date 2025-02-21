<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

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
  </div>
<h1>Forgot Password</h1>

<form method="post" action="SendPasswordReset.php">

    <label for="email">Email</label>
    <input type="email" name="ViewerEmail" id="ViewerEmail">


    <button class="btn btn-outline-dark">Send</button>



</form>

<script src="../jquery-3.5.1.slim.min.js"></script>
  <script src="../popper.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>