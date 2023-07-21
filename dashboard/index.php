<?php   
session_start();  
date_default_timezone_set('Africa/Lagos');
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());

if(!isset($_SESSION["login"])){  
    header("location:../login/index.htm");  
}
if(isset($_SESSION["login"])){  
    
  $email = $_SESSION['login'];
  $conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
  $ss = mysqli_query($conn,"select * from useracc where username='$email'");
  $row = mysqli_fetch_array($ss);
  $_SESSION['emailid'] = $row['email'];
  $email = $row['email'];
  $accbal = $row['accdet'];
 

  if(!isset($_SESSION['alert'])){
    echo '<script>alert("Welcome to iTrans!\nE-payment Service for Bus Rapid Transit")</script>';
    $_SESSION['alert'] = 'ok';
  }


// This function will generate 
if((isset($_SESSION["login"])) && (isset($_POST["btnlogin"])))    {
$_SESSION['amount'] = $_POST['ticPrice'];
header("Location: ../dashboard/initialize.php");
}
if(($_POST["state"] =="Ikorodu") && (isset($_SESSION["login"])) && (isset($_POST["btnlogins"]))){
  if($_POST["countrya"]=="Ojota"){
    $_SESSION['price'] = 50;
    $amt = 50;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N50';
     $price = 50;;
      echo '<script > alert("Trip Booked!\nBus Route: Ikorodu - Ojota\nBus Fare: N50\nEstimated Time: 15mins\nRef ID: '.$refs.' ")</script>';
      $routeid = "Ikorodu to Ojota";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'Ikorodu - Ojota';
      $_SESSION['utime'] = '15mins';
      
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  
   
  }
  if(($_POST["countrya"]=="Ketu")){
    $_SESSION['price'] = 70;
    $amt = 70;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $_SESSION['ucost'] = 'N70';
     $price = 70;
      $curdates = date("Y-m-d H:i:s");
            echo '<script >alert("Trip Booked!\nBus Route: Ikorodu - Ketu\nBus Fare: N70\nEstimated Time: 20mins\nRef ID: '.$refs.'")</script>';
            $routeid = "Ikorodu to Ketu";
            $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
            mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
            $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'Ikorodu - Ketu';
      $_SESSION['utime'] = '20mins';
      $_SESSION['ucost'] = 'N70';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
          }
   
  }
  if($_POST["countrya"]=="Mile 12"){
    $_SESSION['price'] = 100;
    $amt = 100;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $_SESSION['ucost'] = 'N100';
     $price = 100;
      $curdates = date("Y-m-d H:i:s");
      $routeid = "Ikorodu to Mile 12";
      echo '<script >alert("Trip Booked!\nBus Route: Ikorodu - Mile 12\nBus Fare: N100\nEstimated Time: 20mins\nRef ID: '.$refs.'")</script>';
           
      $queryuser = "INSERT INTO `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'Ikorodu - Mile 12';
      $_SESSION['utime'] = '20mins';
      $_SESSION['ucost'] = 'N100';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
            
          }
    
   
  }
  if($_POST["countrya"]=="New Garage"){
    $_SESSION['price'] = 100;
    $amt = 100;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $_SESSION['ucost'] = 'N100';
     $price = 100;
      $curdates = date("Y-m-d H:i:s");
      echo '<script >alert("Trip Booked!\nBus Route: Ikorodu - New Garage\nBus Fare: N100\nEstimated Time: 20mins\nRef ID: '.$refs.'")</script>';
      $routeid = "Ikorodu to New Garage";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");

      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'Ikorodu - New Garage';
      $_SESSION['utime'] = '20mins';
      $_SESSION['ucost'] = 'N100';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }
   }
