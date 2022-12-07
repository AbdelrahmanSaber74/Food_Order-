

<?php  include ("db.php") ?>
<?php
session_start();

$id = $_GET['id'];


$query = "DELETE FROM `tbl-admin` WHERE id = $id " ;

$res = mysqli_query($conn , $query);

if ($res == true ) {
    header("LOCATION:http://localhost/abdo/admin/admin.php");


    $_SESSION['delete'] = "Admin Where id = $id Is Delete Successfully " ;

}





?>