<?php 


include('db.php');
session_start();
if(isset($_POST['submit'])) {

$title = $_POST['title'];
$description = $_POST['description'];
$Price = $_POST['Price'];
$featured = $_POST['featured'];
$active = $_POST['active'];
$idcategory =$_POST['category'] ;



    if(isset($_POST['featured'])) {

        $featured = $_POST['featured'];


    }

    else {

        $featured = "No";


    }

    if(isset($_POST['active'])) {

        $active = $_POST['active'];


    }

    else {

        $active = "No";
    }


    if($_FILES['img']['name']) {

        $name =$_FILES['img']['name'] ;

            $souce= $_FILES['img']['tmp_name'] ;

            $dex = "../images".$name ;
    
            $uploaded =move_uploaded_file($souce , $dex);


        }


    else {

        $name="";

    }


    $query = "INSERT INTO `tbl_food`( `title` , `description` , `price`, `image_name` , category_id	 ,`featured` , `active`) 
    VALUES ('$title ', '$description ', '$Price ', '$name', '$idcategory' ,'$featured',  '$active'   ) " ;

    $sql = mysqli_query($conn , $query);


    if ($sql == true) {

        $_SESSION['addffod'] = "New Food Is Added" ;
        header('Location:http://localhost/abdo/admin/foods.php') ;

    }

    else {
        $_SESSION['not-addffod'] = "Food Not Add" ;
        header('Location:http://localhost/abdo/admin/foods.php') ;

    }





}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="s.css">

</head>

<body>
<?php include("partials/menu.php") ;?>

    <!-- Navbar Section Ends Here -->




<div class="container"> 


    <h1>Add Food</h1>
    <br><br>

<form action="#" method = "POST" enctype = "multipart/form-data">

    <table class="tbl-30">

        <tr>
            <td>Title</td> 
            <td> <input type="text" placeholder = "Enter Title For the Food " name ="title" required></td> 
            </tr>

        <tr>



        <tr>

            <td>description</td> 
            <td>
                <textarea name="description" id=""  placeholder = "Enter description For the Food " cols="30" rows="5"></textarea>

            </td>

        </tr>

        <tr>
            <td>Price</td> 
            <td> <input type="text" placeholder = "Enter Price For the Food " name ="Price" required></td> 
            </tr>

        <tr>

        <tr>

        <td>Img</td> 
        <td>
        <input type="file" name ="img" >
        </td>

        </tr>

        <tr>

        <td>Category</td> 
        <td>

        <select name="category" id="">

            <?php 
            
            $query = "SELECT * FROM tbl_category WHERE active = 'Yes' ";

            $sql = mysqli_query($conn , $query);

            

                $count = mysqli_num_rows($sql);

                if ($count > 0) { // Have Category in My Sql

                    while($rows = mysqli_fetch_assoc($sql)) {

                        $titlecategory = $rows['title'];
                        $idcategory = $rows['id'];

                        ?> 
                            <option value="<?php echo $idcategory ;?>"> <?php echo $titlecategory ;?> </option>


                        <?php

                    }

                }

                else {

                    ?> 
                    <option value="2"> <?php echo "No Category" ;?> </option>


                <?php

                }


            
            
            
            
            ?>

        </select>

        </td>

        </tr>

        <tr>

            <td>Featured</td> 
            <td>
            <input type="radio" name = "featured" value = "Yes"> Yes

            <input type="radio" name = "featured" value = "No">  No
            </td>

        </tr>

                <tr>
        
        <td>Active</td> 
        <td>
        <input type="radio" name = "active" value = "Yes"> Yes

        <input type="radio" name = "active" value = "No">  No
        </td>

        </tr>




        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Add Category" class = "btn-secondary">    
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


