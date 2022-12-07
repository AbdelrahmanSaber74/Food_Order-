<?php  include('db.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to    make website responsive -->
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
    <section class="food-search text-center">
        <div class="container">

        <?php    
         $search = mysqli_real_escape_string($conn , $_POST['search']);
         ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->



    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            
    <?php 
    
    

    $query = "SELECT * FROM tbl_food WHERE title Like '%$search%' OR description Like '%$search%' " ;
    $sql = mysqli_query($conn , $query) ;

    $count = mysqli_num_rows($sql);

    if ($count > 0) {

        while($rows = mysqli_fetch_assoc($sql)) {

            $id =$rows['id'];
            $title =$rows['title'];
            $price =$rows['price'];
            $description =$rows['description'];
            $image_name =$rows['image_name'];

            ?> 
            
            
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/<?php echo $image_name  ;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ;?></h4>
                    <p class="food-price"><?php echo $price;  ?></p>
                    <p class="food-detail">
                        <?php echo $description ;?>
                    </p>
                    <br>
                    <a href="http://localhost/food_project/order.php?id=<?php echo $id ; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            
          <?php


        }

    }

    else {

 echo "No Food";
    }



?>



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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