if(($_POST["state"]=="CMS") && (isset($_SESSION["login"]))&& (isset($_POST["btnlogins"]))){
  if($_POST["countrya"]=="Ketu"){
    $_SESSION['price'] = 70;
    $amt = 70;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $_SESSION['ucost'] = 'N70';
     $price = 70;
      $curdates = date("Y-m-d H:i:s");
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Ketu\nBus Fare: N70\nEstimated Time: 15mins\nRef ID: '.$refs.'")</script>';
      $routeid = "CMS to Ketu";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`,  `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Ketu';
      $_SESSION['utime'] = '15mins';
      $_SESSION['ucost'] = 'N70';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }
  if($_POST["countrya"]=="Ojota"){
    $_SESSION['price'] = 100;
    $amt = 100;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Ojota\nBus Fare: N100\nEstimated Time: 15mins\nRef ID: '.$refs.'")</script>';
      $routeid = "CMS to Ojota";
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N100';
     $price = 100;
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`,  `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Ojota';
      $_SESSION['utime'] = '15mins';
      $_SESSION['ucost'] = 'N100';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }
  if($_POST["countrya"]=="Mile 12"){
    $_SESSION['price'] = 50;
    $amt = 50;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N50';
     $price = 50;
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Mile 12\nBus Fare: N50\nEstimated Time: 10mins\nRef ID: '.$refs.'")</script>';
      $routeid = "CMS to Mile 12";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Mile 12';
      $_SESSION['utime'] = '10mins';
      $_SESSION['ucost'] = 'N50';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }
  if($_POST["countrya"]=="Ketu"){
    $_SESSION['price'] = 50;
    $amt = 50;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N50';
     $price = 50;
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Ketu\nBus Fare: N50\nEstimated Time: 15mins\nRef ID: '.$refs.'")</script>';
      $routeid = "CMS to Ketu";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");

      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Ketu';
      $_SESSION['utime'] = '15mins';
      $_SESSION['ucost'] = 'N50';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }
  if($_POST["countrya"]=="Oshodi"){
    $_SESSION['price'] = 150;
    $amt = 150;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N150';
     $price = 150;
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Oshodi\nBus Fare: N150\nEstimated Time: 25mins\nRef ID: '.$refs.' ")</script>';
      $routeid = "CMS to Oshodi";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`, `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Oshodi';
      $_SESSION['utime'] = '25mins';
      $_SESSION['ucost'] = 'N150';
      
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");
    }
  }

  if($_POST["countrya"]=="Ikorodu"){
    $_SESSION['price'] = 100;
    $amt = 100;
    if($_SESSION['price'] > $accbal){
      echo '<script >alert("Insufficient Balance")</script>';
    }
    else{
      function random_strings($length_of_string) 
      { 
          $str_result = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
          return substr(str_shuffle($str_result), 0, $length_of_string); 
      } 
      
      // This function will generate 
      // Random string of length 8
           $query = "UPDATE `useracc` SET `accdet`=`accdet` - '$amt' WHERE `email` = '$email'";
      $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query");
      $ss = mysqli_query($conn,"select * from useracc where `email`='$email'");
      $row = mysqli_fetch_array($ss);
      $refs = (random_strings(8));
      $accbal = $row['accdet'];
      $curdates = date("Y-m-d H:i:s");
      $_SESSION['ucost'] = 'N100';
     $price = 100;
      echo '<script >alert("Trip Booked!\nBus Route: CMS - Ikorodu\nBus Fare: N100\nEstimated Time: 20mins\nRef ID: '.$refs.'")</script>';
      $routeid = "CMS to Ikorodu";
      $queryuser = "INSERT into `transactions`(`email`, `ticketid`,  `Amount`,`routeid`,`Status`,`Date`) VALUES('$email','$refs','$price','$routeid','unused','$curdates')";
      mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
      $_SESSION['umail'] = $email;
      $_SESSION['uref'] = $refs;
      $_SESSION['ubusroute'] = 'CMS - Ikorodu';
      $_SESSION['utime'] = '20mins';
      $_SESSION['urouteid'] = $routeid;
      $_SESSION['udate'] = $curdates;
      $_SESSION['receipt'] = 'valid';
      header("Location: receipt.php");

    }
  }
 }


 
 if(isset($_SESSION["admin"]) && isset($_SESSION["login"])){
  header("Location: ../dashboard/logout.php");
 }

?>  

<!DOCTYPE html>
<html lang="en">
<head>
      
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162222857-3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-162222857-3');
        </script>

      
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="robots" content="index, follow">
      <meta name="description" content="">
      <meta name="keywords" content="">


      <meta name="google-site-verification" content="">
      <meta name="naver-site-verification" content="">

      <title>iTrans DATA</title>

      <link rel="icon" type="image/png" href="../img/iTrans_logo.png">

      <!-- CSS -->
      <link rel="stylesheet" type="text/css" href="../css/theme1/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/morris.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/style_dash.min.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/custom.css">
  <link rel="stylesheet" type="text/css" href="../css/theme1/jquery.dataTables.css">

  <!--<script src="https://www.wazobiaweb.cash/js/theme1/365584476983376" async=""></script>
  <script async="" src="https://www.wazobiaweb.cash/js/theme1/fbevents.js"></script>
  <script type="text/javascript" async="" src="https://www.wazobiaweb.cash/js/theme1/2700f421a76d827cbf11f5f8099b08e11837c20b.1.js"></script>
  <script type="text/javascript" async="" src="https://www.wazobiaweb.cash/js/theme1/i.js"></script>
  <script type="text/javascript" async="" src="https://www.wazobiaweb.cash/js/theme1/_Incapsula_Resource"></script>-->
  <script async="" src="../js/theme1/analytics.js"></script>
  <script type="text/javascript" src="../js/theme1/jquery-2.1.2.min.js"></script>
  <script type="text/javascript" src="../js/theme1/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/theme1/menu.js"></script>
  <script type="text/javascript" src="../js/theme1/raphael-min.js"></script>
  <script type="text/javascript" src="../js/theme1/morris.js"></script>
  <script type="text/javascript" src="../js/theme1/dashboard.js"></script>
  <script type="text/javascript" src="../js/theme1/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="../js/theme1/dataTables.js"></script>
    <script type="text/javascript" src="../js/theme1/svg4everybody.min.js"></script>
    <script type="text/javascript">svg4everybody();</script>
    
    <link href="../css/theme1/widget.css" rel="stylesheet">
    <script async="true" type="text/javascript" src="../js/theme1/roundtrip.js"></script>
    <div style="width: 1px; height: 1px; display: inline; position: absolute;">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(1)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(2)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(3)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(4)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(5)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(6)">
    </div>
    <div style="width: 1px; height: 1px; display: inline; position: absolute;">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(7)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(8)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(9)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(10)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(11)">
      <img height="1" width="1" style="border-style:none;" alt="" src="../css/theme1/out(12)">
    </div>
    <style>
      #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
      </style>
  </head>
