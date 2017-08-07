<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
<?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');
// Start session 


//login system
if (isset($_POST['login'])) {

  if($_POST['email'] === "admin@vu.edu.pk"){

    # ADMIN login system...
    // Connect to database
    $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()) {
      printf("Unable to connect to database: %s",
        mysqli_connect_error());
      exit();
      }
      // Escape any unsafe characters before query database
      $email = $mysqli->real_escape_string($_POST['email']);
      $password = $mysqli->real_escape_string($_POST['password']);

      //Construct SQL statement for query & execute
      $sql = "SELECT * FROM adminDetails WHERE email = '" . $email."' AND password = '" . $password . "'";
      $result = $mysqli->query($sql);
      // if one row is returned, username and password are valid
      if (is_object($result) && $result->num_rows == 1) {
        // Set session variable for login status to true
        echo "<script>alert('login successfull')</script>";
        echo "<div style='margin-top: 100px; color : green;'>Admin login successfull</div>";
        redirect('userfile.php');
        }

    else{
      
      echo "<script>alert('Email or Password is Incorrect')</script>";
      }
  }

  elseif($_POST['email'] !== "admin@vu.edu.pk"){

            $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            // Check connection
            if (mysqli_connect_errno()) {
              printf("Unable to connect to database: %s",
                mysqli_connect_error());
              exit();
              }
              // Escape any unsafe characters before query database
              $email = $mysqli->real_escape_string($_POST['email']);
              $password = $mysqli->real_escape_string($_POST['password']);

              //Construct SQL statement for query & execute
              $sql = "SELECT * FROM seekers WHERE email = '" . $email ."' AND password = '" . $password . "'";
              $result = $mysqli->query($sql);
              // if one row is returned, username and password are valid
              if (is_object($result) && $result->num_rows == 1) {
                // Set session variable for login status to true
                redirect('ndonors.php');
                
                }
                else {
                  $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                  // Check connection
                  if (mysqli_connect_errno()) {
                    printf("Unable to connect to database: %s",
                    mysqli_connect_error());
                    exit();
                    }
                  // Escape any unsafe characters before query database
                  $email = $mysqli->real_escape_string($_POST['email']);
                  $password = $mysqli->real_escape_string($_POST['password']);

                  //Construct SQL statement for query & execute
                  $sql = "SELECT * FROM donors WHERE email = '" . $email."' AND password = '" . $password . "'";
                  $result = $mysqli->query($sql);
                  // if one row is returned, username and password are valid
                  if (is_object($result) && $result->num_rows == 1) {
                    // Set session variable for login status to true
                    redirect('nseekers.php');
                    }
                }
    }
}

 ?>
 
  <div class="login">
	<h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	  <input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
         <input type="submit" class="btn btn-primary btn-block btn-large" name="login" value="Submit"> <br>       
    </form>
<a href="index.php">
  <input type="submit" class="btn btn-primary btn-block btn-large" name="login" value="Back to Home Page">
</a>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
