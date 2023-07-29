<link rel="stylesheet" href="Style/footer.css">
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>About Us</h4>
                <p>The idea is to
                    give users of the site the ability to look at different cars and see the specifications helping them make the right choice of
                    which car to buy. Users of the site can choose to view car models, view car brands, compare cars and even use the
                    find me a car feature. </p>
            </div>
            <div class="col-md-4">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="Cars.php">Cars</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>123 Main Street<br>Anytown, Gauteng<br>12345<br><br>Phone: (123) 456-7890<br>Email: info@216.prac.3</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="text-center">© <?php echo date('Y'); ?> CarsWebsite. All Rights Reserved.</p>
            </div>
        </div>
        <?php if(isset($_SESSION['email'])) { ?>
            <div class="theme">
                <button onclick="setTheme('light')">Light</button>
                <button onclick="setTheme('dark')">Dark</button>
            </div>
        <?php } ?>
        <?php
            if (isset($_SESSION['theme'])) {
                echo '<script>setTheme("' . $_SESSION['theme'] . '");</script>';
            }
        ?>
    </div>
    <script src="theme.js"></script>
</footer>
