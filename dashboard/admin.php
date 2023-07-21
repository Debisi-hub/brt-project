<?php   
session_start();  

$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["admin"])){  
    header("location:../login/index.htm");  
}if(isset($_SESSION["login"]) && (!isset($_SESSION["admin"]))){  
    header("location:../dashboard/index.php");  
}
if(isset($_SESSION["login"]) && (isset($_SESSION["admin"]))){  
    header("location:../dashboard/logout.php");  
}
if(isset($_SESSION["admin"]) && !isset($_SESSION["login"])) {  
  if(!isset($_SESSION['alert'])){
    echo '<script>alert("Welcome to iTrans!\nE-payment Service for Bus Rapid Transit")</script>';
    $_SESSION['alert'] = 'ok';
  }
$_SESSION["transactions"]="admin";
if(isset($_POST['addprice'])){
$routeplus = $_POST['terminal1'] .' to ' .$_POST['terminal2'];
$newticketp = $_POST['ticketprice'];
$query = "UPDATE `info` SET `ticket_price`= '$newticketp' WHERE `routes` = '$routeplus'";
  $rs=mysqli_query($conn,$query) or die("Could Not Perform the Query"); 
}
if(isset($_POST['generate'])){
  if($_POST['values']=="dr"){
    $_POST['dr'] = 'dr';
    header("Location: dreport.php");
  }
  if($_POST['values']=="mr"){
    $_POST['mr'] = 'mr';
    header("Location: mreport.php");
  }
  if($_POST['values']=="yr"){
    $_POST['yr'] = 'yr';
    header("Location: yreport.php");
  }


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
    <meta name="description" content="iTrans DATA. Recharge Smarter.">
    <meta name="keywords" content="">


    <meta name="google-site-verification" content="">
    <meta name="naver-site-verification" content="">


    <title> iTrans DATA </title>

    <link rel="icon" type="image/jpg" href="../img/itrans.png">

      
    

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap_1680.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_front_1680.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <script type="text/javascript" async="" src="../js/_Incapsula_Resource.js"></script>
    <script async="" src="../js/analytics.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/svg4everybody.legacy.min.js"></script>

    <!-- Open graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Largest Recharging website ">
    <meta property="og:description" content="">
            <meta property="og:url" content="">
        <meta property="og:image" content="../img/itrans.png">

<link href="css/widget.css" rel="stylesheet">
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
<div style="background-image:url('datap.jpg'); filter:blur(8px); -webkit-filter:blur(8px); height:100%; background-position:center; background-repeat:no-repeat; background-size:cover;">
</div>
<div  class="container">
    <div class="row splash-main">
    
        <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h4>Welcome, <?=$_SESSION['admin'];?>!  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="logout.php">Logout</a></h4>
            <span>Update Routes and Prices</span>

            <form action="" id="UserLoginNowForm" method="post" accept-charset="utf-8">
	            <div style="display:none;"><input type="hidden" name="_method" value="POST">
                 <input type="hidden" name="key" value="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" id="Token1532892527">
	            </div>
                <div class="form-group required">
                 <input name="terminal1" class="form-control" placeholder="Bus Terminal 1 - Entry" type="text" id="terminal1" required="required">
	            </div>
                <div class="form-group required">
                    
	            	<input name="terminal2" class="form-control" placeholder="Bus Terminal 2 - Destination" type="text" id="terminal2" required="required">
	            </div>
                
	            <div class="form-group required">
                    
	            	<input name="ticketprice" class="form-control" placeholder="Ticket Price " type="text" id="ticket" required="required">
	            </div>
	            <div class="form-group captcha-box">
	                                                <!--<div class="g-recaptcha" data-sitekey="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" data-callback="enableBtn"></div>--> 
                                                    <div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff; text-align:center;" name="addprice" id="signInButton1" type="submit" value="Add Route & Price" disabled="">
		            	</div>
                        
                       

		            	<div style="display:none;">
		            		<input type="hidden" name="data[_Token][fields]" value="a8f894205ef2839927d5ad906c061462f4424136%3A" id="TokenFields2092665347">
		            		<input type="hidden" name="data[_Token][unlocked]" value="User.form_type%7Cg-recaptcha-response" id="TokenUnlocked836959454">
		            	</div>
		        </div>
            </form>

            <form method="post" action="prices.php">
<div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff; text-align:center;" name="viewprice" id="signInButton2" type="submit" value="View Routes and Prices" disabled="">
		            	</div>
</form>
            <form method="post" action="transactions.php">
            <div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff; text-align:center;" name="viewtrans" id="signInButton" type="submit" value="View Transactions" disabled="">
		            	</div>
</form>
<div style=" text-align:center;">
  <br/>
  <h4>Generate Report</h4>
</div>
<form method='post' action=''>
<div class="form-group required" style="color:#ffffff; text-align:center;">
            <select name="values" class="form-control" id="pet-select" required>
              <option value="">--Select an Option--</option>
              <option value="dr">Daily Report</option>
              <option value="mr">Weekly Report</option>
              <option value="yr">Yearly Report</option>
              
              
          </select>
          <br/>
          <button name= "generate" class="btn btn-primary" style="color:#ffffff; text-align:center;">Generate</button>
          </div>
</form>
        </div>
    </div>

</div>
<script type="text/javascript">
              document.getElementById("signInButton").disabled = false;
            function enableBtn(){
        document.getElementById("signInButton").disabled = false;
      }

      document.getElementById("signInButton1").disabled = false;
            function enableBtn(){
        document.getElementById("signInButton1").disabled = false;
      }
      document.getElementById("signInButton2").disabled = false;
            function enableBtn(){
        document.getElementById("signInButton2").disabled = false;
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
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
mysqli_close($conn);}
?>