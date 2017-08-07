<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blood Donation </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Main CSS -->
        <link href="css/bootstrap.css" rel="stylesheet"> 
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">  
        
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
        <!-- Bootstrap main javascript -->
        <script src="js/bootstrap.js"></script>

        <!-- <script>
            $(document).ready(function() {
                $('#tooltip1').tooltip('hide');
                $('#tooltip2').tooltip('hide');
            });
        </script> -->
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
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User's List <span class="caret"></span></a>
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
        		<!-- Jumbotron -->
        <div class="jumbotron">
            <div class="container">
                 <div class="row">
                    <div class="col-md-7 col-md-offset-5">
                        <div class="jumbotron-content">
                            <h1><b>Blood Donation Service</b></h1>
                            <p class="lead"><b> In the Quran, Allah says,<i> " To save one life is to save all humanity "</i></b>.</p>
                        </div>
                    </div>                
                </div>            
            </div>
        </div>
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="bluebox">
                        <h3><span class="glyphicon glyphicon-tint"></span>Fact about Blood</h3>
                        <p>The adult human body contains approximately 1.325 gallons of blood. Blood makes up about 7 to 8 percent of a person's total body weight.</p>
                    </div>                
                </div>
                    <div class="col-md-4">
                        <div class="redbox">
                            <h3><span class="glyphicon glyphicon-tint"></span>Fact about Blood</h3>
                           <p>Matured human blood cells have varying life cycles. Red blood cells circulate in the body for about 4 months, platelets for about 9 days, and white blood cells range from a few hours to several days.</p>                            
                        </div>                
                    </div>
                <div class="col-md-4">
                    <div class="bluebox">
                        <h3><span class="glyphicon glyphicon-tint"></span>Fact about Blood</h3>
                        <p>The most common blood type in the United States is O positive. The least common is AB negative. Blood type distributions vary by population. The most common blood type in Japan is A positive.</p>                        
                    </div>                
                </div>           
            </div>
            <div class="row pad-top-30">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-blue-heading">
                            <h2 class="panel-title"><b>About Your Blood</b></h2>
                        </div>
                        <div class="panel-body">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="images/small1.jpg" alt="Small Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"> <b>Inheritance Patterns</b></h4>
                                    <p>The ABO gene found on chromosome 9 determines the ABO blood group system. A and B genes are codominant in relationship, making the expression of both antigens A and B when either alleles A or B is present. Blood Group A has an A antigen on red cells with the B antibody in the plasma.</p>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="images/small2.jpg" alt="Small Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><b>Facts about donorss</b></h4>
                                    <p>There are four types of transfusable products that can be derived from blood: red cells, platelets, plasma and cryoprecipitate. Typically, two or three of these are produced from a pint of donated whole blood.</p>
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object img-circle" src="images/small3.jpg" alt="Small Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><b>Blood Facts</b></h4>
                                    <p>If 50 people donate, they could provide enough blood to take care of victims of a major car accident. If 20 people donate, they could help 1 burn victim. Most whole blood donorss can give every 8 weeks. Plasma donorss can give as often as every 3 days. Blood lasts only 42 days. Platelets last only 5 days.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="grey-list list-group">
                        <a href="http://www.fatimid.org/" class="list-group-item ">
                            <h4 class="list-group-item-heading">Fatimid Foundation</h4>
                            <p class="list-group-item-text">Fatimid Foundation is a blood donation center in Karachi. Click here to veiw the website.</p>
                        </a>
                        <a href="http://www.blood.pk/emergency.php" class="list-group-item ">
                            <h4 class="list-group-item-heading">BLOOD.PK</h4>
                            <p class="list-group-item-text">BLOOD.PK is a blood donation center in Lahore. Click here to veiw the website.</p>
                        </a>
                        <a href="http://ww3.comsats.edu.pk/mbds/" class="list-group-item ">
                            <h4 class="list-group-item-heading">Al-Mariam Blood Donation Society</h4>
                            <p class="list-group-item-text">Al-Mariam Blood Donation Society is a blood donation center in Islamabad. Click here to veiw the website. </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>       
    </body>
</html>
