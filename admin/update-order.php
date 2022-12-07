<?php 

include("db.php");

$id = $_GET['id'];
$query = "SELECT * FROM tbl_order WHERE id = '$id'" ; ///////////////// TOO SHHHOW
$sql =mysqli_query($conn , $query);

$count = mysqli_num_rows($sql);

if($count == 1 ){
    while ($rows = mysqli_fetch_assoc($sql)) {



    $idd = $rows['id'];
    $food = $rows['food'];
    $qty = $rows['qty'];

    $status = $rows['status'];
    
    $Price = $rows['price'];

    $customer_name = $rows['customer_name'];
    $customer_contact = $rows['customer_contact'];
    $customer_email = $rows['customer_email'];
    $customer_address = $rows['customer_address'];

}

}

else {

}

?>


<?php 


session_start();

if(isset($_POST['submit'])) {



$id = $_POST['id'];
$qty = $_POST['qty'];
$Status = $_POST['Status'];
$cusname = $_POST['cusname'];
$cuscon = $_POST['cuscon'];
$cusemail = $_POST['cusemail'];
$cusadd = $_POST['cusadd'];


$query2 = "UPDATE `tbl_order` SET 
qty = '$qty' , 
status = '$Status' , 
customer_name = '$cusname' , 
customer_contact = '$cuscon' , 
customer_Email = '$cusemail' , 
customer_address = '$cusadd' 
WHERE id = '$id' " ;


$res = mysqli_query($conn , $query2) ;

if ($res == true) {

    $_SESSION['uporder'] = "Update Order Successfully " ;
    header("Location:http://localhost/abdo/admin/order.php") ;
    
}

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="s.css">

</head>

<body>
<?php include("partials/menu.php") ;?>

    <!-- Navbar Section Ends Here -->




<div class="container"> 


    <h1>Update Order</h1>
    <br><br>

<form action="#" method = "POST" enctype = "multipart/form-data">
<td> <input type="hidden"  name = "id" required value ="<?php  echo $idd ;?>" ></td> 

    <table class="tbl-30">

        <tr>
            <td>Title</td> 
            <td> <label for=""> <?php  echo $food ;?></label> </td>
            </tr>

        <tr>

        <tr>
            <td>Qty</td> 
            <td> <input type="text" placeholder = "Enter New Qty " name = "qty" required value ="<?php echo $qty ;?>" ></td> 
            </tr>

        <tr>


        <tr>
            <td>Price</td> 
            <td> <label for=""> <?php  echo $Price . " $" ;?></label> </td>
            </tr>

        <tr>




<tr>




    <td>Status</td> 

        <td>

            <select name="Status" id="">
                <option value="Orderd">Orderd</option>
                <option value="On Deleivery">On Deleivery</option>
                <option value="Deleivered">Deleivered</option>
                <option value="Canceled">Canceled</option>

            </select>

        </td>

<tr>


<tr>
            <td>customer_name</td> 
            <td> <input type="text" placeholder = "Enter New customer_name " name = "cusname" required value = " <?php  echo $customer_name ;?>" ></td> 
            </tr>

        <tr>

        <tr>
            <td>customer_contact</td> 
            <td> <input type="text" placeholder = "Enter New customer_contact " name = "cuscon" required value ="<?php echo $customer_contact ;?>" ></td> 
            </tr>

        <tr>

        

        

        <tr>
            <td>customer_Email</td> 
            <td> <input type="text" placeholder = "Enter New customer_Email " name = "cusemail" required value = " <?php  echo $customer_email;?>" ></td> 
            </tr>

        <tr>

        <tr>
            <td>customer_address</td> 
            <td> <input type="text" placeholder = "Enter New customer_address " name = "cusadd" required value = " <?php  echo $customer_address ;?>" ></td> 
            </tr>

        <tr>









        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Update Order" class = "btn-secondary">    
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

    <!-- footer Section Starts Here -->
    <?php include("partials/footer.php") ;?>

    <!-- footer Section Ends Here -->

</body>
</html>


