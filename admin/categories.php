
<?php include("db.php") ;?> 

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
        <h3>Mange Categories</h3> <br>
        <br>
        <a href="add-category.php" class="btn-primary">Add Categories </a>
    </div> <br>

    <div class= "container"> 

    

    <?php 

    session_start();


    if(isset( $_SESSION['addcategory'] ) ) {

        echo $_SESSION['addcategory'] ;
        unset ($_SESSION['addcategory']);

    }
    

    if(isset( $_SESSION['deleteca'] ) ) {

        echo $_SESSION['deleteca'] ;
        unset ($_SESSION['deleteca']);

    }    
    
    if(isset( $_SESSION['updatecate'] ) ) {

        echo $_SESSION['updatecate'] ;
        unset ($_SESSION['updatecate']);

    }

    if(isset( $_SESSION['newimage'] ) ) {

        echo $_SESSION['newimage'] ;
        unset ($_SESSION['newimage']);

    }
    if(isset( $_SESSION['no-found-id'] ) ) {

        echo $_SESSION['no-found-id'] ;
        unset ($_SESSION['no-found-id']);

    }
    ?>

</div>


    <table class="tbl" >

        <tr>

            <th>S.N.</th>
            <th>Title</th>
            <th>Image </th>
            <th>Featured</th>
            <th>Active</th>
            <th>Edit</th>

        </tr>



        <?php 
        
        $query = "SELECT * FROM tbl_category" ;
        $re = mysqli_query($conn , $query);

        if($re == true) {

            $count = mysqli_num_rows($re);

            if ($count > 0) { // Have Data In MySQL

                 

                while($rows = mysqli_fetch_assoc($re)) {

                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

                    ?>
                    
                    <tr> 

                    <td> <?php echo $id ; ?> </td>
                    <td> <?php echo $title ; ?> </td>

                    <td> 
                        
                     <?php 

                     if($image_name !="") {

                        ?> 
                        <img width ="100px" height = "100"  src=  "../images/<?php echo $image_name ;?> " alt="">
                        <?php
                     }

                     else {

                        echo "Image Not Added";

                     }

                     ?> 
                     
                    </td>

                    <td> <?php echo $featured ; ?> </td>
                    <td> <?php echo $active ; ?> </td>

                    <td>           
                        
                    <a href="update-category.php?id= <?php echo $id ?>"  class = "btn-secondary"> Update Category</a> 
                    <a href="update-categories-img.php?id=<?php echo $id  ?>  " class = "btn-secondary"> Update Img</a>     

                    <a href="delete-categories.php?id=<?php echo $id  ?>  " class = "btn-danger"> Delete Category</a>   


                
                    </td>


                                    

                    </tr>
                    
                    <?php


                }



            }

            else {
                
                ?> 
                
                    <tr>

                <td colspan = 6 >No Category Is Added</td>

                    </tr>
                
                <?php

            }



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