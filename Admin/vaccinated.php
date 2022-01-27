<?php
   include "connection.php";
   $result = mysqli_query($conn,"SELECT email from alloted where aadharno='" . $_GET['aadharno'] . "'");
   $row= mysqli_fetch_array($result);
   
   $to = $row['email'];
   $subject = "You have Successfully Vaccinated";
   $body = " ";
   $header = "From: srujanraik99@gmail.com";
   mysqli_query($conn,"INSERT INTO vaccinated SELECT id,aadharno,name,dob,age,email,job,phno,state,city,address,pincode FROM alloted WHERE aadharno = '" . $_GET['aadharno'] . "'");
   mysqli_query($conn,"DELETE FROM alloted WHERE aadharno = '" . $_GET['aadharno'] . "'");
   $msg = "Updated successfully !";
   header("Location:https://covid-vaccination.azurewebsites.net/Admin/vaccinate.php?msg=$msg");
?>
