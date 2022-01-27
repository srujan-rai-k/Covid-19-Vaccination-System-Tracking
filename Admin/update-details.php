<?php
$aadharno = $_POST['aadharno'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$email = $_POST['email'];
//$gender = $_POST['gender'];

$phno = $_POST['phno'];

$address = $_POST['address'];
$pincode = $_POST['pincode'];



// Create connection

    $connection = 'connection.php';
    include $connection;
    
    $sql = "UPDATE users SET name = '$name', dob='$dob',age='$age',email='$email',phno='$phno',address= '$address',pincode= '$pincode' WHERE aadharno = '$aadharno'";
  
    if (mysqli_query($conn, $sql)) {
        $to = "$email";
        $subject = "Your details are updated";
        $body = "Dear user Thank you for registering for Covid-19 vaccination. Your details have been updated successfully";
        $header = "From: srujanraik99@gmail.com";
        mail($to, $subject, $body, $header);
        $msg = "Updated successfully !";
        } 
        elseif(mysqli_errno($conn) == 1062){
            $msg = "Already registered";
        }
        else {
            $msg =  mysqli_error($conn);
        }
        
        header("Location:https://covid-vaccination.azurewebsites.net/Admin/update.php?msg=$msg");
        mysqli_close($conn);

    ?>
