<?php 

session_start();
include("db.php") ;

$id = $_GET['id'];

$query = "SELECT * FROM tbl_category WHERE id = '$id' "; // To Show
$sql1 = mysqli_query($conn , $query) ;

if($sql1 == true) {

    $count = mysqli_num_rows($sql1);

    if ($count == 1 ){

        $rows = mysqli_fetch_assoc($sql1);

        $title = $rows['title'];
        $featured = $rows['featured'];
        $active = $rows['active'];

    }

    else {

        $_SESSION['no-found-id'] = "Not Found" ;
        header('Location:http://localhost/abdo/admin/categories.php') ;
    }

}


if (isset($_POST['submit'])) { // To Update

    $title = $_POST['title'];

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




    $query2 ="UPDATE `tbl_category` SET 
    `title`='$title'
    ,`featured`='$featured'
    ,`active`='$active' 
    WHERE id = $id ";


    $sql2 = mysqli_query($conn , $query2) ;

    if ($sql2 == true) {


        $_SESSION['updatecate'] = "Update Category Successfully " ;
        header("Location:http://localhost/abdo/admin/categories.php") ;


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


    <h1>Update Categry</h1>
    <br><br>

<form action="#" method = "POST" enctype = "multipart/form-data">

    <table class="tbl-30">

        <tr>
            <td>Title</td> 
            <td> <input type="text" placeholder = "Enter New Title " name = "title" required value = "<?php echo $title; ?> " ></td> 
            </tr>

        <tr>




        <tr>
 
            <td>Featured</td> 
            <td>
            <input  <?php  if($featured =="Yes") {echo "checked" ;} ?>  type="radio" name = "featured" value = "Yes" > Yes

            <input type="radio" name = "featured" value = "No">  No
            </td>

        </tr>

                <tr>
        
        <td>Active</td> 
        <td>
        <input <?php if($active == "Yes") {echo "checked" ; } ?> type="radio" name = "active" value = "Yes"> Yes

        <input type="radio" name = "active" value = "No">  No
        </td>

        </tr>




        <tr>
        <td colspan = "2"> 
        <input type="submit" name="submit" value = "Update Category" class = "btn-secondary">    
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


