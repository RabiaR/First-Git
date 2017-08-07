<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>About Me</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Your custom styles -->
        <link href="css/custom.css" rel="stylesheet">

        <!--Include JQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.js"></script>
        <script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    </head>

    <body>
    <?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');

$CheckSession = $_SESSION["userSession"] ;
if ($CheckSession !== null) {
    echo "<script>
$(document).ready(function(){
    
        $('#loginbtns').hide();
        $('#hidebtns').css('visibility', 'visible');
        });
</script>";
    
}

if (isset($_POST['logout'])) {
unset($_SESSION['userSession']);
 session_destroy();
 redirect('index.php');
}
?>
         <nav class="navbar navbar-inverse navbar-fixed-top">
            <nav class="top-bar"></nav>
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                          <img src="images/logo.png" alt="Home">
                      </a>
                    </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="Mission.php">Mission Statement</a></li>
                        <li class="dropdown">
                          <a href="innovate.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User's List <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="donors.php">Donors</a></li>
                            <li><a href="seekers.php">Seekers</a></li>                             
                        </ul>                        
                        </li>                        
                      </ul>
                      <div id="loginbtns" style="float: right; margin-top: 10px;">
                        <div class="form-group">
                            <a href="login.php"><button type="button" placeholder="Login" class="form-control btn-primary">Log In</button></a>
                        </div>
                        <div>
                            <a href="registration.php"><button type="button" placeholder="Sign Up" class="form-control" >Sign Up</button></a>
                        </div>
                         </div>
                    <form class="navbar-form navbar-right" id="hidebtns" style="visibility: hidden;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <button type="submit" placeholder="Log out" name="logout" class="form-control btn-primary">Log Out</button>
                        </div>
                    </form>
                    </div>
                </div>
        </nav>
        <div class="container">   
            <div class="row pad-top-30">
                <div class="inner-page col-md-8">
                <h1>About Me</h1>
                    <div id="blog" class="well">
                    <p>I am Rabia Nawaz, Student of Virtual University doing BC (Computer Science). This is my Final Year Project, it's about the Blood Donation Service which is accessible to every person who has working internet. Through this website, anyone can donate and seek for blood in needy time. </p>
                    </div>
                </div><!-- /. col-md-8 -->

                <!-- Sidebar -->
                <div class="col-md-4">     
                   <div class="grey-list list-group">
                   <h1><b>Blood Type</b></h1>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type A+</h4>
                            <p class="list-group-item-text">Blood Type Compatibility: A+ Can Be Given To A+ and AB+ An A+ donor is only compatible to donate blood to blood groups A+ and AB+ because of the presence of antigens A and Rh in the donor's blood. An individual can donate red blood cells every 56 days..</p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type A-</h4>
                            <p class="list-group-item-text">It is very important to maintain sufficient supply of this blood type for it is rare. The A negative blood type is only present in about 1 out of 16 individuals. This means a few number with approximately 6.6% of the population has A negative blood. On the other hand, not all of the ethnic groups share the same proportions of A negative blood types. This blood type is present in about 7% in Caucasians, 2% in African American, 2% in Hispanic, and 0.5% in Asian.</p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type B+</h4>
                            <p class="list-group-item-text">The B Positive blood type is extremely valuable where matching supply for the demand has been a constant challenge. However, it is the third most common blood type which is present in about 1 out of 12 individuals. This means an approximately 8.5% of the population has a B positive blood. But, note that not all of the ethnic groups share the same proportions of the B positive blood type. This blood type is present in about 9% in Caucasians, 18% in African American, 9% in Hispanic, and 25% in Asian. </p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type B-</h4>
                            <p class="list-group-item-text">Negative blood types are actually rarer compared to positive types. The B Negative blood type is one of the rarest and second to AB Negative, being the rarest of the blood types. Being rare, it is extremely important to maintain sufficient supply for this blood type considering that it’s one of the hardest to collect to make sure it is enough. It is only present in 1 out of 67 individuals. This means an approximately 1.5% of the population has a B negative blood. Note however that not all of the ethnic groups share the same proportions of the B negative blood type. This blood type is present in about 2% in Caucasians, 1% in African American, 1% in Hispanic, and 0.4% in Asian </p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type O+</h4>
                            <p class="list-group-item-text">The O positive blood type is the most common and incredibly an important donor in maintaining adequate blood supply. It is present in 1 out of 3 individuals. This means approximately 37.4% of the population has O positive blood. However, not all of the ethnic groups share the same proportions of blood types. O positive blood type is about 37% in Caucasians, 47% in African American, 53% in Hispanic, and 39% in Asian. </p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type O-</h4>
                            <p class="list-group-item-text">The O negative blood type is particularly helpful in emergency situations. With O negative blood transfusion, trauma and accident victims are given a chance at life. This blood type is called universal because it can be transfused to almost any patient in need of whatever blood group. Truly important in emergency situations whenever an individual requires immediate blood transfusion. It is also the safest for newborn infants especially the ones with underdeveloped immune systems. However, O negative blood type is relatively rare compared to the other blood types. It is only present in 1 out of 15 individuals. This means approximately 6.6% of the population has O negative blood. However, not all of the ethnic groups share the same proportions of O negative blood types. This blood type is present in about 8% in Caucasians, 4% in African American, 4% in Hispanic, and 1% in Asian. </p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type AB+</h4>
                            <p class="list-group-item-text">The nature of antigens present in the serum determines the blood type. AB positive suggests that an individual has both the antigens A and B. Individuals who are AB blood group are commonly called universal plasma donors because their plasma can be transfused to any person of whatever blood group. The blood type is referred as universal red cell recipient because they can receive transfusions of any blood group. It is considerably a rare blood type that is present in only 1 out of 29 individuals. This means an approximately 3.4% of the population has an AB positive blood. Not all of the ethnic groups share the same proportions of the AB positive blood type though. This blood type is present in about 3% in Caucasians, 4% in African American, 2% in Hispanic, and 7% in Asian. </p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">Blood Type AB-</h4>
                            <p class="list-group-item-text">The nature of antigens present in the serum determines the blood type. AB negative suggests that an individual has both the antigens A and B. Individuals who are AB blood group are commonly called universal plasma donors because their plasma can be transfused to any person of whatever blood group. The blood type is also the rarest blood types among all the blood group because it is present in only 1 out of 167 individuals. This means an approximately 0.6% of the population has an AB negative blood. Not all of the ethnic groups share the same proportions of the AB negative blood type though. This blood type is present in about 1% in Caucasians, 0.3% in African American, 0.2% in Hispanic, and 0.1% in Asian. </p>
                        </a>
                    </div>
                </div>           
                </div><!-- /. col-md-4 -->           
            </div> <!-- /row -->  
        </div> <!-- /container -->
      
    </body>
</html>
