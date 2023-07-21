<?php
extract($_POST);
if(empty($_POST['email'])) {  
     
    header("location: ../register/index.htm");  
}

if(!empty($_POST['email'])) {
$conn=mysqli_connect('localhost','root','','iTrans') or die('Could not Connect My Sql:'.mysql_error());
$rs=mysqli_query($conn,"select * from users WHERE email='$email'");
$qs =mysqli_query($conn,"select * from users WHERE username='$username'");

if (mysqli_num_rows($rs)>0 || mysqli_num_rows($qs)>0)
{
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

    <link rel="icon" type="image/jpg" href="../img/iTrans_logo.png">

      
    

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap_1680.min.css">
    <link rel="stylesheet" type="text/css" href="css/style_front_1680.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <script type="text/javascript" async="" src="js/_Incapsula_Resource.js"></script>
    <script async="" src="js/analytics.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/svg4everybody.legacy.min.js"></script>

    <!-- Open graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Largest Recharging website ">
    <meta property="og:description" content="">
            <meta property="og:url" content="">
        <meta property="og:image" content="../img/iTrans_logo.png">

<link href="http://localhost/iTransdata/css/widget.css" rel="stylesheet">
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
                    <a class="navbar-brand hidden-xs" href="http://localhost/iTransdata/" style="margin-top:69px;" title="iTrans DATA"><img src="../img/iTrans_logo.png" height="130"></a>
                    <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="http://localhost/iTransdata/" style="margin-top:-2px;" title="iTrans DATA"><img src="../img/iTrans_logo.png"  height="76"></a>
                </div>

                <div class="col-xs-9 col-sm-9 col-md-10">
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul itemscope="" itemtype="http://www.schema.org/SiteNavigationElement" class="nav navbar-nav navbar-right nav-main">
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="localhost/iTrans" title="Home">Home</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="index.htm#gm-home-3" title="Services">Services</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="login/index.htm" title="Recharge Now">Recharge Now</a></li>
                            <li itemprop="name"><a itemprop="url" class="navbar-link " href="contact-us.htm" title="Any Enquiry">Contact Us</a></li>


                            <li class="mob-nav-language"><a href="http://localhost/iTransdata/" title="Change Language" data-toggle="modal" data-target="#ModalLanguageMobile"><span class="flag-box"><svg class="gm-flag flag-ENG"><use xlink:href="#flag-ENG"></use></svg></span> Change Language                            </a></li>
                        </ul>
                        <div class="nav-up col-xs-12 col-sm-12 pull-right">
                            <ul itemscope="" itemtype="http://www.schema.org/SiteNavigationElement" class="nav navbar-nav navbar-right nav-log">

                                <li itemprop="name" class="nll"><a class="navbar-link nav-login" itemprop="url" href="login/index.htm" title="Log in">Login</a></li>
                                <li itemprop="name" class="nls"><a class="navbar-link nav-signup" itemprop="url" href="register/index.htm" title="Create Account">Create Account</a></li>
                                                      </ul>

                            <!-- <span class="current-language no-collapse">
                              <div id="google_translate_element"></div><script type="text/javascript">
                              function googleTranslateElementInit() {
                                new google.translate.TranslateElement({pageLanguage: "en", layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, "google_translate_element");
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

    <br>
    <br />
<div class="container">
  </div>
  
<div class="container" style="margin-top:-80px;">
<div class="row splash-main">
<div class="alert alert-success">
						<button type="button" class="close" title="exit message" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>Email Address/Username Already Exists!.</div>
    <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h2>Sign Up</h2>
            <span>Please enter your personal information</span>

        <form action="" autocomplete="off" id="UserRegisterForm" method="post" accept-charset="utf-8">
          <div style="display:none;">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="key" value="6LfhxncUAAAAAFUzGEfIoy0Vz1R7K2ZyjP3CJDAu" id="Token1759140670">
          </div>
          
                    <div class="form-group required">
            <input  name="email" class="form-control" placeholder="E-mail" type="email" id="UserEmail" required="required" value="">
          </div>
          
              <div class="form-group required">
            <input  name="username" class="form-control" placeholder="Username" type="text" id="Username" required="required" value="">
          </div>
          
         
          <div class="form-group PhoneNumberInput">
            <input name="phone" class="form-control" placeholder="Phone Number" required="required" maxlength="11" type="PhoneNumberInput" id="UserPhoneNumber" value="">
            </div>

                    <div class="form-group">
            <input name="password" class="form-control" required="required" placeholder="Password" minlength="8" maxlength="200" type="password" id="UserChangePassword" value="">
            <div class="form-hint">Password must be at least 8 characters long.</div>
          </div>
          
                    <div class="form-group required">
            <input name="confirm_password" class="form-control" placeholder="Repeat password" minlength="8" maxlength="200" type="password" id="UserRepeatPassword" required="required" value="">
          </div>
             
          <div class="clearfix"></div>
    
          <p class="text-center"><a href="" class="text-warning">Lost your password?</a> | <a href="login/index.htm" class="text-warning">Already have an account?</a></p>

          <!--<div class="form-group captcha-box">
            <div class="g-recaptcha" data-sitekey="6LfhxncUAAAAAFUzGEfIoy0Vz1R7K2ZyjP3CJDAu" data-callback="enableBtn"></div>
          </div>-->
          <div class="submit">
            <input class="btn btn-primary" id="signUpButton" name="save" type="submit" value="Sign up" disabled="">
          </div>
          <div style="display:none;">
            <input type="hidden" name="data[_Token][fields]" value="b86c6be2bb5f6fdef1743a61b72cf4a89bbf7afb%3A" id="TokenFields493036425">
            <input type="hidden" name="data[_Token][unlocked]" value="User.form_type%7Cg-recaptcha-response" id="TokenUnlocked813289545">
          </div>
        </form>
      </div>
</div>
</div>
<script type="text/javascript">
    document.getElementById("signUpButton").disabled = false;
    function enableBtn(){
      document.getElementById("signUpButton").disabled = false;
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
                                <li class="gm-footer-ml-singup"><a class="btn btn-sm btn-warning" href="login/index.htm" title="Sign Up">Create Account</a>
                                </li>
                                <li class="gm-footer-ml-login"><a class="btn btn-sm btn-primary" href="register/index.htm" title="Login">Log in</a>
                                </li>
                            </ul>
                        </div>

                      
                    </div>
                </div>

                <div class="col-xs-5 col-xs-offset-1 col-sm-5 col-sm-offset-1 col-md-6 col-md-offset-0 gm-footer-menu">
                    <h3>&nbsp;</h3>
                   
                    <ul class="footer-nav-b1">
                        <li><a class="" href="localhost/iTrans" title="Home">Home</a></li>
                        <li><a class="" href="login/index.htm#gm-home-3" title="Services">Services</a></li>
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
                        <a class="footer-home" style="margin-top:82px;" href="localhost/iTrans" title="Investors Forum"><img src="../img/iTrans_logo.png" width="100"></a>

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
<?php
    
} else{

$query="insert into useracc(username,email,phone,password) values('$username','$email','$phone','$password')";
mysqli_query($conn,$query) or die("Could Not Perform the Query");
session_start();
$_SESSION['login']=$username;
header('Location: ../dashboard/index.php'); 
}
} 
?>







