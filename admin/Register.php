<?php 
session_start();
include("db.php");

if (isset($_POST['register'])) {

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$pass_1 = $_POST['pass_1'];
$pass_2 = $_POST['pass_2'];


  if($pass_1 === $pass_2) {

    $query = "INSERT INTO `tbl-admin`(
      `full_name`,
      `username`,
      `password`
  )
  VALUES (
      '$fullname',
      '$username',
      '$pass_1' 
  ) " ;


      $re = mysqli_query($conn , $query) ;  

        if($re == true) {

          $_SESSION['reg'] = "Register Successfully" ;

        }

  }
  
  else {
    $_SESSION['passnotmatch'] = "Confirn Password Not Match" ;
  }

}


?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/Register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content"> <br>

    <?php 
    
    if(isset($_SESSION['reg'])) {

      echo $_SESSION['reg'];
      unset($_SESSION['reg']);

    }

    if(isset($_SESSION['passnotmatch'])) {

      echo $_SESSION['passnotmatch'];
      unset($_SESSION['passnotmatch']);

    }
    ?>


      <form action="#" method = "POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required name = "fullname"  >
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" required name = "username">
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required name = "pass_1">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required name = "pass_2">
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register" name = "register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
