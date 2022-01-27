<?php

$aadharno = $_POST['aadharno'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$email = $_POST['email'];
//$gender = $_POST['gender'];
$job = $_POST['job'];
$phno = $_POST['phno'];
$state = $_POST['state'];
$city = $_POST['city'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];



// Create connection
if (strlen($aadharno) != 12 ){
    $error = "Invalid Aadhar number";
    header("Location:https://covid-vaccination.azurewebsites.net/User/registration-form.php?error=$error");
}
else{
    $connection = '../Admin/connection.php';
    include $connection;
    $sql = "INSERT INTO users(aadharno,name,dob,age,email,job,phno,state,city,address,pincode) VALUES ( '$aadharno', '$name', '$dob', '$age','$email', '$job', '$phno', '$state', '$city', '$address', '$pincode')";
    $query = "SELECT * FROM alloted WHERE aadharno = '$aadharno' ";

    if ( mysqli_query($conn,$query)) {
        if (mysqli_num_rows($result) > 0) {
            $msg = "Already registered";
            header("Location:https://covid-vaccination.azurewebsites.net/User/registration-form.php?msg=$msg");
        }
        else if (mysqli_query($conn, $sql)) {
            $to = "$email";
            $subject = "Your registration Confirmed";
            $body = "Dear user Thank you for registering for Covid-19 vaccination. Your registration is confirmed. We will mail your slot soon";
            $header = "From: srujanraik99@gmail.com";
          //  mail($to, $subject, $body, $header);
            $msg = "Registered successfully !";
            } 
        elseif(mysqli_errno($conn) == 1062){
                $msg = "Already registered";
            }
        else {
                $msg =  mysqli_error($conn);
            }
            header("Location:https://covid-vaccination.azurewebsites.net/User/registration-form.php?msg=$msg");
            mysqli_close($conn);
        }
}
    ?>