<body >
<video autoplay muted loop id="myVideo">
  <source src="brt.mp4" type="video/mp4">
</video>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div >
</div>
<div  class="container">
    <div class="row splash-main">
    
        <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h4>Welcome, <?=$_SESSION['login'];?>!  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="../dashboard/logout.php">Logout</a></h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6749.882735472766!2d3.506972744342578!3d6.617837661074962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bee62d44ab573%3A0x44ddf6ea18edfcb3!2sIkorodu%2C%20Nigeria!5e1!3m2!1sen!2sus!4v1621557700671!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <span>Account Balance: &#8358;<?=$accbal; ?></span>
            <form action="" id="UserLoginNowForm" method="post" accept-charset="utf-8">
	            <div style="display:none;"><input type="hidden" name="_method" value="POST">
	            	<input type="hidden" name="key" value="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" id="Token1532892527">
	            </div>
	            <div class="form-group required">
                <select name="state" id="network" size="1" required="required">
                        <option value="" selected="selected">Select Entry</option>
                        </select>
                    </div>
	            <div class="form-group required">
                <select name="countrya" id="data" size="1" required="required">
<option value="" selected="selected" >Select Destination</option>
</select>
	            	 </div>
           


          
	            
	            <div class="form-group captcha-box">
	                                                <!--<div class="g-recaptcha" data-sitekey="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" data-callback="enableBtn"></div>--> 
                        	            		<div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff; text-align:center;"  name="btnlogins" id="signInButton" type="submit" value="Book Trip" disabled="">
		            	</div>
                  <br/>
                  
		            	<div style="display:none;">
		            		<input type="hidden" name="data[_Token][fields]" value="a8f894205ef2839927d5ad906c061462f4424136%3A" id="TokenFields2092665347">
		            		<input type="hidden" name="data[_Token][unlocked]" value="User.form_type%7Cg-recaptcha-response" id="TokenUnlocked836959454">
		            	</div>
		        </div>
            </form>

            <form action="" id="UserLoginNowForm" method="post" accept-charset="utf-8">
            <div class="form-group required">
            <input  name="ticPrice" class="form-control" placeholder="Ticket Price" value=""  type="number" id="phone" required="required" value="">
          </div>
	            <div style="display:none;"><input type="hidden" name="_method" value="POST">
	            	<input type="hidden" name="key" value="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" id="Token1532892527">
	            </div>
            <div class="submit">
		            		<input class="btn btn-primary" onclick=payWithPaystack() style="color:#ffffff; text-align:center;"  name="btnlogin" id="signInButtons" type="submit" value="Recharge Your Account" disabled="">
		            	</div>
</form>
        </div>
    </div>

</div>
<script type="text/javascript">
              document.getElementById("signInButton").disabled = false;
              document.getElementById("signInButtons").disabled = false;
            function enableBtn(){
        document.getElementById("signInButton").disabled = false;
        document.getElementById("signInButtons").disabled = false;
      }
var stateObject = {
"Ikorodu": [ "Ojota",
"Ketu",
"Mile 12",
"New Garage"
],
"CMS": [
"Ketu",
"Ojota", 
"Mile 12",
"Oshodi",
"Ikorodu"
]
}
window.onload = function () {
var network = document.getElementById("network"),
data = document.getElementById("data");


var counter = 0;
for (var state in stateObject) {
network.options[network.options.length] = new Option(state, state);



}

// reset in case page is reloaded
network.onchange = function () {
data.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
var district = stateObject[network.value];
for (var i=0; i<district.length; i++){
  data.options[data.options.length] = new Option(district[i], district[i]);
}
var mynet = document.getElementById("network").value;
var mylist = 
console.log(mynet);
var mydata = district.indexOf(this.value);


}
}
var video = document.getElementById("myVideo");

// Get the button
var btn = document.getElementById("myBtn");

// Pause and play the video, and change the button text
function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}


    </script>


    
</body>
</html>
<?php  
mysqli_close($conn);}  
?>