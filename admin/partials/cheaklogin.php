<?php

include('db.php');

if(!isset($_SESSION['u'])){


    $_SESSION['s'] = "Plzs Or Password Worng" ;
    header("Location:http://localhost/abdo/admin/login.php") ;
    
    
    }
?>


