


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
        <p>Mange Categories</p>
        <br>
        <a href="$" class="btn-primary">Add Categories</a>
    </div>


    <table class="tbl" >

        <tr>

            <th>S.N.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Actions</th>
        </tr>


        <tr>
            <td>1.</td>
            <td>Vijay Thapa</td>
            <td>VijayThapa</td>
            <td>

                <a href="" class="btn-secondary">Update Admin</a>
                <a href="" class="btn-danger">Delete Admin</a>

            </td>

        </tr>

        <tr>
            <td>2.</td>
            <td>Vijay Thapa</td>
            <td>VijayThapa</td>
            <td>

                <a href="" class="btn-secondary">Update Admin</a>
                <a href="" class="btn-danger">Delete Admin</a>

            </td>

        </tr>

            <tr>
            <td>3.</td>
            <td>Vijay Thapa</td>
            <td>VijayThapa</td>
            <td>

                <a href="" class="btn-secondary">Update Admin</a>
                <a href="" class="btn-danger">Delete Admin</a>

            </td>

        </tr>
        
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