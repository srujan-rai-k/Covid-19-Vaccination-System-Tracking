<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $state = "";
  $state = test_input($_POST["state"]);
  include_once '../Admin/connection.php';
  $result1 = mysqli_query($conn,"SELECT COUNT(*) FROM vaccinated WHERE state='$state'");
  $result2 = mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE state='$state'");
  $row1 = mysqli_fetch_array($result1);
  $row2 = mysqli_fetch_array($result2);

}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Vaccination Statistics</title>
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
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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

    <div class="container">
        <form method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
            <select class="search-bar" name="state" onchange = "this.form.submit()">
                <option value="state" disabled selected>Choose State</option>
                <option>Karnataka</option>
                <option>Maharashtra</option>
                <option>Rajasthan</option>
                <option>UttarPradesh</option>
                <option>AndhraPradesh</option>
            </select>
        </form>
    </div>


    <script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
        {
            theme: "light2",
            title:{
                text: "Vaccination Status of <?php echo $state ?>"
            },		
            data: [
            {       
                type: "pie",
                showInLegend: true,
                toolTipContent: "{y} - #percent %",
                legendText: "{indexLabel}",
                dataPoints: [
                    {  y: <?php echo $row1['COUNT(*)']+$row2['COUNT(*)'] ?>, indexLabel: "Total Registrations" },
                    {  y: <?php echo $row1['COUNT(*)'] ?>, indexLabel: "Vaccinated" },
                    {  y: <?php echo $row2['COUNT(*)'] ?>, indexLabel: "Yet to vaccinate" }
                ]
            }
            ]
        });
        chart.render();
    }
    </script>
    <div id="chartContainer"></div>


   <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

</body>
</html>