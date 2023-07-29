<?php 
    include 'header.php';
    if (!isset($_SESSION['email'])) { // if user is not logged in, redirect them to login page
        header("Location: login.php");
        exit();
    }

    // Fetch user's preferences from the database
    $user_id = $_SESSION['user_id'];
    $stmt = $db->prepare('SELECT * FROM user_info WHERE id = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $preferences = $result->fetch_assoc();

    // Close database connection
    $stmt->close();
    $db->close();
?>

    <link rel="stylesheet" href="Style/cars_style.css">

            <div class="toper">
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <tr>
                            <td>
                                <input type="search" placeholder="search" class="search" id="carsQuery">
                            </td>
                            <td>
                                <a href="#"><button class="search-icon" id="searchBtn">search</button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <article class="blog-post">
                <div class="blog-img">
                    <img src="img/car_img/10.jpg" alt=""/>
                </div>
                <div class="blog-inf">
                    <div class="blog-date">
                        <span>Tuesday</span>
                        <span>14/03/2023</span>
                    </div>
                    <h2 class="blog-title">Cars Page</h2>
                    <p>The idea is to
                        give users of the site the ability to look at different cars and see the specifications helping them make the right choice of
                        which car to buy. Users of the site can choose to view car models, view car brands, compare cars and even use the
                        find me a car feature. </p>
                    <a href="#" class="blog-cta">More Info</a>
                </div>
            </article>
        </header>
        <br>
        <div class="buttons">
            <button class="button-value" id="allBtn">ALL</button>
            <select class="button-value" id="transmissionSelect">
                <option class="b-v">TRANSMISSION</option>
                <option class="b-v">Manual</option>
                <option class="b-v">Automatic</option>
            </select>
            <select class="button-value" id="engineSelect">
                <option class="b-v">ENGINE TYPE</option>
                <option class="b-v">Gasoline</option>
                <option class="b-v">Diesel</option>
                <option class="b-v">Hybrid</option>
            </select>
            <select class="button-value" id="bodySelect">
                <option class="b-v">Body Type</option>
                <option class="b-v">Off Road</option>
                <option class="b-v">Coupe</option>
                <option class="b-v">Cabriolet</option>
                <option class="b-v">Hatchback</option>
                <option class="b-v">Sedan</option>
                <option class="b-v">SUV</option>
                <option class="b-v">Van</option>
            </select>
            <select class="button-value" id="wheelDriveSelect">
                <option class="b-v">Wheel Drives</option>
                <option class="b-v">Rear wheel drive</option>
                <option class="b-v">Front wheel drive</option>
                <option class="b-v">All wheel drive (AWD)</option>
            </select>
            <button class="button-value" id="submitBtn">SAVE</button>
        </div>

        <section>
            <br>
            <div class="container1">
                <div class="products" id="carsdetails">
                <div class="products" id="carsType">
        </section>
        <br>
        <br>
        <?php include 'footer.php'; ?>
        <script src="request.js"></script>
        <script>
        // Populate preferences in the HTML DOM
        window.onload = function() {
            const transmission = '<?php echo $preferences["transmission"]; ?>';
            const engine = '<?php echo $preferences["engine"]; ?>';
            const body = '<?php echo $preferences["body"]; ?>';
            const wheel = '<?php echo $preferences["wheel"]; ?>';

            document.getElementById('transmissionSelect').value = transmission;
            document.getElementById('engineSelect').value = engine;
            document.getElementById('bodySelect').value = body;
            document.getElementById('wheelDriveSelect').value = wheel;
        }
    </script>
    </body>
</html>