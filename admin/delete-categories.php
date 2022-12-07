<?php  include ("db.php") ?>


<?php 

session_start();

$id = $_GET['id'];


$query = "DELETE  FROM tbl_category WHERE id = $id";

$re =mysqli_query($conn , $query) ;

if($re == true) {


$_SESSION['deleteca'] = "Delete Category Successfully" ;
header("LOCATION:http://localhost/abdo/admin/categories.php");

}




?>

