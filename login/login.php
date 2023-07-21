<?php
extract($_POST);


if(isset($_POST["btnlogin"]))
{
    
    
    $conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
    $fs = mysqli_query($conn,"select * from useracc where email='$email'");
    $ss = mysqli_query($conn,"select * from useracc where username='$email'");
    if(empty($row[(mysqli_fetch_array($ss))])){
        $value = $email;
        $es = mysqli_query($conn,"select * from useracc where email='$value' and password='$pass'");
        if(mysqli_num_rows($es) <1 )
	{
		$found="N";
	}
	else
	{
        if($value=="admin@itrans.com"){
            session_start();
            $_SESSION["admin"] = $value;
        }else{
        session_start();  
        $_SESSION["login"]=$value;
        }
	}
    }
    if(empty($row[(mysqli_fetch_array($fs))])){
        $value = $email;
        $us=mysqli_query($conn,"select * from useracc where username='$value' and password='$pass'");
        if(mysqli_num_rows($us) <1 )
	{
		$found="N";
	}
	else
	{
        if($value=="admin"){
            session_start();
            $_SESSION["admin"] = $value;
        }else{
        session_start();  
        $_SESSION["login"]=$value;
        }
	}
    }

}

if (isset($_SESSION["login"]) && ($value !== "admin" || $value !=="admin@itrans.com") )
{
    $is=mysqli_query($conn,"select * from useracc where username='$value' or email='$value'");
    $row = mysqli_fetch_array($is);
    $newvalue = $row['username'];

    $_SESSION["login"]=$newvalue;
    header("Location: ../dashboard/index.php");  
}
if (isset($_SESSION["admin"])){
    $_SESSION["admin"] = "admin";
    header("Location: ../dashboard/admin.php"); 
}
mysqli_close($conn);
?>


<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="description" content="iTrans DATA. Recharge Smarter.">
    <meta name="keywords" content="">


    <meta name="google-site-verification" content="">
    <meta name="naver-site-verification" content="">


    <title> iTrans DATA </title>

    <link rel="icon" type="image/jpg" href="img/iTrans_logo.png">

      
    

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
        <meta property="og:image" content="localhost/iTransimg/iTrans_logo.png">

<link href="../css/widget.css" rel="stylesheet">
</head>

<body id="gm-home">
<header>
    <div class="header">
      <nav class="navbar" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header col-xs-3 col-sm-3 col-md-2">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-xs" href="" style="margin-top:69px;" title="iTrans DATA"><img src="img/iTrans_logo.png" height="130"></a>
                    <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="" style="margin-top:-2px;" title="iTrans DATA"><img src="img/iTrans_logo.png"  height="76"></a>
                </div>

                <div class="col-xs-9 col-sm-9 col-md-10">
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul itemscope="" itemtype="http://www.schema.org/SiteNavigationElement" class="nav navbar-nav navbar-right nav-main">
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="" title="Home">Home</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="index.htm#gm-home-3" title="Services">Services</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="login/index.htm" title="Recharge Now">Recharge Now</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="contact-us.htm" title="Any Enquiry">Contact Us</a></li>


                            <li class="mob-nav-language"><a href="" title="Change Language" data-toggle="modal" data-target="#ModalLanguageMobile"><span class="flag-box"><svg class="gm-flag flag-ENG"><use xlink:href="#flag-ENG"></use></svg></span> Change Language                            </a></li>
                        </ul>
                        <div class="nav-up col-xs-12 col-sm-12 pull-right">
                            <ul itemscope="" itemtype="http://www.schema.org/SiteNavigationElement" class="nav navbar-nav navbar-right nav-log">

                                <li itemprop="name" class="nll"><a class="navbar-link nav-login" itemprop="url" href="login/index.htm" title="Log in">Login</a></li>
                                <li itemprop="name" class="nls"><a class="navbar-link nav-signup" itemprop="url" href="register/index.htm" title="Create Account">Create Account</a></li>
                                                      </ul>

                            <!-- <span class="current-language no-collapse">
                              <div id="google_translate_element"></div><script type="text/javascript">
                              function googleTranslateElementInit() {
                                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
                              }
                              </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </nav>
    </div>
</header>
    <?php
		  if(isset($found))
		  {
		  	echo ' <div class="container">
              </div>
              
            <div class="container" >
                <div class="row splash-main"> 
                <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="alert alert-success">
              <button type="button" class="close" title="exit message" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>Invalid Email/Password. Try Again...</div> </div> </div> </div>';
          }
          
		  ?>


 
