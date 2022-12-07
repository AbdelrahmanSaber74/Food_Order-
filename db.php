
<?php 
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'food-order';

try {
    $conn = mysqli_connect($server , $user , $pass , $dbname);
}
catch (PDOException $e){
    echo  $e->getMessage();
}
?>

