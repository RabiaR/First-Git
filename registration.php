<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style type="text/css">
  *{
    color: white;
  }
  select{color: black;}
</style>
</head>

<body>
<?php
// Include required MySQL confiquration file and fuctions
require_once('config.php');
// Start session 
//register system ...
  // Connect to database
if (isset($_POST['register'])){
    # code...
  if($_POST['mode'] === "donor"){   //if 1
    $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    // Check connection
    if (mysqli_connect_errno()){  //if 2
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id = null;
    $mode = $mysqli->real_escape_string($_POST['mode']);
    $bGroup =  $mysqli->real_escape_string($_POST['bGroup']);
    $name =  $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $age = $mysqli->real_escape_string($_POST['age']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $city = $mysqli->real_escape_string($_POST['city']);
    $approval = 0;
  //  $contact = $mysqli->real_escape_string($_POST['email']);
   
      //Construct SQL statement for query & execute
    $sql = "INSERT INTO donors (id, mode, bloodGroup, name, email, password, age, phone, address, city, approval) VALUES ('$id', '$mode', '$bGroup', '$name', '$email', '$password','$age','$phone', '$address','$city', '$approval')";
      $result = $mysqli->query($sql);
  if ($result === TRUE) { //if 3
   redirect('login.php');
  }
  else { // else 3
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  }
  //else 1
  else {
    $mysqli = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
      // Check connection
    if (mysqli_connect_errno()) {
      printf("Unable to connect to database: %s",
      mysqli_connect_error());
      exit();
    }
      // Escape any unsafe characters before query database
    $id =null;
    $mode = $mysqli->real_escape_string($_POST['mode']);
    $name =  $mysqli->real_escape_string($_POST['name']);
    $bGroup =  $mysqli->real_escape_string($_POST['bGroup']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $age = $mysqli->real_escape_string($_POST['age']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $city = $mysqli->real_escape_string($_POST['city']);
    $approval = 0;
  //  $contact = $mysqli->real_escape_string($_POST['email']);
  
      //Construct SQL statement for query & execute
    $sql = "INSERT INTO seekers (id, mode, bloodGroup, name, email, password, age, phone, address, city, approval) VALUES ('$id' , '$mode', '$bGroup', '$name', '$email', '$password','$age', '$phone','$address', '$city', '$approval')";
      $result = $mysqli->query($sql);
  if ($result === TRUE) {
       redirect('login.php');
  
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
    
  }
}
//register end
?>
    <div class="login">
  	<h1>Registration</h1>
      <form method="post">
      Are you Seeker or Donor:
        <select name="mode" class="form-control" required="true">
                              <option>Select Type</option>
                              <option value="donor">Donor</option>
                              <option value="seeker">Seeker</option>
                          </select>
                          <br> Blood Group:
                          <input type="text" name="bGroup" placeholder="Enter Blood Group" class="form-control" required="true" list="data-list">
                          <datalist id="data-list">
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                          </datalist>
                          <br>
                          Full Name:<input type="text" name="name" placeholder="Enter full name" class="form-control" required="true">
                          <br>
                          Email:<input type="email" placeholder="Enter Email" name="email" class="form-control" required="true">
                          <br>
                          Password:<input type="password" name="password" placeholder="Enter password" class="form-control" required="true">
                          <br>
                          Age:<input type="number" placeholder="Enter Age" name="age" class="form-control" required="true">
                          <br>
                          Phone:<input type="text" placeholder="Enter Phone Number" name="phone" class="form-control" min="11" max="11" required="true">
                          <br>
                          Address:<input type="text" placeholder="Enter Address" name="address" class="form-control" required="true">
                          <br>
                          City:<input type="text" placeholder="Enter city" name="city" class="form-control" required="true">
                          <br>
                          <input type="submit" class="btn btn-primary tn-block btn-large" name="register" value="Register"><br>
                          
                 
      </form>
    <br><a href="index.php">
    <input type="submit" class="btn btn-primary btn-block btn-large" name="login" value="Back to Home Page">
  </a>
      </div>  
      <script src="js/index.js"></script>
  </body>
  </html>
