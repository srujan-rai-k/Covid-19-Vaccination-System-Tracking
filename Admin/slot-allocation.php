<?php
   include "connection.php";
   $result = mysqli_query($conn,"SELECT email from users where id='" . $_GET['id'] . "' ");
   $row= mysqli_fetch_array($result);
   $to = $row['email'];
   $subject = "Covid-19 Vaccination Slot Confirmed";
   $body = "Dear user Thank you for registering for Covid-19 vaccination. Your slot is alloted on ";
   $header = "From: srujanraik99@gmail.com";
   mysqli_query($conn,"INSERT INTO alloted SELECT id,aadharno,name,dob,age,email,job,phno,state,city,address,pincode FROM users WHERE id = '" . $_GET['id'] . "'");
   mysqli_query($conn,"DELETE FROM users WHERE id = '" . $_GET['id'] . "'");

   $msg = "Slot alloted successfully";
   header("Location:https://covid-vaccination.azurewebsites.net/Admin/allocate-slot.php?msg=$msg");
?>
