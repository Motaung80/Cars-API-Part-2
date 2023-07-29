<?php include 'config.php'; ?>
<?php 
    session_start(); // start session if not already started
    /*if (isset($_SESSION['logout_msg'])) { // if user just logged out, display logout message
        echo '<div class="logout-msg">' . $_SESSION['logout_msg'] . '</div>';
        unset($_SESSION['logout_msg']); // remove session variable after displaying message
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar container">
                <a href="../../index.html" class="nav-link"><img src="img/car_img/11.png"  width="10%"><span>car key</span></a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="Cars.php" class="nav-link"><b>cars</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="Brands.php" class="nav-link"><b>Brands</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="Compare.php" class="nav-link"><b>Compare</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="FindCar.php" class="nav-link"><b>FindCar</b></a>
                    </li>
                    <?php if(isset($_SESSION['email'])) { ?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link"><b>LogOut</b></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link"><b>LogIn</b></a>
                        </li>
                        <li class="nav-item">
                            <a href="register.php" class="nav-link"><b>SignUp</b></a>
                        </li>
                    <?php } ?>
                    <div class="active"></div>
                </ul>
            </nav>

