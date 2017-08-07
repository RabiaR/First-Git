<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Seekers List</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Your custom styles -->
        <link href="css/custom.css" rel="stylesheet">

        <!--Include JQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.js"></script>
    </head>

    <body>
    <?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');
// Start session 
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
                            <li class="active"><a href="index.php"> Home <span class="sr-only">(current)</span></a></li>
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
                        <ul class="nav navbar-nav navbar-right">
                            
                              <li class="login" ><a href="login.php">Login</a></li>
                              <li class="register"><a href="registraion.php">Register</a></li>                     
                        </ul>
                    </div>
                </div>
        </nav>
        <div class="container">   
            <div class="row pad-top-30">
                <div class="inner-page col-md-12">
                    <div id="blog" class="well">
                    <h1>Seeker's List</h1>
                        <table id='table'  class='table table-hover table-mc-light-blue'>
      <thead>
      
        <tr>         
          <th>Name</th>
          <th>Blood Group</th>
          <th>City</th>
        </tr>
      </thead>


      <tbody>

    <?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');
// Start session 
session_start();
$mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            // Check connection
            if (mysqli_connect_errno()) {
              printf("Unable to connect to database: %s",
                mysqli_connect_error());
              exit();
              }
          // Create connection
          $result = mysqli_query($mysqli,"SELECT * FROM seekers WHERE approval = 1");
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";           
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['bloodGroup'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "</tr>";
          }
          
          
          mysqli_close($mysqli);
?>
      
            </tbody>
          </table>
                    </div>
                </div><!-- /. col-md-8 -->

               
            </div> <!-- /row -->  
        </div> <!-- /container -->
      
  <input type="submit" class="btn btn-primary btn-block btn-large" name="login" value="For contact info please login/Register">

    </body>
</html>
