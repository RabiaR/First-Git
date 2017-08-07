<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>User File</title>

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
                <div class="inner-page col-md-12">
                <h3>Donors List</h3>
                <div style="float: right;">
    <button type="button" placeholder="Update" class="btn btn-primary" data-toggle="modal" data-target="#DonorUpdateModal">Update</button>
    <button type="button" placeholder="Update" class="btn btn-danger" data-toggle="modal" data-target="#DonorDeleteModal">Delete</button>
  </div>
      <table id='table'  class='table table-hover table-mc-light-blue'>
        <thead>      
          <tr>
            <th>ID No.</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Email</th>
            <th>Age</th>
            <th>Password</th>
            <th>Address</th>
            <th>City</th>
            <th>Apporval</th>
          </tr>
        </thead>
      <tbody>

    <?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');

$mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            // Check connection
            if (mysqli_connect_errno()) {
              printf("Unable to connect to database: %s",
                mysqli_connect_error());
              exit();
              }
          // Create connection
          $result = mysqli_query($mysqli,"SELECT * FROM donors");
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['bloodGroup'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['approval'] . "</td>";
            echo "</tr>";
          }
          
          
          mysqli_close($mysqli);
?>
      
            </tbody>
          </table>
                    </div>
			
                        
            </div> <!-- /row -->  
        </div> <!-- /container -->
                <div class="container">   
            <div class="row pad-top-30">
                <div class="inner-page col-md-12">
                <h3>Seekers List</h3>
                <div style="float: right;">
    <button type="button" placeholder="Update" class="btn btn-primary" data-toggle="modal" data-target="#SeekerUpdateModal">Update</button>
    <button type="button" placeholder="Update" class="btn btn-danger" data-toggle="modal" data-target="#SeekerDeleteModal">Delete</button>
  </div>
                    <table id='table'  class='table table-hover table-mc-light-blue'>
      <thead>
      
        <tr>
          <th>ID No.</th>
          <th>Name</th>
          <th>Blood Group</th>
          <th>Email</th>
          <th>Age</th>
          <th>Password</th>
          <th>Address</th>
          <th>City</th>
          <th>Apprval</th>
        </tr>
      </thead>


      <tbody>

    <?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');
// Start session 
$mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            // Check connection
            if (mysqli_connect_errno()) {
              printf("Unable to connect to database: %s",
                mysqli_connect_error());
              exit();
              }
          // Create connection
          $result = mysqli_query($mysqli,"SELECT * FROM seekers");
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['bloodGroup'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['approval'] . "</td>";
            echo "</tr>";
          }
          mysqli_close($mysqli);
?>
      
            </tbody>
          </table>
                    </div>
            
                        
            </div> <!-- /row -->  
        </div> <!-- /container -->
        <footer>
  <!-- Donor update Modal -->
  <div class="modal fade" id="DonorUpdateModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Donor Profile</h4>
        </div>
        <div class="modal-body" align="center">
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Please Enter User ID: <input type="text" placeholder="Enter user ID" name="id" class="form-control" required="true"> <br>
            Name: <input type="text" name="name" placeholder="Enter new name" class="form-control"><br/>
            Password: <input type="text" name="password" placeholder="Enter new password" class="form-control"><br/>
            Address: <input type="text" placeholder="Enter user address" name="address" class="form-control"> <br>
            Approval <input type="text" placeholder="Enter  0 / 1" name="approval" class="form-control"> <br>
              <input type="submit" class="btn btn-primary" name="donorUpdate" value="Submit">
              <input type="submit" class="btn btn-danger" name="reset" value="Reset">
          </form>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Donor Delete Modal -->
  <div class="modal fade" id="DonorDeleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete user</h4>
        </div>
        <div class="modal-body" align="center">
          <form  method="post" class="formalign" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

              
              Please Enter User ID: <input type="text" placeholder="Enter user ID" name="id" class="form-control" required="true"> <br>

            <input type="submit" class="btn btn-primary" name="DonorDelete" value="Submit">
            <input type="submit" name="reset" class="btn btn-danger" value="Reset">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- Seeker update Modal -->
  <div class="modal fade" id="SeekerUpdateModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Seeker Profile</h4>
        </div>
        <div class="modal-body" align="center">
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Please Enter User ID: <input type="text" placeholder="Enter user ID" name="id" class="form-control" required="true"> <br>
            Name: <input type="text" name="name" placeholder="Enter new name" class="form-control"><br/>
            Password: <input type="text" name="password" placeholder="Enter new password" class="form-control"><br/>
            Address: <input type="text" placeholder="Enter user address" name="address" class="form-control"> <br>
            Approval: <input type="text" placeholder="0 / 1" name="approval" class="form-control"> <br>
              <input type="submit" class="btn btn-primary" name="SeekerUpdate" value="Submit">
              <input type="submit" class="btn btn-danger" name="reset" value="Reset">
          </form>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Seeker Delete Modal -->
  <div class="modal fade" id="SeekerDeleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete user</h4>
        </div>
        <div class="modal-body" align="center">
          <form  method="post" class="formalign" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

              
              Please Enter User ID: <input type="text" placeholder="Enter user ID" name="id" class="form-control" required="true"> <br>

            <input type="submit" class="btn btn-primary" name="seekerDelete" value="Submit">
            <input type="submit" name="reset" class="btn btn-danger" value="Reset">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



