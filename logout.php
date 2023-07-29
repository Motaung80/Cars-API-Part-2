<?php    
    session_start(); 
    session_destroy(); 
    $_SESSION['logout_msg'] = "You have been logged out."; // Add session variable for logout message
    header('Location:login.php');  
    exit;  
?>