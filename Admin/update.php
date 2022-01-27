<?php
require_once "sessionstart.php";
?>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$nodatafound = "";
$row['aadharno'] = "Aadhar number";
$row['name'] = "Name";
$row['email'] = "Email";
$row['phno'] = "Mobile number";
$row['address'] = "Address";
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $aadharno = "";
  $aadharno = test_input($_POST["aadharno"]);
  include_once 'connection.php';
  $result = mysqli_query($conn,"SELECT * FROM users WHERE aadharno=$aadharno");
  if(mysqli_num_rows($result) == 0) {
    $nodatafound = "No data found" ;
  } 
else 
  {
  $row= mysqli_fetch_array($result);
  
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User details</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="top" onload="resetSelection()">
    <style>
    .bar{
        background-color: #F4F4F4;
      }
    .container .search-bar{
        width: 90%;
        padding: 10px;
        float: left;
        border: #53D3DE 2px solid;
        border-radius: 5px;
        background-color: #F4F4F4;
    }
    button{
      padding: 10px;
      background-color:  #b5e5eb;
      border: #53D3DE 2px solid;
      border-radius: 5px;
    }
    .search-bar {
      -webkit-appearance: none; 
        background: url(../../Icons/search-icon.png) no-repeat right;
        padding-right: 10px;
      }
     .nodatamsg{
        color : red;
        font-size : 200%;
        text-align : center;
        background-color : #F4F4F4;
        margin : unset ;
      }
      </style>
    <div class="topnav" id="myTopnav">
        <a href="home.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
        <a href="allocate-slot.php">View Registered users</a>
        <a href="update.php">Update user detail</a>
        <a href="vaccinate.php">Vaccinate</a>
        <a href="#cta"> <i class="fa fa-phone"></i> Contact Us</a>
        <a href="logout.php" class="logouticon"><i class="fa fa-sign-out-alt"></i> Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>


  <form class="bar" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
    <div class="container">
      <input class="search-bar" name="aadharno" placeholder="Enter aadhar number"/>
      <button type="submit">Search</button>
    </div>
  </form>
    <p class="nodatamsg"><?php echo $nodatafound; ?></p>

<script>

if ("<?php if(isset($_GET['msg'])) echo $_GET['msg'];?>" == "Updated successfully !") {
    swal({
    icon: "success",
    title: "Updated successfully !",
    showConfirmButton: true,
    confirmButtonText: "Cerrar",
    closeOnConfirm: false
}).then(function(result)
    {
      window.location = "update.php";
    }
)};

</script>

  <div class="wrapper row2">
    <section class="hoc container clear"  style="padding-left: 0px; padding-right:0px"> 
      <div class="sectiontitle">
        <h6 class="heading">Let's Stay Safe & Fight Together against Covid-19</h6>
      </div> 
      <ul class="nospace group prices">
        <li class="one">
          <article>
            <h6 class="heading">Update form</h6>
            <form action="update-details.php" method="POST" >
              <div class="registration-form">  
                  <hr> 
                  <label>Aadhar Card Number <span> * </span></label>  
                  <input type="number" name="aadharno" value="<?php echo $row['aadharno']; ?>" size="15" required style="margin-top:2px;" /> 
                  <label>Name <span> * </span></label>  
                  <input type="text" name="name" value="<?php echo $row['name']; ?>" size="15" required /> 
                  <label>Date of Birth <span> * </span></label>
                  <input type="date" name="dob"  value="<?php echo $row['dob']; ?>" style="padding:7px; margin-top:2px;" required />
                  <label>Age <span> * </span></label>
                  <input type="number" name="age"  value="<?php echo $row['age']; ?>" required style="margin-top:2px;"/>
                  <label>Email</label>
                  <input type="text"  value="<?php echo $row['email']; ?>" name="email" pattern=".+@.+.com"> 
                  <label>Mobile Number <span> * </span></label>  
                  <input type="tel" name="phno"  value="<?php echo $row['phno']; ?>" maxlength="14" required style="margin-top:2px;"/> 

                  <label>Address <span> * </span></label>   
                  <input style="padding-bottom: 70px" type="text" name="address"  value="<?php echo $row['address']; ?>" required/> 
                  <label>Pincode <span> * </span></label>  
                  <input type="number" name="pincode"  value="<?php echo $row['pincode']; ?>" required/>
                  <footer><button class="btn" id="submit-btn" type="submit">Update</button></footer>

              </div>
            </form>
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
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>