<br />

  
<div class="container">
    <div class="row splash-main">
    
        <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h2>Login</h2>
            <span>Please enter your login data</span>

            <form  action="" id="UserLoginNowForm" method="post" accept-charset="utf-8">
	            <div style="display:none;"><input type="hidden" name="_method" value="POST">
	            	<input type="hidden" name="key" value="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" id="Token1532892527">
	            </div>
	            <div class="form-group required">
	            	<input name="email" class="form-control" placeholder="E-mail or Username" type="text" id="UserEmail" required="required">
	            </div>
	            <div class="form-group required">
	            	<input name="pass" class="form-control" placeholder="Password" type="password" id="UserPassword" required="required">
	            </div>
	            
	            <p class="text-center"><a href="https://www.wazobiaweb.cash/?view=password_reset" class="text-warning">Lost your password?</a> |
	            	<a href="https://www.wazobiaweb.cash/register/" class="text-warning btn btn-default">Register</a>
	            </p>

	            <div class="form-group captcha-box">
	                                                <!--<div class="g-recaptcha" data-sitekey="6Lfwu8sUAAAAAGi3hFs-D8F8o2ZLI1mzBA2fIRiS" data-callback="enableBtn"></div>--> 
                        	            		<div class="submit">
		            		<input class="btn btn-primary" style="color:#ffffff;" name="btnlogin" id="signInButton" type="submit" value="Login" disabled="">
		            	</div>
		            	<div style="display:none;">
		            		<input type="hidden" name="data[_Token][fields]" value="a8f894205ef2839927d5ad906c061462f4424136%3A" id="TokenFields2092665347">
		            		<input type="hidden" name="data[_Token][unlocked]" value="User.form_type%7Cg-recaptcha-response" id="TokenUnlocked836959454">
		            	</div>
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
    </script>


<footer id="gm-content">
    <div class="gm-footer-top">        <div class="container">
            <div class="row">

                <div class="col-xs-6 col-sm-6">
                    <div class="row">
                        <div class="col-md-12 gm-footer-members">
                            <h3>Best Deals.</h3>
                            
                            <ul class="gm-footer-ml">
                                <li class="gm-footer-ml-singup"><a class="btn btn-sm btn-warning" href="register/index.htm" title="Sign Up">Create Account</a>
                                </li>
                                <li class="gm-footer-ml-login"><a class="btn btn-sm btn-primary" href="login/index.htm" title="Login">Log in</a>
                                </li>
                            </ul>
                        </div>

                      
                    </div>
                </div>

                <div class="col-xs-5 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-0 gm-footer-menu">
                    <h3>&nbsp;</h3>
                   
                    <ul class="footer-nav-b1">
                        <li><a class="" href="" title="Home">Home</a></li>
                        <li><a class="" href="#gm-home-3" title="Services">Services</a></li>
                        <li><a class="" href="contact-us.htm" title="Any Enquiry">Contact Us</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="gm-footer-bottom">
      <div class="container">
            <div class="row">


                <div class="col-xs-12 col-md-6 col-md-push-6 gm-footer-secure">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <address>
                                iTrans<br>Powered by<br>iTrans Services.<br><br>
                                Contact Support:<br>
                                <br>
                                <br/><a href="https://chat.whatsapp.com/DwUoXBjTN6o1tOwvB5CBxT"> . </a>
                              </address>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <address>
                                Payments processed by:<br><br>
                                iTrans Services.
                            </address>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-sm-offset-1 gm-ssl">
                            <svg class="gm-icon gm-icon-ssl">
                                <use xlink:href="sprite.svg#gm-icon-ssl"></use>
                            </svg>
                        </div>
                    </div>
                </div>



                <div class="col-xs-6 col-md-6 col-md-pull-6 gm-footer-copyright">
                        <a class="footer-home" style="margin-top:82px;" href="" title="Investors Forum"><img src="img/iTrans_logo.png" width="100"></a>

                </div>

                <div class="clearfix"></div>
                <div class="col-sm-12 gm-footer-disclaimer">
                    <p> The information on this website does not convey an offer of any type and is not intended to be, and should not be construed as, an offer to sell, or the solicitation of an offer to buy, any securities, commodities, or other financial products.</p>
                </div>
            </div>
        </div>
    </div>
  </footer>
</body>
</html>
