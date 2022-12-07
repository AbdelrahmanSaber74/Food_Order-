
<?php 

include("db.php") ;



?>

<?php include("partials/menu.php") ;?>




<div>
    <div class="text">
        <br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
    </div>        <br>
   

    <div class="container" >



    <?php  

    session_start();


        if(isset($_SESSION['add']) ) {

            echo $_SESSION['add'] ; // Display Meesage
            unset($_SESSION['add']); // Remove Message

        }


        if(isset($_SESSION['delete'])) {

            echo $_SESSION['delete'];
            unset($_SESSION['delete']);

        }


        if(isset($_SESSION['update'])) {

            echo $_SESSION['update'];
            unset($_SESSION['update']); 

        } 



        if(isset($_SESSION['pass'])) {

            echo $_SESSION['pass'];
            unset($_SESSION['pass']); 

        }

        if(isset($_SESSION['changepassword'])) {

            echo $_SESSION['changepassword'];
            unset($_SESSION['changepassword']); 

        }

        if(isset($_SESSION['notChange'])) {

            echo $_SESSION['notChange'];
            unset($_SESSION['notChange']); 

        }
        if(isset($_SESSION['notChangeold'])) {

            echo $_SESSION['notChangeold'];
            unset($_SESSION['notChangeold']); 

        }
        if(isset($_SESSION['login'])) {

            echo $_SESSION['login'];
            unset($_SESSION['login']); 

        }

        ?>



    <table class="tbl" >

        <tr>

            <th>S.N.</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Actions</th>
        </tr>


            
            
            <?php 
            
                $query = "SELECT * FROM `tbl-admin` " ;
                $res = mysqli_query($conn , $query);

                if ($res == true )
                        {

                            $count = mysqli_num_rows($res) ;
                            $cn= 1;

                                if ($count >0 ) { // Hay SQLve Data Base In MySQL

                                    while ($rows = mysqli_fetch_assoc($res)) {


                                        $id = $rows['id'];
                                        $fullname = $rows['full_name'];
                                        $username = $rows['username'];

                                        
                                        ?> 
                                        
                                        
                                        <tr>


                                        <td> <?php  echo $id ; ?> </td>
                                        <td> <?php echo $fullname ; ?> </td>
                                        <td> <?php  echo $username ;?> </td>
                                        <td> 
                                            <a href="update-pass.php?id= <?php  echo $id ; ?>"  class = "btn-danger">Change Password</a>

                                        <a href="updata-admin.php?id= <?php echo $id ; ?> " class = "btn-secondary"> Update Admin</a>     
                                        <a href="delete-admin.php?id=<?php echo $id ; ?> "  class = "btn-danger"> Delete Admin </a>    

                                    
                                    </td>
                                        

                                        </tr>
                                        
                                        
                                        <?php



                                    }     
                               
                                    


                                }


                        }
            
            
            
            
            ?>
            
            
            
            
    
        

    </table>



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