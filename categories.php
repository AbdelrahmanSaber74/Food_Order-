




<?php  include("db.php")?>

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

    <?php include('partials-fornt/menu.php') ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
        
        $query= "SELECT * FROM tbl_category WHERE active = 'yes' " ;
        $sql = mysqli_query($conn , $query ) ;
        $count = mysqli_num_rows($sql);


        if ($count > 0) { // Have Categories In Datta Base

            while($rows=mysqli_fetch_assoc($sql)){

                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
                $actice = $rows['active'];

                ?> 

            <!-- <a href="category-foods.html"> -->
            <div class="box-3 float-container">
                <a href="category-foods.php?id=<?php echo $id ?>">


                    <img src="images/<?php echo  $image_name ; ?>" alt=" <?php echo $title ; ?>" class="img-responsive img-curve">

                    <h3 class="float-text text-white"> <?php echo $title ; ?></h3>


                    </a>

            </div>
            </a>
                
                
                <?php


            }

        }

        else {  // Not Have 

            echo "Not Have";

        }
        
        ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


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
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

    <?php include('partials-fornt/footer.php') ?>


</body>
</html>