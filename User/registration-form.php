<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="user-css/layout.css" rel="stylesheet" type="text/css" media="all">
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
    <link rel="icon" type="image/png" href="https://cdn3.iconfinder.com/data/icons/coronavirus-filled/32/coronavirus-26-128.png">
    <link rel="stylesheet" type="text/css" href="/webjars/bootstrap/css/bootstrap.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="top" onload="resetSelection()">
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


  <div class="wrapper row2">
    <section class="hoc container clear" style="padding-left: 0px; padding-right:0px"> 
      <div class="sectiontitle">
        <h1 class="form-heading">Let's Stay Safe & Fight Together against Covid-19</h1>
      </div> 
      <ul class="nospace group prices">
        <li class="one"> <script>if (<?php if(isset($_GET['error'])) echo $_GET['error'];?> == "Invalid Aadhar number" ) swal("re");</script>
          <article><img class="coronaimg" src="../Icons/syringe-icon.png">
            <h6 class="heading">Registration form</h6>
            <form action="register.php" method="POST" >
              <div class="registration-form">  
                  <hr> 
                  <label>Aadhar Card Number <span> * </span></label>  
                  <input style="margin-top: 5px;" type="number" name="aadharno" placeholder= "Enter Your Aadhar number" minlength="12" maxlength="12" required /> 
                  <label>Name <span> * </span></label>  
                  <input type="text" name="name" placeholder= "Enter Your Name" size="15" required /> 
                  <label>Date of Birth <span> * </span></label>
                  <input style="padding: 9px; margin-top: 5px;" type="date" name="dob" placeholder="Enter Your Date of Birth" required />
                  <label>Age <span> * </span></label>
                  <input type="number" name="age" placeholder="Enter Your Age" required />
                  <label>Email</label>
                  <input type="text" placeholder="Enter Email" name="email" pattern=".+@.+"> 
                  <label>Job <span> * &nbsp;</span>(Frontline warriors have to bring the document that describes their job) &nbsp;</label>  
                  <select name="job" id="job" class="select-options">
                    <option value="Frontline warrior">Frontline warrior</option>
                    <option value="Others" selected>Others</option>
                  </select>                  
                  <label>Mobile Number <span> * </span></label>  
                  <input style="margin-top: 5px;" type="tel" name="phno" placeholder= "Ph.No" minlength="10" maxlength="10" required/> 
                  
                  <label>State <span> * &nbsp;</span></label>  
                  <select name="state" id="countrySelect" class="select-options" size="1" onchange="makeSubmenu(this.value)" required>
                    <option value="state" disabled selected>Choose State</option>
                      <option>Karnataka</option>
                      <option>Maharashtra</option>
                      <option>Rajasthan</option>
                      <option>UttarPradesh</option>
                      <option>AndhraPradesh</option>
                  </select>

                  <label>Near by City <span> * &nbsp;</span></label>
                  <select name="city" id="citySelect" class="select-options" size="1" required>
                    <option value="" disabled selected>Choose City</option>
                    <option></option>
                  </select>
                 
                  <label>Address <span> * </span></label>   
                  <input style="padding-bottom: 70px" type="text" name="address" placeholder= "Address" required/> 
                  <label>Pincode <span> * </span></label>  
                  <input style="margin-top: 5px;" type="number" name="pincode" placeholder= "Pincode" required/>
                  <footer><button class="btn" id="submit-btn" type="submit"></i>Register/submit</button></footer>

              </div>
            </form>
          </article>
        </li>
      </ul>
    </section>
  </div>

 <script>

  if ("<?php if(isset($_GET['msg'])) echo $_GET['msg'];?>" == "Registered successfully !") {
      swal({
      icon: "success",
      title: "Registered successfully !",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
      closeOnConfirm: false
  }).then(function(result)
      {
        window.location = "registration-form.php";
      }
  )}

  else if("<?php if(isset($_GET['msg'])) echo $_GET['msg'];?>" == "Already registered") {
      swal({
      icon: "error",
      title: "Already registered",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
      closeOnConfirm: false
  }). then(function(result)
    {
    window.location = "registration-form.php";
    }
  )}

  else if ("<?php if(isset($_GET['error'])) echo $_GET['error'];?>" == "Invalid Aadhar number" ){
  swal ({
    title : "Invalid Details",
    text : "Please enter your details correctly..!",
    icon: "error",
    showConfirmButton: true,
    confirmButtonText: "Cerrar",
    closeOnConfirm: false
}). then(function(result)
  {
    window.location = "registration-form.php";
  }
)}
  
 
  </script>

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
            <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a><span><strong>Send us a mail:</strong > srujanraik99@gmail.com</span></div>
          </li>
           </ul>
      </section>
    </div>


    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>