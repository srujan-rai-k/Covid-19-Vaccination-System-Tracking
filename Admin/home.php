<?php
include "sessionstart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="admin-css/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="../User/user-css/homepage.css" type="text/css">
    <link rel="stylesheet" href="admin-css/topnavigationbar.css" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../Javascript/home.js"></script>
    <script src="../Javascript/jquery.backtotop.js"></script>
    <script src="../Javascript/jquery.min.js"></script>
    <script src="../Javascript/jquery.mobilemenu.js"></script>
    <link rel="icon" type="image/png" href="https://cdn3.iconfinder.com/data/icons/coronavirus-filled/32/coronavirus-26-128.png">
    <link rel="stylesheet" type="text/css" href="/webjars/bootstrap/css/bootstrap.min.css" />
</head>

<body id="top">

  <div class="topnav" id="myTopnav">
    <a href="home.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
    <a href="allocate-slot.php">View Registered users</a>
    <a href="update.php">Update user detail</a>
    <a href="vaccinate.php">Vaccinate</a>
    <a href="#cta"> <i class="fas fa-phone"></i> Contact Us</a>
    <a href="logout.php" class="logouticon"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>



<div class="wrapper bgded overlay gradient">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <h3 class="heading">About Corona Virus</h3>
      <p class="sentence">Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
        Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.
        The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. 
        The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an infected person coughs or sneezes, so it’s important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).</p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="">View Registered Users</a></li>
          <li><a class="btn inverse" href="../User/index.php"> Goto User Page </a></li>
        </ul>
      </footer>
    </article>
  </div>
</div>




<div class="wrapper row2">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <h1 class="form-heading">Let's Stay Safe & Fight Together against Covid-19</h1>
    </div> 
    <ul class="nospace group prices">
      <li class="one_third">
        <article><img class="coronaimg" src="../Icons/slot-icon.png">
          <h6 class="heading">Slots</h6>
          <footer><a class="btn" href="allocate-slot.php">Allocate Slots</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><img class="coronaimg" src="../Icons/edituser-icon.png">
          <h6 class="heading">Update User Detail</h6>
          <footer><a class="btn" href="update.php"><i id="register" class="fa fa-edit"></i> Update</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><img class="coronaimg" src="../Icons/syringe-icon.png">
          <h6 class="heading">Vaccinate Status</h6>
          <footer><a class="btn" href="../User/vaccination-stats.php"><i id="register" class="fa fa-users"></i> Vaccinate</a></footer>
        </article>
      </li>
    </ul>
  </section>
</div>
   
<div class="creators">
    <div class="hoc container testimonial clear">
      <h1 class="creatornames">Creator</h1> 
      <article><img src="../Icons/user.png" alt="srujan">
        <h6 class="heading">Srujan Rai K</h6>
        <em>Student at NIE</em></article>
    </div>
</div>


    <div class="wrapper row3">
      <section id="cta" class="hoc container clear"> 
        <ul class="nospace clear">
          <li class="one_half">
            <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong > srujanraik99@gmail.com</span></div>
          </li>
          
        
        </ul>
      </section>
    </div>


    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

</body>
</html>