<?php  include("db.php") 

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

    <!-- Navbar Section Ends Here -->




<div>
    <div class="text">
        <p>Mange Order</p>
        <br>

        <?php 
    
    session_start();

    if(isset($_SESSION['uporder'])) {

        echo $_SESSION['uporder'] ;
        unset($_SESSION['uporder']);

    }
    
    ?>

    </div>




    <table class="tbl" >

        <tr>

            <th>Title</th>
            <th>Number</th>
            <th>price</th>
            <th>total</th>
            <th>status</th>

            <th>customer_name</th>
            <th>customer_contact</th>
            <th>customer_Email</th>

            <th>customer_address</th>
            <th>Actions</th>


        </tr>


    <?php
    
    
        $query = "SELECT * FROM tbl_order " ;
        $sql = mysqli_query($conn , $query);
        $count = mysqli_num_rows($sql);

        if ($count > 0  ) {

            while($rows = mysqli_fetch_assoc($sql)) {

                $id = $rows['id'] ;

                $food = $rows['food'] ;
                $qty = $rows['qty'];
                $status = $rows['status'];

                $price = $rows['price']; 
                $total = $rows['total'];
                $customer_name = $rows['customer_name'];
                $customer_contact = $rows['customer_contact'];
                $customer_email = $rows['customer_email'];

                $customer_address = $rows['customer_address'];

                ?> 
                        <tr>
                    <td> <?php  echo $food ?> </td>
                    <td><?php echo $qty ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $total ?></td>

                    <td>

                    <?php 
                    
                        if($status=="Ordered") {
                            ?> 
                            <label style = color:black><?php echo "$status";?></label>
                            <?php
                            
                        }
                        else if($status == "On Deleivery") {
                            ?> 
                            <label style = color:orange><?php echo $status;?></label>
                            <?php
                             }

                             else if($status == "Deleivered") {
                                 ?> 
                                 <label style = color:green><?php echo $status;?></label>
                                 <?php
                                
                                 }  

                        else if($status == "Canceled") {
                            ?> 
                            <label style = color:red><?php echo $status;?></label>
                            <?php        
                                        }




                            

                    ?>
                
                    </td>

                    <td><?php echo $customer_name ?></td>
                    <td><?php echo $customer_contact ?></td>
                    <td><?php echo $customer_email ?></td>

                    <td><?php echo $customer_address ?></td>
                  

                    <td>

                        <a href="update-order.php?id=<?php echo $id ?>" class="btn-secondary">Update Order</a>

                    </td>

                    </tr>
                
                <?php 


            }


        }

        else {


            echo "No have Order Now " ;

        }

    
    
    
    ?>





        
    </table>

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