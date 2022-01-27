<?php
include "sessionstart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Allocate Slot to Registered Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="admin-css/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="admin-css/homepage.css" type="text/css">
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

<body id="top">
  <style>
    table.casesupdate{
    border-collapse: collapse;
    margin-left : auto;
    margin-right : auto;
    width : 75%;
    }
    .casesupdate tr.tableheading{
      font-size : 130%;
      background-color: #c5edf7;
    }

    .casesupdate td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    .casesupdate tr:last-child{
      margin-bottom : 50px;
    }
    .footer{
      margin-top : 50px;
    }
    .slotallocbtn{
      background-color:#53D3DE;
      border : unset;
      margin-left : auto;
      margin-right : auto;
    }
    .slotallocbtn a{
      color : black;
      text-decoration : none;
    }
    .container .search-bar{
      width : 100%; /* 50%*/
    }
    .allocdate{
      padding: 2px;
      float: left;
      margin-left : 10px;
      width : 40%;
      border: #53D3DE 2px solid;
      border-radius: 5px;
    }
    input[type=text]{
      padding : 10px;
    }
  </style>
  
  <div class="topnav" id="myTopnav">
    <a href="home.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
    <a href="allocate-slot.php">View Registered users</a>
    <a href="update.php">Update user detail</a>
    <a href="vaccinate.php">Vaccinate</a>
    <a href="#cta"> <i class="fas fa-phone"></i> Contact Us</a>
    <a href="" class="logouticon"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>


  <div class="container">
    <form method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
      <select class="search-bar" name="city" onchange = "this.form.submit()">
          <option disabled selected>Select City</option>
          <option value="bangalore">Bangalore</option>
          <option value="jaipur">Jaipur</option>
          <option value="kanpur">Kanpur</option>
          <option value="hyderabad">Hyderabad</option>
          <option value="kota">Kota</option>
          <option value="mangalore">Mangalore</option>
          <option value="mumbai">Mumbai</option>
          <option value="mysore">Mysore</option>
          <option value="pune">Pune</option>
          <option value="varanasi">Varanasi</option>

      </select>
  <!--    <input class="allocdate" placeholder="Enter allocation date" onfocus="(this.type='date')" type="text"/>  -->
   </form>
  </div>

  <div style="overflow-x:auto;">
  <table class="casesupdate">

  <?php
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
       }
   //    if((isset($_GET['city']))){

   //    }

         if ($_SERVER["REQUEST_METHOD"] == "POST"){
          $city = "";
          $city = test_input($_POST["city"]);

          
        include "connection.php";
        $sql = "SELECT name,job,dob,age,phno,city,id FROM users where city = '$city' order by job,age desc,id";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) 
          { ?>

          <tr class="tableheading">
            <th>Name</th>
            <th>Job</th>
            <th>Date-of-Birth</th>
            <th>Age</th>
            <th>Mobile number</th>
            <th>City</th>
            <th>Action</th>
          </tr>
          <?php
            while($row = mysqli_fetch_array($result)) 
            {
        ?>
        <tr>
              <td><?php echo  $row["name"];?></td>
              <td><?php echo  $row["job"];?></td>
              <td><?php echo  $row["dob"];?></td>
              <td><?php echo  $row["age"];?></td>
              <td><?php echo  $row["phno"];?></td>
              <td><?php echo  $row["city"];?></td>
              <td><button class='slotallocbtn'><a href="slot-allocation.php?id=<?php echo $row["id"];?>"><?php echo  "Allocate slot" ?></a></button></td>
        </tr>

        <?php
            }
          } 
        else 
          { ?>
            <tr>
              <td>No Registered users were found in this city</td>
            </tr>
              <?php
          }
         mysqli_close($conn);
      }
     
    ?>
    </table>
    </div>

    <script>
      if ("<?php if(isset($_GET['msg'])) echo $_GET['msg'];?>" == "Slot alloted successfully") {
          swal({
              icon: "success",
              title: "Slot alloted successfully !",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
              closeOnConfirm: false
          }).then(function(result)
              {
                window.location = "allocate-slot.php";
              }
      )}
     
     </script>

    <div class="creators">
        <div class="hoc container testimonial clear">
          <h1 class="creatornames">Creator</h1> 
          <article><img src="../Icons/user.png" alt="srujan">
            <h6 class="heading">Srujan Rai K</h6>
            <em>Student at NIE</em></article>
        </div>
    </div>

    <div class="wrapper row3" id="footer">
      <section id="cta" class="hoc container clear"> 
        <ul class="nospace clear">
          <li class="one_half">
            <div class="block clear"><a href="mailto:srujanraik99@gmail.com"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong > srujanraik99@gmail.com</span></div>
          </li>
          </ul>
      </section>
    </div>


    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

</body>
</html>
