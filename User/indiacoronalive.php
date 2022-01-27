<!DOCTYPE html>
<html lang="en">
<head>
    <title>India Corona Cases Live</title>
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
  <style>
    h3.text-center{
      margin-top:50px;
      font-size : 38px;
      font-family: Georgia, "Times New Roman", Times, serif;
    }
    #casesupdate tr:first-child{
      font-weight : 600;
      background-color: #c5edf7;
      font-size : 130%;
       }
    #casesupdate tr td:first-child{
      font-weight : 600;
      width: 20%;
    }
    .table{
      width : 80%;
      margin-left: auto;
      margin-right : auto;
      margin-top : 50px;
    }
    #casesupdate tr td:nth-child(2){
      color : red;
    }
    #casesupdate tr td:nth-child(3){
      color : green;
    }
    #casesupdate tr td:nth-child(5){
      color : red;
    }


    </style>
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



    <section>
      <div class="mb-3">
        <h3 class="text-center">Statewise Corona Cases in India</h3>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-striped text-center" id="casesupdate">
          <tr>
            <td>State</td>
            <td>Conformed</td>
            <td>Recovered</td>
            <td>Deceased</td>
            <td>Active</td>
          </tr>

          <?php

              $data = file_get_contents('https://api.covid19india.org/data.json');
              $coronalive = json_decode($data,True);
              $statecount = count($coronalive['statewise']);
              $i = 1;
              while($i < $statecount){

              ?>
              <tr>
                <td><?php echo $coronalive['statewise'][$i]['state'] ; ?></td>
                <td><?php echo $coronalive['statewise'][$i]['confirmed'] ; ?></td>
                <td><?php echo $coronalive['statewise'][$i]['recovered'] ; ?></td>
                <td><?php echo $coronalive['statewise'][$i]['deaths'] ; ?></td>
                <td><?php echo $coronalive['statewise'][$i]['active'] ."<br>"; ?></td>

              </tr>
              <?php
                $i++;
              }
            ?>
        </table>
      </div>
    </section>

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