<?php 

include('db.php');
session_start();
$id = $_GET['id'];



        $query = "SELECT * FROM tbl_food WHERE id = '$id' ";
        $sql = mysqli_query($conn , $query);

        $count = mysqli_num_rows($sql);

        if ($count > 0 ) {


            While($rows =mysqli_fetch_assoc($sql)) {


                $imagename = $rows['image_name'] ;

            }

        }


if(isset($_POST['submit'])) {


    if($_FILES['image']['name']){

        $name = $_FILES['image']['name'] ;

        $cource = $_FILES['image']['tmp_name'] ;

        $des = "../images" .$name ;

        $up = move_uploaded_file($cource , $des);





    }

    else {
    $name = $imagename;

    }

$query = "UPDATE `tbl_food` SET `image_name` = '$name'  WHERE id = '$id' ";
$re = mysqli_query($conn , $query);

if ($re == true) {

$_SESSION['updateimg'] = "Update Img Successfully " ;
header("Location:http://localhost/abdo/admin/foods.php") ;


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
<h1>Update Img</h1> <br> 

<form action="" method ="POST" enctype = "multipart/form-data" >

    <table class="tbl-30">


    <tr>


    <tr>
        <td>Curren Image</td>
        <td><img src="../../images<?php echo  $imagename ;?>" alt=""> </td>
        </tr>


        <tr>
        <td>New Image</td>
        <td> <input type="file" name="image" ></td>
        </tr>

        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Update Img" class = "btn-secondary">    
        </td>

        </tr>

        </table>

</form>


</div>

<br><br>



    <!-- footer Section Starts Here -->
    <?php include("partials/footer.php") ;?>

    <!-- footer Section Ends Here -->











    