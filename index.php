<?php
    include 'header.php';
    //session_start();
  
    if (!isset($_SESSION['email'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: login.php');
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['apikey']);
        header("location: login.php");
    }

?>

    <link rel="stylesheet" href="Style/reg_style.css">

    <div class="header">
        <h2>You Have Signed Up With Car Key</h2>
    </div>
    <div class="content">
  
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
  
        <?php  if (isset($_SESSION['email'])) : ?>  
 
 
        <p>Welcome: <strong><?php echo $_SESSION['email']; ?> API KEY:: <?php echo $_SESSION['apikey']; ?></strong></p>

 
        <?php endif ?>
    </div>
</body>
</html>