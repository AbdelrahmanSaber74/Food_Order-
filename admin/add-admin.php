<?php 


include("db.php") ;

session_start();





if(isset($_POST['submit'])) {

    $fullname = $_POST['full_name'];
    $username = $_POST['user_name'];
    $password = $_POST['password']; 


    $query ="INSERT INTO `tbl-admin` (full_name , username , password)
    VALUES('$fullname' , '$username' , '$password')";

    $re = mysqli_query($conn , $query) or die(mysqli_error());

    if ($re == TRUE) { // Admin Added

        $_SESSION['add'] = "Admin Added Successfully";
        header("LOCATION:http://localhost/abdo/admin/admin.php") ;
        
        }
        
        else { 
        
            // $_SESSION['notAdd'] = "Admin Not Added"
            // header("LPCATION:http://localhost/abdo/admin.html") ;

        
        }
        

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="s.css">

</head>

<body>

<?php include("partials/menu.php") ;?>



<div class="container"> 


    <h1>Admin</h1>
    <br><br>


<form action="#" method = "POST">

    <table class="tbl-30">

        <tr>
        <td>Full Name</td> 
        <td> <input type="text" placeholder = "Enter Your Name " name = "full_name" required></td> 
        </tr>


        <tr>
        <td>User Name</td>
        <td> <input type="text" placeholder = "Enter User Name " name = "user_name" required></td>
        </tr>

        

        <tr>
        <td>Password</td>
        <td> <input type="text" placeholder = "Enter Your Password " name = "password" required></td>
        </tr>

        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Add Admin" class = "btn-secondary">    
        </td>

        </tr>

        </table>

</form>


</div>



    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php include("partials/footer.php") ;?>




</body>
</html>


