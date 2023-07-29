<?php include 'header.php'; 
    if (!isset($_SESSION['email'])) { // if user is not logged in, redirect them to login page
        header("Location: login.php");
        exit();
    }
?>
    <link rel="stylesheet" href="Style/brands_style.css">
    
        </header>
        <section class="container1">
            <div class="products" id="brandsdetails"></div>
        </section>

        <script src="JavaScript/brand.js"></script>
    </body>
</html>