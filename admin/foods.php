
 <?php include("db.php")?>
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




    <div>
    <div class="text">
        <br>
        <a href="add-food.php" class="btn-primary">Add Food</a>
    </div>

    <br><br>
    
    <div class= "container">


    <?php 

    session_start();
    
    
        if(isset($_SESSION['addffod'])) {

            echo $_SESSION['addffod'] ;
            unset ($_SESSION['addffod']);

        }

        if(isset($_SESSION['not-addffod'])) {

            echo $_SESSION['not-addffod'] ;
            unset ($_SESSION['not-addffod']);

        }

        if(isset($_SESSION['deletefood'])) {

            echo $_SESSION['deletefood'] ;
            unset ($_SESSION['deletefood']);

        }
        if(isset($_SESSION['updatefood'])) {

            echo $_SESSION['updatefood'] ;
            unset ($_SESSION['updatefood']);

        }

        if(isset($_SESSION['no-found-id'])) {

            echo $_SESSION['no-found-id'] ;
            unset ($_SESSION['no-found-id']);

        }
        if(isset($_SESSION['updateimg'])) {

            echo $_SESSION['updateimg'] ;
            unset ($_SESSION['updateimg']);

        }
    
    
    
    ?>

    </div>


    <table class="tbl" >

        <tr>

            <th>S.N.</th>
            <th>Title</th>
            <th>description</th>
            <th>price</th>
            <th>Category</th>
            <th>image_name</th>
            <th>featured</th>
            <th>active</th>
            <th>action</th>

        </tr>



        

        <?php 
        
        
        $query = "SELECT * from tbl_food "  ;
        $sql =mysqli_query($conn , $query) ;

        $count = mysqli_num_rows($sql);

        if ($count > 0) { // Have Food In MySql

            while ($rows = mysqli_fetch_assoc($sql)) {

                $id = $rows['id'];
                $title = $rows['title'];
                $description = $rows['description'];
                $price = $rows['price'];
              $image_name = $rows['image_name'];
                $featured= $rows['featured'];
                $active = $rows['active'];

                ?> 
                
                <tr>


                <td> <?php echo $id ; ?> </td>
                <td> <?php echo $title ; ?> </td>
                <td> <?php echo $description ; ?> </td>
                <td> <?php echo $price ; ?> </td>

                <td> 


                
                </td>

                <!-- To Show Img -->
                <td> 
                        
                        <?php 
   
                        if($image_name != ""  ) {
   
                            ?> 
                            <img width ="100px" height = "100"  src="../images/<?php echo $image_name ; ?>  "alt="">
                            <?php     
                           }
   
                        else {
                        echo    "Image Not Found" ;

                        }
   
                        ?> 
                        
                       </td>

                <td> <?php echo $featured ; ?> </td>
                <td> <?php echo $active ; ?> </td>


                <td> 

                <a href="update-food.php?id= <?php echo $id ?>"  class = "btn-secondary"> Update Food</a> 
                <a href="update-food-imgg.php?id=<?php echo $id  ?>  " class = "btn-secondary"> Update Img</a>     

                    <a href="delete-food.php?id=<?php echo $id  ?>  " class = "btn-danger"> Delete Food</a>   


                
                </td>


                </tr>
                
                
                
                <?php


            }

        }
        
        else {  // Not Have Food In MySql

            ?> 
                <tr>

                    <td colspan = 5> No Food Here</td>
                </tr>
            
            <?php

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

    <?php include("partials/footer.php") ;?>


</body>
</html>