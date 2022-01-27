<!DOCTYPE html>
<html lang="en">
<head>
    <title>Corona Go</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../User/user-css/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="user-css/homepage.css" type="text/css">
    <link rel="stylesheet" href="user-css/topnavigationbar.css" type="text/css">
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
    <a href="index.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
    <a href="registration-form.php"><i class="fa fa-edit"></i> Register</a>
    <a href="indiacoronalive.php"><i class="fas fa-bar-chart" aria-hidden="true"></i> Covid Stats</a>
    <a href="vaccination-stats.php"><i class="fas fa-bar-chart" aria-hidden="true"></i> Vaccination Stats</a>
    <a href="#cta"> <i class="fas fa-phone"></i> Contact Us</a>
    <a href="../Admin/home.php" class="logouticon"><i class="fas fa-sign-in-alt"></i> Admin Login</a>
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
          <li><a class="btn" href="registration-form.php">Register for Vaccine</a></li>
          <li><a class="btn inverse" href="../Admin/login.php">Goto Admin Login</a></li>
        </ul>
      </footer>
    </article>
  </div>
</div>




<div class="wrapper row2">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">Let's Stay Safe & Fight Together against Covid-19</h6>
    </div> 
    <ul class="nospace group prices">
      <li class="one_third">
        <article><img class="coronaimg" src="../Icons/syringe-icon.png">
          <h6 class="heading">Register for Vaccine</h6>
          <p>Register for the corona vaccine now</p>
          <footer><a class="btn" href="registration-form.php"><i class="fas fa-plus" id="register"></i>Register</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><img class="coronaimg" src="../Icons/corona-icon.png">
          <h6 class="heading">Positive Cases</h6>
          <p>Covid-19 positive cases in your area</p>
          <footer><a class="btn" href="indiacoronalive.php">Details</a></footer>
        </article>
      </li>
      <li class="one_third">
      <article><img class="coronaimg" src="../Icons/safety-icon.png">
          <h6 class="heading">Safety Measures</h6>
          <p>Safety Measures you should follow </p>
          <footer><a class="btn" href="safety-precautions.html">Details</a></footer>
        </article>
      </li>
    </ul>
  </section>
</div>

<iframe class="graph container" src="https://public.domo.com/cards/bWxVg" width="100%" height="500" marginheight="0" marginwidth="0" frameborder="0"></iframe>
   

<?php

    $data = file_get_contents('https://api.covid19india.org/data.json');
    $coronalive = json_decode($data,True);
?>


<div class="counter">
  <div class="container">
      <h1>Covid cases In India</h1>
      <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="employees">
                  <p class="counter-count" id="total"><?php echo $coronalive['statewise'][0]['confirmed'] ; ?></p>
                  <p class="employee-p">Total cases</p>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="customer">
                  <p class="counter-count" id="active-case"><?php echo $coronalive['statewise'][0]['active'] ; ?></p>
                  <p class="customer-p">Active cases</p>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="design">
                  <p class="counter-count" id="recovered"><?php echo $coronalive['statewise'][0]['recovered'] ; ?></p>
                  <p class="design-p">Recovered</p>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <div class="order">
                  <p class="counter-count" id="death"><?php echo $coronalive['statewise'][0]['deaths'] ; ?></p>
                  <p class="order-p">Deceased</p>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="creators">
    <div class="hoc container testimonial clear">
      <h1 class="creatornames">Creator</h1> 
      <article><img src="../Icons/user.png" alt="srujan">
        <h6 class="heading">Srujan Rai K</h6>
        <em>Student at NIE</em>
      </article>
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
