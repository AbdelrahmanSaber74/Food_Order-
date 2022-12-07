<?php  include("db.php") ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


<?php include("partials/menu.php") ;?>


<section class="categories">
        <div class="container">
            <h2 >Dash Pord</h2>


            <div class = "col-4  text-center">
        <?php 
        
        $query = "SELECT * from tbl_category" ;
        $sql = mysqli_query($conn , $query ) ;

        $count = mysqli_num_rows($sql) ;
        
        ?>

        <h1><?php echo $count ;?></h1> <br>
        Categories
        <br>
            </div>


            <br><br>


            <div class = "col-4  text-center">
        <?php 
        
        $query = "SELECT * from tbl_food" ;
        $sql = mysqli_query($conn , $query ) ;

        $count = mysqli_num_rows($sql) ;
        
        ?>

        <h1><?php echo $count ;?></h1><br>
        Foods

            </div>


            <br><br>
            <div class = "col-4  text-center">

            <?php 
        
        $query = "SELECT * from tbl_order" ;
        $sql = mysqli_query($conn , $query ) ;

        $count = mysqli_num_rows($sql) ;
        
        ?>

        <h1><?php echo $count ;?></h1>

         <br>
        Total Order

            </div>
            <br><br>




    <div class = "col-4  text-center">

    <?php 
        
        $query = "SELECT sum(total) As total from tbl_order WHERE status = 'Deleivered' ";

        $sql = mysqli_query($conn , $query ) ;

        $count = mysqli_num_rows($sql) ; 

        $rows= mysqli_fetch_assoc($sql) ;

            $sum_total = $rows['total'];

        
        
        ?>

        <h1><?php echo "$".$sum_total ;?></h1> <br>
        Revenue Generated

            </div>


            <div class="clearfix"></div>
        </div>
    </section>

    


    <!-- footer Section Starts Here -->
    <?php include("partials/footer.php") ;?>

    <!-- footer Section Ends Here -->

</body>
</html>