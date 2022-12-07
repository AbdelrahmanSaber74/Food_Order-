<?php 

include('db.php') ;
?>


<?php 



   

if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = date("Y-m-d h:i:sa");
    $status ="Ordered" ; //// Delivery
    $Address = $_POST['address'];
    $qty = $_POST['qty'];
    $totla = intval($price) *  intval($qty) ;

    $query2 = "INSERT INTO `tbl_order`( `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`)
     VALUES ('$title','$price','$qty','$totla','$date','$status','$full_name','$contact','$email','$Address') " ;

    $sql = mysqli_query($conn , $query2) ;


    if($sql == true ) {
        $_SESSION['or'] = "The Order Send To Data Base Success"; 
        header('Locationhttp://localhost/abdo/order.php') ;



    }

    else {


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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php include('partials-fornt/menu.php') ?>

    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
        <div class="container">


            <?php 
            
                if(isset($_SESSION['or'])) {

                    echo $_SESSION['or'] ;
                    unset($_SESSION['or']);


                }
            ?>
    </div>

    <form action="#" class="order" method= "POST"> 

    

    <?php 

    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_food WHERE id = '$id' "   ; ///// TO SHHHHHOW DAAAATTTTAAA IN FOOOOOORRRRM  
    $sql = mysqli_query($conn , $query);

    $count = mysqli_num_rows($sql) ;

    if ($count ==  1 ) {

        while($rows = mysqli_fetch_assoc($sql)) {

            $id = $rows['id'];
            $title = $rows['title'];
            $description = $rows['description'];
            $price = $rows['price'];
            $image_name = $rows['image_name'];

            ?> 
            
            <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/<?php echo $image_name ; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title ; ?></h3>
                        <p class="food-price"><?php echo $price ; ?></p>

                <!--             Hidden              -->


                        <input type="hidden" name="title" value =<?php echo $title ; ?> >
                        <input type="hidden" name="description"  value =<?php echo $description ; ?> >
                        <input type="hidden" name="price"  value=<?php echo $price ; ?> >



                <!--             Hidden              -->

                        <div class="order-label"><?php echo $description ; ?></div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
            
            <?php


        }

    }


else {
    echo "No haVe" ;



}
            
            ?>


                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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
    <?php include('partials-fornt/footer.php') ?>

    <!-- footer Section Ends Here -->

</body>
</html>