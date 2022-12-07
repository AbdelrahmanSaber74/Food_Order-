   <?php 

include('db.php');
session_start();




if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    $currentpassword = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];

    if($newpass === $newpass2) {

            $query = "SELECT * FROM `tbl-admin` WHERE id = '$id' AND password = '$currentpassword' ";
            $sql = mysqli_query($conn  , $query) ;



            if (mysqli_num_rows($sql) == 1 ) {

                $query2 = "UPDATE `tbl-admin`SET password = '$newpass' WHERE id = '$id'  " ;
                $sql2 = mysqli_query($conn  , $query2) ;

                if($sql2 == True) {

                    $_SESSION['changepassword'] = "Change Password Successfully"; 
                    header("Location:http://localhost/abdo/admin/admin.php") ;

                }


            }

            else {

                $_SESSION['notChangeold'] = "Not Change Password -- Current Password Not Equal "; 
                header("Location:http://localhost/abdo/admin/admin.php") ;

            }


    }

    else {

        $_SESSION['notChange'] = "Not Change Password -- New Password Not Equal "; 
        header("Location:http://localhost/abdo/admin.php") ;

    }


}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updata Admin</title>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="s.css">

</head>
<body>



<?php include("partials/menu.php") ;?>

        <!-- Navbar Section Ends Here -->



<div class= "container ">
<h1>Change Password</h1> <br> 

<form action="" method ="POST">

    <table class="tbl-30">


    <tr>

        <td>Current Password </td>
        <td> <input type="text" placeholder = "Enter Old Password  " name = "oldpass" required></td>
        </tr>
        <tr>


        <td>New Password </td>
        <td> <input type="text" placeholder = "Enter New Password " name = "newpass" required></td>
        </tr>
        <td>New Password </td>
        <td> <input type="text" placeholder = "Enter New Password " name = "newpass2" required></td>
        </tr>

        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Change Password" class = "btn-secondary">    
        </td>

        </tr>

        </table>

</form>


</div>

<br><br>



    <!-- footer Section Starts Here -->
    <?php include("partials/footer.php") ;?>

    <!-- footer Section Ends Here -->











    