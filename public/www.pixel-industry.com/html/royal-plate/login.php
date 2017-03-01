<?php require_once('../../../../../Connections/katering.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_katering, $katering);
$query_Recordset1 = "SELECT tbluser.`user`, tbluser.password FROM tbluser";
$Recordset1 = mysql_query($query_Recordset1, $katering) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['name'])) {
  $loginUsername=$_POST['name'];
  $password=$_POST['psw'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index-2.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_katering, $katering);
  
  $LoginRS__query=sprintf("SELECT user, password FROM tbluser WHERE id=%s AND password=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $katering) or die(mysql_error());
$row = mysql_fetch_array($LoginRS);
$loginFoundUser = mysql_num_rows($LoginRS);

if($loginFoundUser>0){
$_SESSION['id'] = $row['id'];
      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['psw'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index-2.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_katering, $katering);
  
  $LoginRS__query=sprintf("SELECT email, password FROM tbluser WHERE email=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $katering) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>

<html>
    
<!-- Mirrored from www.pixel-industry.com/html/royal-plate/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Nov 2016 10:44:17 GMT -->
<head>
        <meta charset="utf-8">
        <title>E-katering UTHM</title>
        <meta name="description" content="Royal Plate is a HTML template created for restaurants and catering companies.">
        <meta name="author" content="pixel-industry">
        <meta name="keywords" content="CSS, HTML5, clean, restaurant, jQuery, retina, bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/><!-- bootstrap grid -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"/><!-- bootstrap theme -->
        <link rel="stylesheet" href="css/style.css"/><!-- template styles -->
        <link rel="stylesheet" href="css/color-default.css"/><!-- default template color styles -->
        <link rel="stylesheet" href="css/retina.css"/><!-- retina ready styles -->
        <link rel="stylesheet" href="css/responsive.css"/><!-- responsive styles -->
        <link rel="stylesheet" href="css/animate.css"/><!-- animation for content -->

        <!-- Google Web fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Suranna' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>

        <!-- Font icons -->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/><!-- Font awesome icons -->
    </head>

    <body>

        <!-- .header-wrapper start -->
        <div id="header-wrapper">
            <!-- #header start -->
            <header id="header">

                <!-- Main navigation and logo container -->
                <div class="header-inner">
                    <!-- .container start -->
                    <div class="container">
                        <!-- .main-nav start -->
                        <div class="main-nav">
                            <!-- .row start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- .navbar start -->
                                    <nav class="navbar navbar-default nav-left">									

                                        <!-- .navbar-header start -->
                                        <div class="navbar-header">
                                            <!-- .logo start -->
                                            <div class="logo">
                                                <a href="index-2.html">
                                                    <img src="img/logo.png" alt="Royal Plate Restaurant & Catering HTML Template">
                                                </a>
                                            </div><!-- logo end -->
                                        </div><!-- .navbar-header end -->

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                     <div class="collapse navbar-collapse">
                                         <div class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav pi-nav">
                                                <li class="current-menu-item dropdown">
                                                    <a href="#">Home</a> 
                                                    <ul class="dropdown-menu">
                                                        <li class="current-menu-item"><a href="index-2.php">Laman Utama</a></li>
                                                        <li><a href="register.php">Daftar</a></li>
                                                    </ul><!-- .dropdown-menu end -->
                                                </li><!-- .dropdown-menu end -->
                                                </li>

                                                <li>
                                                 <a href="search.php">Cari Katerer</a>
                                                </li>

                                               <li class="dropdown">
                                                    <a href="#">Menu</a> 
                                                    <ul class="dropdown-menu">
                                                        <li><a href="menu Pelbagai.php">Pelbagai Nasi</a></li>
                                                        <li><a href="menu-02.html">Pelbagai Buah</a></li>
                                                        <li><a href="menu-03.html">Pelbagai Minuman</a></li>
                                                        <li><a href="menu-04.html">Pelbagai Sayur</a></li>
                                                        <li><a href="menu-05.html">Paelbagi Kuih</a></li>
                                                        <li><a href="menu-06.html">Pelbagai Lauk-pauk</a></li>
                                                    </ul>
                                                
                                                 <li>
                                                    <a href="booking.php">Tempah Sekarang</a>                                          
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#">Akaun Saya</a> 
                                                    <ul class="dropdown-menu">
                                                         <li><a href="home.php">Log Keluar</a></li>
                                                    </ul><!-- .dropdown-menu end -->
                                                </li>
                                            </ul><!-- .nav.navbar-nav.pi-nav end -->

                                            <!-- Responsive menu start -->
                                             <div id="dl-menu" class="dl-menuwrapper">
                                                <button class="dl-trigger">Open Menu</button>

                                                <ul class="dl-menu">
                                                    <li>
                                                        <a href="#">Home</a>
                                                        <ul class="dl-submenu">
                                                            <li><a href="index-2.php">Laman Utama</a></li>
                                                            <li><a href="register.php">Daftar</a></li>
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- Home li end -->
                                                    <li>

                                                    <a href="search.php">Cari Katerer</a>
                                                    </li><!-- cari katerer li end -->
                                                    <li>

                                                    <li>
                                                        <a href="#">Menu</a>
                                                        <ul class="dl-submenu">
                                                        <li><a href="menu Pelbagai.php">Pelbagai Nasi</a></li>
                                                        <li><a href="menu-02.html">Pelbagai Buah</a></li>
                                                        <li><a href="menu-03.html">Pelbagai Minuman</a></li>
                                                        <li><a href="menu-04.html">Pelbagai Sayur</a></li>
                                                        <li><a href="menu-05.html">Paelbagi Kuih</a></li>
                                                        <li><a href="menu-06.html">Pelbagai Lauk-pauk</a></li>
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- Menu li end -->

                                                    <li>
                                                        <a href="booking.php">Tempah Sekarang</a>
                                                    </li><!-- booking li end -->
                                                    <li>
                                                        <a href="#">Akaun Saya</a>
                                                        <ul class="dl-submenu">
                                                            <li><a href="home.php">Log Keluar</a></li>
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- Catering li end -->

                                                </ul><!-- .dl-menu end -->
                                            </div><!-- (Responsive menu) #dl-menu end -->
                                        </div><!-- .navbar.navbar-collapse end --> 
                                    </nav><!-- .navbar end -->
                                </div><!-- .col-md-12 end -->
                            </div><!-- .row end -->            
                        </div><!-- .main-nav end -->
                    </div><!-- .container end -->
                </div><!-- .header-inner end -->
            </header><!-- #header end -->
        </div><!-- #header-wrapper end -->

        <!-- .page-content start -->
        <div class="page-content custom-img-background dark page-title page-title-4 mb-100">
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <!-- .col-md-12 start -->
                    <div class="col-md-12 centered">
                        <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                            <h1><span>Welcome Back</span></h1>
                            <h1>Login Page</h1>
                        </div><!-- .custom-heading.style-1 end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->

        <!-- .page-content start -->
        <div class="page-content">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row mb-0">
                    <div class="col-md-12 mb-20 centered triggerAnimation animated" data-animate='fadeIn'>
                        <div class="custom-heading style-1">
                            <h3><span>Already Have Account?</span></h3>
                            <h3>Please Sign In</h3>

                            <!-- .divider.style-1 start -->
                            <div class="divider style-1 center">
                                <span class="hr-simple left"></span>
                                <i class="fa fa-circle hr-icon"></i>
                                <span class="hr-simple right"></span>
                            </div>
                        </div><!-- .custom-heading.style-1 end -->
                    </div><!-- .col-md-12 end -->                    
                </div><!-- .row end -->

                <!-- .row start -->
                <div class="row">
                    <div class="col-md-12 centered">
                        <div class="row">
                            <!-- form start -->
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" class="">
                               
                                  <label><b><center> Email </center></b></label>
    <center><input type="text" placeholder="Enter Email" name="email"  required></center>
    <label><b><center>Password</center></b></label>
    <center><input type="password" placeholder="Enter Password" name="psw"  required></center><br>
        
    <center><button type="submit">Log Masuk</button></center>

                                
                          </form><!-- .wpcf7 end -->
                        </div>
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end --

        
        <!-- #footer-wrapper start -->
        <div id="footer-wrapper">
            <!-- #footer start -->
            <footer id="footer">
                <!-- .container start -->
                <div class="container">
                    <!-- .row start -->
                    <div class="row mb-60">
                        <!-- .col-md-4 start -->
                        <div class="col-md-4">

                        </div><!-- .col-md-4 end-->

                        <!-- .col-md-4 start -->
                        <div class="col-md-4 centered">
                            <a href="index-2.html">
                                <img src="img/logo.png" alt="Royal Plate Restaurant & Catering HTML Template">
                            </a>

                            <ul class="contact-info-list">
                                <li>
                                    Universiti Tun Hussien Onn Malaysia
                                </li>
                                <li>
                                   86400 Parit Raja Batu Pahat
                                </li>

                                <li>
                                   Johor Darul Takzim
                                </li>
                            </ul>
                        </div><!-- .col-md-4 end -->
                        <!-- .col-md-4 start -->
                        <div class="col-md-4">

                        </div><!-- .col-md-4 end-->
                    </div><!-- .row end -->

                    <!-- .row start -->
                    <div class="row mb-40">
                        <!-- .col-md-6 start -->
                        <div class="col-md-6">

                            <!-- .social-links start -->
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul><!-- .social-links end -->
                        </div><!-- .col-md-6 end -->

            <a href="#" class="scroll-up"><i class="fa fa-angle-double-up"></i></a>

        </div><!-- .copyright-container end -->

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="js/include.js"></script><!-- custom js functions -->
        <script src="js/TweenMax.min.js"></script> <!-- Plugin for smooth scrolling-->
        <script src="js/ScrollToPlugin.min.js"></script> <!-- Plugin for smooth scrolling-->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';

                // CONTACT FORM AJAX SUBMIT START
                $('.wpcf7 .wpcf7-submit').on('click', function (event) {
                    event.preventDefault();
                    var name = $('#contact-name').val();
                    var email = $('#contact-email').val();
                    var message = $('#contact-message').val();
                    var form_data = new Array({'Name': name, 'Email': email, 'Message': message});
                    $.ajax({
                        type: 'POST',
                        url: "contact.php",
                        data: ({'action': 'contact', 'form_data': form_data})
                    }).done(function (data) {
                        alert(data);
                    });
                }); // CONTACT FORM AJAX SUBMIT END

            });
            /* ]]> */
        </script>

    </body>

<!-- Mirrored from www.pixel-industry.com/html/royal-plate/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Nov 2016 10:44:17 GMT -->
</html>
<?php
mysql_free_result($Recordset1);
?>