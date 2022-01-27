<?php
require_once "sessionstart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vaccinate</title>
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
   h2.text-center{
       font-size : 40px;
       margin-bottom : 40px;
   }
    .data{
        margin-right : auto;
        width : 100%;
        border : 2px solid #53D3DE;
        background-color : #F4F4F4;
    }
    .data tbody tr th,td{
        width : 20%;
        font-size : 120%;
    }
    .container table.data>tbody>tr>th, td {
        border-bottom : 0px solid #53D3DE ;
        padding-top : 10px;
        padding-bottom : 10px;
        padding-left: 15px;
        border: 1px solid black;
    }
    td{
        font-size : 17px;
        border: 1px solid black;
    }
    .vaccinated-btn{
        margin-top : 50px;
        margin-left : auto;
        margin-right : auto;
        display : block;
    }
   button a:hover{
       text-decoration : none;
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
            <button type="submit">Submit</button>
        </div>
    </form>

    <div class="container">
       <table class="data">

    <?php
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
       }
         if ($_SERVER["REQUEST_METHOD"] == "POST"){
          $aadharno = "";
          $aadharno = test_input($_POST["aadharno"]);
          include "connection.php";
          $result = mysqli_query($conn,"SELECT * FROM alloted WHERE aadharno = $aadharno ");
          if(mysqli_num_rows($result) > 0){
            $row= mysqli_fetch_array($result);
            ?>
                <h2 class="text-center">Details</h2>

            <tr>
              <th>Aadhar Number</th>
              <td><?php echo $row['aadharno'] ?></td>
            </tr>
            <tr>
                <th>Name </th>
                <td><?php echo $row['name'] ?></td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td><?php echo $row['dob'] ?></td>
            </tr>
            <tr>
              <th>Age</th>
              <td><?php echo $row['age'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $row['email'] ?></td>
            </tr>
            <tr>
                <th>Mobile number</th>
                <td><?php echo $row['phno'] ?></td>
            </tr>
            <tr>
                <th>Job</th>
                <td><?php echo $row['job'] ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $row['state'] ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $row['city'] ?></td>
            </tr>
            <tr>
              <th>Address</th>
              <td><?php echo $row['address'] ?></td>
            </tr>
            <tr>
              <th>Pincode</th>
              <td><?php echo $row['pincode'] ?></td>
            </tr>
            <?php
          }
          else{?>
            <h2 class="text-center">No data Found ⚠️⚠️</h2>
            <?php
          }
   
        } ?>

      </table>
     <a href="vaccinated.php?aadharno=<?php echo $row["aadharno"];?>"><button class="vaccinated-btn" type="submit"> Vaccinated <i class="fa fa-check" aria-hidden="true"></i></button></a>
  </div> 

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
                window.location = "vaccinate.php";
              }
            )};
    </script>


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