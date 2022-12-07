
<?php 

include("db.php");
session_start();



    if(isset ($_POST['login']) ) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM `tbl-admin` WHERE username = '$username' AND password='$password' ";
        $re = mysqli_query($conn , $query);
    
            $count = mysqli_num_rows($re);
            if ($count == 1) {
    
                $_SESSION['login'] = "Welcome Admin To Login"; 
                $_SESSION['u'] = $username; 
    
                header('Location:http://localhost/abdo/admin/') ;
    
            }
    
            else {
                $_SESSION['notLogin'] = "Username Or Password Worng" ;
            }
    }
    
    if(isset ($_POST['register'] ) ) {
        header("Location:Register.php") ;
    }
    







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login : Food- Order</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>







<div class="login-form">


<?php 


        if(isset($_SESSION['notLogin'])) {

            echo $_SESSION['notLogin'];
            unset($_SESSION['notLogin']); 

        }

        if(isset($_SESSION['s'])) {

            echo $_SESSION['s'];
            unset($_SESSION['s']); 

        }

        if(isset($_SESSION['no-lgoin'])) {

            echo $_SESSION['no-lgoin'];
            unset($_SESSION['no-lgoin']); 

        }

?>

<form action="" method="POST">

  <h3>Login</h3>

  <input type="text" name="username" placeholder="Username" />
  <br>

  <input type="text" name="password" placeholder="Password"/>
  <br>
  
  <input type="submit" id="login" value="login" name = "login" />

  <input type="submit" id="register" value="Register" name = "register"/>


</form>

</div>


    
</body>
</html>