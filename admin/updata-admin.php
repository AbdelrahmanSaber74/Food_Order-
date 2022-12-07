<?php 

include('db.php');
session_start();

$id = $_GET['id'];


 $qu = "SELECT * FROM `tbl-admin` WHERE id = '$id' " ; // To Show 

 $rre = mysqli_query($conn , $qu) ;

 if ($ree = true ) {


    $count = mysqli_num_rows($rre) ;

    if ($count > 0 ) { // Have Data In my SQL 

        $rows = mysqli_fetch_assoc($rre) ;

        $fullname = $rows['full_name'];
        $username = $rows['username'] ;

    }

 }  
 
 // End To Show 


if (isset($_POST['submitt'])) { // To Updata 

    $fullname = $_POST['full_name'] ;
    $username = $_POST['user_name'] ;
    
    
    $query = " 
    
    UPDATE
        `tbl-admin`
    SET
        
        `full_name` = '$fullname' ,
        `username` = '$username'  
    WHERE
    `id` = '$id' ;
    
    " ; 
    
    mysqli_query($conn , $query);

    if ($res = TRUE ) {

        $_SESSION['update'] = "Updata Admin Successfully"; 
        header("Location:http://localhost/abdo/admin/admin.php") ;

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
<h1>Updata Admin</h1>

<form action="#" method ="POST">

    <table class="tbl-30">

        <tr>
        <td>Full Name</td> 
        <td> <input type="text"  name="full_name" required value = " <?php echo $fullname ?> "></td> 
        </tr>


        <tr>
        <td>User Name</td>
        <td> <input type="text" placeholder = "Enter User Name " name ="user_name" required value = "<?php echo $username ; ?> " > </td>
        </tr>

        




        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submitt" value = "Updata Admin" class = "btn-secondary">    
        </td>

        </tr>

        </table>

</form>


</div>

<br><br>



    <!-- footer Section Starts Here -->
    <?php include("partials/footer.php") ;?>

    <!-- footer Section Ends Here -->











    









































    </body>
</html>