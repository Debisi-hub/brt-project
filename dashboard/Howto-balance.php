<?php   
session_start();  

$conn=mysqli_connect('localhost','iTransdata_logindb','Jehovah..,,??1','iTransdata_logindbs') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["login"])){  
    header("location:login/index.htm");  
}

 if(isset($_SESSION["admin"]) && isset($_SESSION["login"])){
  header("Location: dashboord/logout.php");
 }
 if((isset($_SESSION["login"]))&&(isset($_POST['btnlogins']))){
     header ("Location: dashboard/index.php");
 }
 if((isset($_SESSION["login"]))){
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
  </head>
<body >

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
                        <h4>Welcome, <?=$_SESSION['login'];?>!  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="dashboard/logout.php">Logout</a></h4>
           
            <form action="" id="UserLoginNowForm" method="post" accept-charset="utf-8">
	            <div style="display:none;"><input type="hidden" name="_method" value="POST">
	            	<input type="hidden" name="key" value="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" id="Token1532892527">
	            </div>
	            <div class="form-group required">
                <p>
                Note: To check MTN SME Data. Dial *461*4# <br/>
                Note: To check GLO Data Balance. Dial *127*0# <br/>
                Note: To check Airtel Data Balance. Dial *140# <br/>
                Note: To check 9mobile Data Balance. Dial *229*9# <br/>
                <a href="https://chat.whatsapp.com/DwUoXBjTN6o1tOwvB5CBxT"> . </a>
                </p>
                    </div>
	           
          
	    
                  <div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff; text-align:center;"  name="btnlogins" id="signInButtons" type="submit" value="Back to Profile" disabled="">
		            	</div>
		            	<div style="display:none;">
		            		<input type="hidden" name="data[_Token][fields]" value="a8f894205ef2839927d5ad906c061462f4424136%3A" id="TokenFields2092665347">
		            		<input type="hidden" name="data[_Token][unlocked]" value="User.form_type%7Cg-recaptcha-response" id="TokenUnlocked836959454">
		            	</div>
		        </div>
            </form>

            <form name="myform" id="myForm">

        </div>
    </div>

</div>
<script type="text/javascript">
              
              document.getElementById("signInButtons").disabled = false;
            function enableBtn(){
        
        document.getElementById("signInButtons").disabled = false;
      }
</script>


    
</body>
</html>
<?php  
mysqli_close($conn);}  
?>