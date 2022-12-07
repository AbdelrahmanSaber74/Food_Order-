<?php 


include("db.php") ;

session_start();

if(isset($_POST['submit'])) {

    $title = $_POST['title'];

    if(isset($_POST['featured'])) {
        $featured = $_POST['featured'];

    }
    else {

        $featured = "NO";
    }


    if(isset($_POST['active'])) {
        $active = $_POST['active'];

    }
    else {

        $active = "NO";
    }


    if($_FILES['image']['name']) {


        $name = $_FILES['image']['name'];
        $source = $_FILES['image']['tmp_name'] ;

        // $exd = end(explode("." , "$name")) ; // Re Name

        // $name = "Food" . rand(000,999) . "." . "$exd" ; // Re Name

        $des = "../images" . $name;

        $upload = move_uploaded_file($source , $des) ;

    }

    else {
        $name ="";

    }



    $query = "INSERT INTO `tbl_category`( `title`, `image_name` , `featured`, `active`) 
    VALUES ('$title' ,  '$name'  , '$featured ' , '$active' )" ;

     $re = mysqli_query($conn , $query);

     if ($re == true) {

        $_SESSION['addcategory'] = "New Category Is Added" ;
        header('Location:http://localhost/abdo/admin/categories.php') ;

     }

     else {

        $_SESSION['addcategory'] = "Failed To Add Category" ;
        header('Location:http://localhost/abdo/admin/categories.php') ;

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


    <h1>Add Categry</h1>
    <br><br>

<form action="#" method = "POST" enctype = "multipart/form-data">

    <table class="tbl-30">

        <tr>
            <td>Title</td> 
            <td> <input type="text" placeholder = "Enter Title " name = "title" required></td> 
            </tr>

        <tr>

        <tr>


        <td>Image</td>
        <td> <input type="file"  name ="image" ></td> 
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


