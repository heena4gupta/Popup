<?php
session_start();
include "connection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

       if($sql==true)
    {
        $message = 'Login Successfully';
    }
    else
    {
     echo "<span style='color:red;'>Please register before login..!</span>";
        exit();
        
    }


?>






















































