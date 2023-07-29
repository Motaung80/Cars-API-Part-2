<?php include 'header.php'; 
    if (!isset($_SESSION['email'])) { // if user is not logged in, redirect them to login page
        header("Location: login.php");
        exit();
    }
?>

    <link rel="stylesheet" href="Style/comp_style.css">

        </header>
        <section>
            <h1 class="display">Compare Cars</h1>
            <div class="container">
                <div class="col-md-9 mx-auto">
                    <table class="table">
                        <tr class="bg-light">
                            <th>Select Car</th>
                            <th width="300px">
                                <select class="form-control" id="select1" onchange="item1(this.value)">
                                    <option value="0">-- Select Car --</option>
                                </select>
                            </th>
                            <th width="300px">
                                <select class="form-control" id="select2" onchange="item2(this.value)">
                                    <option value="0">-- Select Car --</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>Car Image</th>
                            <td>
                                <img src="img/1.jpg" id="pic1" alt="">
                            </td>
                            <td>
                                <img src="img/2.jpg" id="pic2" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th><img src="img/price-tag.png" width="10%">Price</th>
                            <td id="price1">R 2 800 000</td>
                            <td id="price2">R 2 300 000</td>
                        </tr>
                        <tr>
                            <th><img src="img/gasoline-pump.png" width="8%">Fuel Efficiency</th>
                            <td id="desc1">8989</td>
                            <td id="desc2">43343</td>
                        </tr>
                        <tr>
                            <th><img src="img/car-insurance.png" width="8%">Safety ratings</th>
                            <td id="brand1">Air Bags</td>
                            <td id="brand2">Hard Body</td>
                        </tr>
                        <tr>
                            <th><img src="img/car-engine.png" width="8%">Engine performance</th>
                            <td id="brand1">489Kw</td>
                            <td id="brand2">512kw</td>
                        </tr>
                        <tr>
                            <th><img src="img/interior.png" width="8%">Interior features</th>
                            <td id="brand1">Awsome</td>
                            <td id="brand2">Lather</td>
                        </tr>
                        <tr>
                            <th><img src="img/sedan.png" width="8%">Exterior design</th>
                            <td id="brand1">Charcoal</td>
                            <td id="brand2">light color</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <br>
    </body>
</html>