</footer>
<?php
//Update Donors  Data
if (isset($_POST["donorUpdate"])) {
  $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()){  //if 2
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $approval = $_POST['approval'];
      $sql = "SELECT * FROM donors WHERE id = '" . $id ."'";
      $result = $mysqli->query($sql);
      // if one row is returned, username and password are valid
      if (is_object($result) && $result->num_rows == 1) {
        // Set session variable for login status to true
        
        $sql = "UPDATE donors SET name = '$name', password = '$password', address = '$address', approval = '$approval' WHERE id = $id";
      $result = $mysqli->query($sql);
  if ($result === TRUE) { //if 3
    echo "<script>alert('user updated');</script>";
    echo "<meta http-equiv='refresh' content='0'>";
  }
  else { // else 3
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
        
        }
    else{
      echo "<script>alert('No user Found');</script>";
      
      }
}
//Delete Donor account
if (isset($_POST["DonorDelete"])) {
  $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()){  //if 2
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id = $_POST['id'];
    
    $sql = "DELETE FROM donors WHERE id = $id";
      
      // if one row is returned, username and password are valid
      if ($mysqli->query($sql) === TRUE) {
        // Set session variable for login status to true
        echo "<script>alert('User deleted');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
      }
    else{
      echo "<script>alert('No user Found');</script>";
      
      }
}
//Update Seekers  Data
if (isset($_POST["SeekerUpdate"])) {
  $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()){  //if 2
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $approval = $_POST['approval'];
$sql = "SELECT * FROM seekers WHERE id = '" . $id ."'";
      $result = $mysqli->query($sql);
      // if one row is returned, username and password are valid
      if (is_object($result) && $result->num_rows == 1) {
        // Set session variable for login status to true
      
        $sql = "UPDATE seekers SET name = '$name', password = '$password', address = '$address', approval = '$approval' WHERE id = $id";
      $result = $mysqli->query($sql);
  if ($result === TRUE) { //if 3
    echo "<script>alert('user updated');</script>";
    echo "<meta http-equiv='refresh' content='0'>";
  }
  else { // else 3
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
        
        }
    else{
      echo "<script>alert('No user Found');</script>";
      
      }
}
//Delete Seekers account
if (isset($_POST["seekerDelete"])) {
  $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()){  //if 2
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id = $_POST['id'];
    
    $sql = "DELETE FROM seekers WHERE id = $id";
      
      // if one row is returned, username and password are valid
      if ($mysqli->query($sql) === TRUE) {
        // Set session variable for login status to true
        echo "<script>alert('User deleted');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
      }
    else{
      echo "<script>alert('No user Found');</script>";
      
      }
}
?>
       
    </body>
</html>
