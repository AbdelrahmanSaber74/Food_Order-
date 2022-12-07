

<?php  include ("db.php") ?>
<?php
session_start();

$id = $_GET['id'];


$query = "DELETE FROM `tbl_food` WHERE id = $id " ;

$res = mysqli_query($conn , $query);

if ($res == true ) {
    header("LOCATION:http://localhost/abdo/admin/foods.php");


    $_SESSION['deletefood'] = "Admin Where id = $id Is Delete Successfully " ;

}





?>